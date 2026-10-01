<?php
namespace Hubmais\HSmartTef\Services;

class TransactionService extends BaseService
{
    function charge(
        string $terminalId,
        string $amount,
        string $paymentType = 'pix', 
        int $installments = 0, 
        string $paymentTax = 'seller', 
        ?string $brand = null, 
        ?string $rebate = null, 
        ?string $requestId = null
    )
    {
        return $this->command(
            'charge',
            $terminalId,
            [
                'amount' => $amount,
                'payment_type' => $paymentType,
                'installments' => $installments,
                'payment_tax' => $paymentTax,
                'rebate' => $rebate,
                'brand' => $brand,
                'request_id' => $requestId,
            ]
        );
    }

    function chargeBilletPayment(string $terminalId, string $amount)
    {
        $this->command(
            'charge', 
            $terminalId, 
            [
                'amount' => $amount,
                'payment_type' => 'billet_payment',
            ]
        );
    }
}