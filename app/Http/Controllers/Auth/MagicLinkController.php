<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\MagicLinkNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class MagicLinkController extends Controller
{
    public function sendMagicLink(Request $request)
    {
        $user = User::firstOrCreate([
            'email' => $request->email,
        ], ['name' => $request->email]);

        if ($user) {
            $url = URL::temporarySignedRoute(
                'magic.link.login',
                now()->addMinutes(10),
                ['token' => encrypt($user->id)]
            );

            $user->notify(new MagicLinkNotification($url));
        }

        return back()->with('status', __('Magic link sent!'));
    }

    public function loginWithMagicLink(Request $request, $token)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        $user = User::find(decrypt($token));

        if ($user) {
            auth()->login($user);

            return redirect('/');
        }

        return redirect('/');
    }
}
