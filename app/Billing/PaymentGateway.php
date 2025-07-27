<?php

namespace App\Billing;

use Illuminate\Support\Str;

class PaymentGateway
{
    public function __construct(
        private string $currency,
        private int $discount = 0
    ){}

    public function setDiscount(int $amount)
    {
        $this->discount = $amount;
    }

    public function charge(int $amount)
    {
        return [
            'amount' => $amount,
            'currency' => $this->currency,
            'discount' => $this->discount,
            'transaction_id' => Str::random()
        ];
    }
}