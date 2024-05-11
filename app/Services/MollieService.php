<?php

namespace App\Services;

use Mollie\Api\MollieApiClient;

class MollieService
{
    protected $mollie;

    public function __construct()
    {
        $this->mollie = new MollieApiClient();
        $this->mollie->setApiKey(env('MOLLIE_API_KEY'));
    }

    public function createPayment($amount, $description, $redirectUrl)
    {
        return $this->mollie->payments->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => number_format($amount, 2, '.', ''),
            ],
            'description' => $description,
            'redirectUrl' => $redirectUrl,
            'method' => 'ideal', // Specify the payment method (iDEAL in this case)
        ]);
    }

    // You can add more methods here to interact with other parts of the Mollie API
}
