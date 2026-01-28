<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirectIntended(route('admin.dashboard', absolute: false), navigate: false);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <div>
            <!-- Name -->
            <x-ui.input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name"
                :placeholder="__('Full name')" />
            @error('email')
                <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <!-- Email Address -->
            <x-ui.input wire:model="email" :label="__('Email address')" type="email" required autocomplete="email"
                placeholder="email@example.com" />
            @error('email')
                <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <!-- Password -->
            <x-ui.input wire:model="password" :label="__('Password')" type="password" required autocomplete="new-password"
                :placeholder="__('Password')" />
            @error('email')
                <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-ui.input wire:model="password_confirmation" :label="__('Confirm password')" type="password" required
                autocomplete="new-password" :placeholder="__('Confirm password')" />
            @error('email')
                <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex items-center justify-end">
            <x-ui.button type="submit" class="w-full justify-center">
                {{ __('Create account') }}
            </x-ui.button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-fg-muted">
        {{ __('Already have an account?') }}
        <a href="/login" class="text-primary" wire:navigate>{{ __('Log in') }}</a>
    </div>
</div>
