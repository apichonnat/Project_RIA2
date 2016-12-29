<?php

namespace App\Helpers;

class CrossingPoint
{
    private $id, $lat, $lng;

    public function __construct($id, $lat, $lng)
    {
        $this->id = $id;
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function getLng()
    {
        return $this->lng;
    }
}