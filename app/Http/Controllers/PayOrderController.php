<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;
use App\Order\Detail as OrderDetail;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    public function process(
        OrderDetail $orderDetail,
        PaymentGateway $paymentGateway
    )
    {
        $order = $orderDetail->get();
        dd($paymentGateway->charge(504));
    }
}
