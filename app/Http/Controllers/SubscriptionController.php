<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request){

        $request->user()->newSubscription(
            'Premium Collabpal', 'price_1IzgvTF738EjpHYFAaTxqTWe'
        )->create($request->paymentMethodId);
        return redirect()->to('/userInfo');

    }
}
