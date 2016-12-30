<?php

namespace App\Helpers;

class BetweenTwoPoints
{
    private $point1, $point2, $distance, $duration;

    public function __construct($point1, $point2, $distance, $duration)
    {
        $this->point1 = $point1;
        $this->point2 = $point2;
        $this->distance = $distance;
        $this->duration = $duration;
    }

}