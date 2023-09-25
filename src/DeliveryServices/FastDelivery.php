<?php

declare(strict_types=1);

namespace App\DeliveryServices;

use App\Shipment;
use DateTime;

class FastDelivery implements DeliveryServiceInterface
{
    private const RATE_PER_KG = 50.0;
    private const CUTOFF_HOUR = 18;

    public function calculateCost(Shipment $shipment): float
    {
        return $shipment->getWeight() * self::RATE_PER_KG;
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
        $days = abs(intval($shipment->getSourceKladr()) - intval($shipment->getTargetKladr())) / 1000;

        $currentHour = (int) (new DateTime())->format('H');
        if ($currentHour >= self::CUTOFF_HOUR) {
            $days++;
        }

        return (int) $days;
    }
}