<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function store(Request $request)
    {
        //Validate the request prams
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'paymentMethod' => ['required', 'string', 'min:8'],
            'planId' => ['required', 'numeric', 'exists:plans,id']
        ]);

        //Create the user
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        //Create stripe customer
        $user->createOrGetStripeCustomer();

        //Create default payment method for stripe customer
        $user->updateDefaultPaymentMethod($request['paymentMethod']);

        //Get plan selected in sign-up form
        $plan = Plan::findOrFail($request['planId']); //TODO catch error if plan is not found

        //Subscribe to plan in stripe and sync DB
        $user->newSubscription($plan->product->stripe_product, $plan->stripe_plan)
            ->create($user->defaultPaymentMethod()->id);
            //->withCoupon('code')  //TODO Add coupon codes

        // Login and "remember" the given user...
        Auth::attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ]);
    }
}
