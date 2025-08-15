<?php

use Eosvolt\App\ChargingSessionController;
use Eosvolt\Domain\ChargingSession\ChargingSessionStatus;
use Eosvolt\Infrastructure\ChargingSessions\ChargingSessionService;
use PHPUnit\Framework\TestCase;

class ChargingSessionTest extends TestCase
{
    public static function paymentGatewayProvider(): array
    {
        return [
            'stripe' => [
                'gateway' => 'stripe'
            ],
        ];
    }

    /**
     * @test
     * @dataProvider paymentGatewayProvider
     */
    public function shouldStartSessionForCharger(string $gateway): void
    {
        $controller = new ChargingSessionController(new ChargingSessionService());
        $result = $controller->startSession(1);

        static::assertEquals(1, $result['charger_id']);
        static::assertEquals(ChargingSessionStatus::CHARGING, $result['status']);
        static::assertEquals($gateway, $result['gateway']);
    }

    /**
     * @test
     * @dataProvider paymentGatewayProvider
     */
    public function shouldStopSessionForCharger(string $gateway): void
    {
        $controller = new ChargingSessionController(new ChargingSessionService());
        $result = $controller->stopSession(2, 900);

        static::assertEquals(2, $result['charger_id']);
        static::assertEquals(ChargingSessionStatus::FINISHED, $result['status']);
        static::assertEquals($gateway, $result['gateway']);
    }

    /**
     * @test
     */
    public function shouldNotBeAbleStartSessionDueToTooHighPreAuthAmount(): void
    {
        $this->expectException(\Eosvolt\Domain\ChargingSession\ChargingSessionException::class);

        $controller = new ChargingSessionController(new ChargingSessionService());
        $controller->startSession(4);
    }
}