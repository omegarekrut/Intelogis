<?php

declare(strict_types=1);

namespace App\DeliveryServices;

use App\Shipment;

interface DeliveryServiceInterface
{
    public function calculateCost(Shipment $shipment): float;
    public function getDeliveryDate(Shipment $shipment): string;
}