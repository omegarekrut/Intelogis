<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Shipment;
use App\DeliveryServices\FastDelivery;
use App\DeliveryServices\SlowDelivery;

class DeliveryServiceTest extends TestCase
{
    public function testFastDeliveryCost(): void
    {
        $shipment = new Shipment('1000', '2000', 5.0);
        $service = new FastDelivery();

        $expectedCost = 250.0;

        $this->assertEquals($expectedCost, $service->calculateCost($shipment));
    }

    public function testSlowDeliveryCost(): void
    {
        $shipment = new Shipment('1000', '3000', 10.0);
        $service = new SlowDelivery();

        $expectedCost = 300.0;

        $this->assertEquals($expectedCost, $service->calculateCost($shipment));
    }
}