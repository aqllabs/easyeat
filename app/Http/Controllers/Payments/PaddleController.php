<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaddleController extends Controller
{
    public function subscriptionSwap(Request $request, $priceId): \Illuminate\Http\RedirectResponse
    {
        $request->user()->subscription()->swap($priceId);

        return redirect()->route('dashboard');
    }

    public function subscriptionCancel(Request $request)
    {
        $request->user()->subscription()->cancel();

        return redirect()->route('dashboard');
    }
}
