<?php

declare(strict_types=1);

namespace App\DeliveryServices;

use App\Shipment;
use DateTime;

class SlowDelivery implements DeliveryServiceInterface
{
    private const BASE_COST = 150.0;
    private const COEFFICIENT_PER_KG = 0.1;
    private const DAYS_PER_1000_KLADR_DIFFERENCE = 2;

    public function calculateCost(Shipment $shipment): float
    {
        $coefficient = 1 + ($shipment->getWeight() * self::COEFFICIENT_PER_KG);
        return self::BASE_COST * $coefficient;
    }

    public function getDeliveryDate(Shipment $shipment): string
    {
        $days = $this->calculateDeliveryDays($shipment);

        $deliveryDate = new DateTime();
        $deliveryDate->modify('+' . $days . ' days');

        return $deliveryDate->format('Y-m-d');
    }

    private function calculateDeliveryDays(Shipment $shipment): int
    {
        $days = abs(intval($shipment->getSourceKladr()) - intval($shipment->getTargetKladr())) / 1000 * self::DAYS_PER_1000_KLADR_DIFFERENCE;

        return (int) $days;
    }
}