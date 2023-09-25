<?php
declare(strict_types=1);

namespace App;

class Shipment
{
    private string $sourceKladr;
    private string $targetKladr;
    private float $weight;

    public function __construct(string $sourceKladr, string $targetKladr, float $weight)
    {
        $this->sourceKladr = $sourceKladr;
        $this->targetKladr = $targetKladr;
        $this->weight = $weight;
    }

    public function getSourceKladr(): string
    {
        return $this->sourceKladr;
    }

    public function getTargetKladr(): string
    {
        return $this->targetKladr;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }
}