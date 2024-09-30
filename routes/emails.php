<?php

// These routes are created to test the email notifications in the browser

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/email', function () {
    $user = User::first();

    return (new \App\Notifications\WelcomeNotification())->toMail($user);
});
