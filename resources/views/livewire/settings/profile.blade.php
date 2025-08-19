<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.dash')] class extends Component {
    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>


<x-organisms.dash.dash-page-wrapper pageTitle="Settings">
    <x-slot name="slotRight">
        <x-ui.button size="icon-sm">
            <span class="i-ph-plus"></span>
        </x-ui.button>
    </x-slot>
    <x-molecules.dash.dash-block-header icon="i-ph-gear" title="Setting page"
        description="Manage your preferences and configure various options." />
    <div class="dash-container px4 sm-px6 lg-px4 mt-10 wfull grid md-grid-cols-[240px_1fr] gap6 md-gap10 lg-gap16">
        <div class="wfull">
            <x-molecules.dash.settings-tab-links activeName="tab1" />
        </div>
        <div class="wfull grid">
            <div class="flex flex-col gap6 max-wxl wfull">
                <x-molecules.dash.dash-block-header title="Profile" description="Update your name and email address."
                    noPaddingTop noContainer />
                <form wire:submit="updateProfileInformation" class="w-full space-y-6">
                    <x-ui.input wire:model="name" :label="__('Name')" type="text" required autofocus
                        autocomplete="name" />
                    <div>
                        <x-ui.input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" />

                        @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                            <div>
                                <flux:text class="mt-4">
                                    {{ __('Your email address is unverified.') }}

                                    <flux:link class="text-sm cursor-pointer"
                                        wire:click.prevent="resendVerificationNotification">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </flux:link>
                                </flux:text>

                                @if (session('status') === 'verification-link-sent')
                                    <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </flux:text>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="flex items-center justify-end">
                            <x-ui.button type="submit" class="w-full">{{ __('Save changes') }}</x-ui.button>
                        </div>

                        <x-action-message class="me-3" on="profile-updated">
                            {{ __('Saved changes.') }}
                        </x-action-message>
                    </div>
                </form>

                <div class="mt4">
                    <x-molecules.dash.dash-block-header title="Delete account"
                        description="Delete your account and all of its resources." noPaddingTop noContainer />
                    <div class="w-full mt5 ui-subtle ui-subtle-danger ui-card cp-4 c-rd-lg flex flex-col">
                        <span class="font-medium">Warning</span>
                        <p class="text-danger/80 text-sm mt1.5 mb5">
                            Please proceed with caution, this cannot be undone.
                        </p>
                        <x-ui.modal.trigger modalId="deleteAccount" intent="danger" class="wmax">
                            Delete account
                        </x-ui.modal.trigger>
                    </div>
                </div>
                <livewire:settings.delete-user-form />
            </div>
        </div>
    </div>
</x-organisms.dash.dash-page-wrapper>
