<?php

namespace Eosvolt\Domain\ChargingSession;

class ChargingSession
{
    public function __construct(
        private readonly int $chargerId,
        private readonly ChargingSessionStatus $status,
        private readonly string $gateway,

    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => random_int(1, 10000),
            'charger_id' => $this->chargerId,
            'status' => $this->status,
            'gateway' => $this->gateway
        ];
    }
}