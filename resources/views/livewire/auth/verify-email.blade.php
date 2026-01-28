<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::auth')] class extends Component {
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('admin.dashboard', absolute: false), navigate: true);

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="mt-4 flex flex-col gap-6">
    <span class="text-center">
        {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
    </span>

    @if (session('status') == 'verification-link-sent')
        <span class="text-center font-medium text-success">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </span>
    @endif

    <div class="flex flex-col items-center justify-between space-y-3">
        <x-ui.button wire:click="sendVerification" intent="neutral" class="w-full justify-center">
            {{ __('Resend verification email') }}
        </x-ui.button>

        <button class="text-sm cursor-pointer" wire:click="logout">
            {{ __('Log out') }}
        </button>
    </div>
</div>
