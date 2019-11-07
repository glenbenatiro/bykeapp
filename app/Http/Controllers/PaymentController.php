<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getUserDetails()
    {
        return view('payment.get-user-details');
    }

    public function storeUserDetails()
    {
        dd('hello');
    }
}
