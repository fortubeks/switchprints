<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Payment $model)
    {
        return view('switchprints.payments.index', ['payments' => $model->paginate(15)]);
    }
}
