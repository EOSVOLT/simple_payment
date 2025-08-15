<?php

namespace Eosvolt\App;

use Eosvolt\Domain\ChargingSession\ChargingSessionException;
use Eosvolt\Infrastructure\ChargingSessions\ChargingSessionService;

class ChargingSessionController
{
    public function __construct(private readonly ChargingSessionService $chargingSessionService)
    {

    }

    /**
     * @param int $chargerId
     * @return array
     * @throws ChargingSessionException
     */
    public function startSession(int $chargerId): array
    {
        return $this->chargingSessionService->start($chargerId)->toArray();
    }

    /**
     * @param int $chargerId
     * @param int $cost
     * @return array
     * @throws ChargingSessionException
     */
    public function stopSession(int $chargerId, int $cost): array
    {
        return $this->chargingSessionService->stop($chargerId, $cost)->toArray();
    }
}