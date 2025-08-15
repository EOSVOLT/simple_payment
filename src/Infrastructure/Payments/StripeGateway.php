<?php

namespace Eosvolt\Infrastructure\Payments;

use Eosvolt\Domain\Payments\GatewayInterface;
use Money\Money;

class StripeGateway implements GatewayInterface
{
    public function authorize(Money $money): bool
    {
        return $money->lessThanOrEqual(Money::USD(1000));
    }

    public function capture(Money $money): bool
    {
        return true;
    }
}