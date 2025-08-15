<?php

namespace Eosvolt\Infrastructure\Payments;

use Money\Money;

class PaymentService
{
    public function __construct(private StripeGateway $gateway)
    {
        
    }

    /**
     * @param int $chargerId
     * @return bool
     */
    public function authorizeForCharger(int $chargerId): bool
    {
        return $this->gateway->authorize(self::chargerPrices($chargerId));
    }

    /**
     * @param int $chargerId
     * @param Money $amount
     * @return bool
     */
    public function captureForCharger(int $chargerId, Money $amount): bool
    {
        if (self::chargerPrices($chargerId)->greaterThanOrEqual($amount)) {
            return $this->gateway->capture($amount);
        }

        return false;
    }

    /**
     * @param int $chargerId
     * @return Money
     */
    private static function chargerPrices(int $chargerId): Money
    {
        return match($chargerId) {
            1, 2, 3 => Money::USD(1000),
            4, 5, 6 => Money::USD(2000)
        };
    }
}