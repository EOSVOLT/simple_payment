<?php

namespace Eosvolt\Domain\Payments;

use Money\Money;

interface GatewayInterface
{
    public function authorize(Money $money): bool;
    public function capture(Money $money): bool;
}