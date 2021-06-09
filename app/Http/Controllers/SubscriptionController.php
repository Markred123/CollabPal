<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Stripe\Exception\InvalidRequestException;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request){


        try {$request->user()->newSubscription(
            'Premium Collabpal', 'price_1IzgvTF738EjpHYFAaTxqTWe'
        )->create($request->paymentMethodId);
            return redirect('userInfo');
        }

        catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }


    }
}
