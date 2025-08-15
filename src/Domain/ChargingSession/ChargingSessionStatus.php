<?php

namespace Eosvolt\Domain\ChargingSession;

enum ChargingSessionStatus
{
    case CHARGING;
    case FINISHED;
}