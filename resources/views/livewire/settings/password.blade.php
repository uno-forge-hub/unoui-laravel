<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.dash')]
class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
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
            <x-molecules.dash.settings-tab-links activeName="tab2" />
        </div>
        <div class="wfull grid">
            <div class="flex flex-col gap6 max-wxl wfull">
                <x-molecules.dash.dash-block-header title="Update password"
                    description="Ensure your account is using a long, random password to stay secure" noPaddingTop noContainer />
                    <form wire:submit="updatePassword" class="space-y-3">
                        <x-ui.input
                            wire:model="current_password"
                            :label="__('Current password')"
                            type="password"
                            required
                            autocomplete="current-password"
                        />
                        <x-ui.input
                            wire:model="password"
                            :label="__('New password')"
                            type="password"
                            required
                            autocomplete="new-password"
                        />
                        <x-ui.input
                            wire:model="password_confirmation"
                            :label="__('Confirm Password')"
                            type="password"
                            required
                            autocomplete="new-password"
                        />
            
                        <div class="flex items-center gap-4 pt3">
                            <div class="flex items-center justify-end">
                                <x-ui.button class="justify-center">
                                    Save changes
                                </x-ui.button>
                            </div>
            
                            <x-action-message class="me-3" on="password-updated">
                                {{ __('Saved.') }}
                            </x-action-message>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</x-organisms.dash.dash-page-wrapper>
