<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('admin.dashboard', absolute: false), navigate: false);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <div>
            <!-- Email Address -->
            <x-ui.input wire:model="email" :label="__('Email address')" type="email" required autofocus autocomplete="email"
                placeholder="email@example.com" />
            @error('email')
                <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="relative">
            <x-ui.input wire:model="password" :label="__('Password')" type="password" required autocomplete="current-password"
                :placeholder="__('Password')" />

            <a class="absolute end-0 -top-1 text-fg-muted text-sm" href="/forgot-password" wire:navigate>
                {{ __('Forgot your password?') }}
            </a>
            @error('email')
                <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Remember Me -->
        <x-ui.checkbox wire:model="remember" id="rememberMeToken" :label="__('Remember me')" />

        <div class="flex items-center justify-end">
            <x-ui.button type="submit" class="w-full justify-center">
                {{ __('Log in') }}
            </x-ui.button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-fg-muted">
            {{ __('Don\'t have an account?') }}
            <a href="/register" class="text-primary" wire:navigate>{{ __('Sign up') }}</a>
        </div>
    @endif
</div>
