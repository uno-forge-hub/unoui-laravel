<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<x-ui.modal id="deleteAccount">
    <form wire:submit="deleteUser" class="space-y-6">
        <div class="space-y-1">
            <h1 class="font-semibold text-fg-title">
                {{ __('Are you sure you want to delete your account?') }}
            </h1>
            <p class="text-sm text-fg-muted">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>
        </div>
        <x-ui.input wire:model="password" :label="__('Password')" type="password" />
        <div class="flex justify-end space-x-2">
            <x-ui.modal.close intent="gray" variant="outline" size="sm">
                {{ __('Cancel') }}
            </x-ui.modal.close>
            <x-ui.button intent="danger" type="submit" size="sm">
                {{ __('Delete account') }}
            </x-ui.button>
        </div>
    </form>
</x-ui.modal>
