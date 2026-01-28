<?php

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

new class extends Component {
    public function logoutUser() {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        return redirect('/');
    }
};
?>

<x-ui.dropdown.item danger class="wfull" @click="$wire.logoutUser()">
    <span class="i-ph-sign-out flex mr2"></span>
    Logout
</x-ui.dropdown.item>
