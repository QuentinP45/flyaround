<?php
/**
 * Created by PhpStorm.
 * User: wilder19
 * Date: 09/06/18
 * Time: 15:31
 */

namespace AppBundle\Service;


class FlightInfo
{

    private $unit;

    public function __construct($unit) {
        $this->unit = $unit;
    }


    /**
     * @param float $latitudeFrom   Departure
     * @param float $longitudeFrom  Departure
     * @param float $latitudeTo     Arrival
     * @param float $longitudeTo    Arrival
     *
     * @return float
     */
    public function getDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $d = 0;
        $earth_radius = 6371;
        $dLat = deg2rad($latitudeTo - $latitudeFrom);
        $dLon = deg2rad($longitudeTo - $longitudeFrom);

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));

        switch ($this->unit) {
            case 'km':
                $d = $c * $earth_radius;
                break;
            case 'mi':
                $d = $c * $earth_radius / 1.609344;
                break;
            case 'nmi':
                $d = $c * $earth_radius / 1.852;
                break;
        }

        return $d;
    }

    public function getTime($d, $v)
    {
        return $t = $d / $v;
    }
}