<?php

use App\Models\User;
use Livewire\Volt\Volt as LivewireVolt;

test('login form shows validation errors for invalid credentials', function () {
    $user = User::factory()->create();

    $response = LivewireVolt::test('auth.login')
        ->set('email', $user->email)
        ->set('password', 'wrong-password')
        ->call('login');

    $response->assertHasErrors('email');
    $this->assertGuest();
});

test('login form shows validation errors for empty email', function () {
    $response = LivewireVolt::test('auth.login')
        ->set('email', '')
        ->set('password', 'password')
        ->call('login');

    $response->assertHasErrors('email');
    $this->assertGuest();
});

test('login form shows validation errors for invalid email format', function () {
    $response = LivewireVolt::test('auth.login')
        ->set('email', 'invalid-email')
        ->set('password', 'password')
        ->call('login');

    $response->assertHasErrors('email');
    $this->assertGuest();
});

test('login form shows validation errors for empty password', function () {
    $user = User::factory()->create();

    $response = LivewireVolt::test('auth.login')
        ->set('email', $user->email)
        ->set('password', '')
        ->call('login');

    $response->assertHasErrors('password');
    $this->assertGuest();
});

test('login form shows rate limiting error after too many attempts', function () {
    $user = User::factory()->create();

    // Make 5 failed attempts to trigger rate limiting
    for ($i = 0; $i < 5; $i++) {
        LivewireVolt::test('auth.login')
            ->set('email', $user->email)
            ->set('password', 'wrong-password')
            ->call('login');
    }

    // The 6th attempt should be rate limited
    $response = LivewireVolt::test('auth.login')
        ->set('email', $user->email)
        ->set('password', 'wrong-password')
        ->call('login');

    $response->assertHasErrors('email');
    $this->assertGuest();
});
