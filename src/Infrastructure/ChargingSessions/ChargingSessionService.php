<?php

namespace Eosvolt\Infrastructure\ChargingSessions;

use Eosvolt\Domain\ChargingSession\ChargingSession;
use Eosvolt\Domain\ChargingSession\ChargingSessionException;
use Eosvolt\Domain\ChargingSession\ChargingSessionStatus;
use Eosvolt\Infrastructure\Payments\PaymentService;
use Eosvolt\Infrastructure\Payments\StripeGateway;
use Money\Money;

class ChargingSessionService
{
    private PaymentService $paymentService;

    public function __construct()
    {
        $this->paymentService = new PaymentService(new StripeGateway());
    }

    /**
     * @param int $chargerId
     * @return ChargingSession
     * @throws ChargingSessionException
     */
    public function start(int $chargerId): ChargingSession
    {
        if ($this->paymentService->authorizeForCharger($chargerId)) {
            return new ChargingSession(
                $chargerId,
                ChargingSessionStatus::CHARGING,
                'stripe'
            );
        }

        throw new ChargingSessionException('Cannot start session!');
    }

    /**
     * @param int $chargerId
     * @param int $finalCost
     * @return ChargingSession
     * @throws ChargingSessionException
     */
    public function stop(int $chargerId, int $finalCost): ChargingSession
    {
        if ($this->paymentService->captureForCharger($chargerId, Money::USD($finalCost))) {
            return new ChargingSession(
                $chargerId,
                ChargingSessionStatus::FINISHED,
                'stripe'
            );
        }

        throw new ChargingSessionException('Cannot stop session!');
    }
}