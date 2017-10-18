<?php

/**
 * publicTransportation is a factory class to create 
 * the correct transportation child class 
 *
 * @version  $Revision: 1.0 $
 * @access   public
 */
require_once 'train.php';
require_once 'flight.php';
require_once 'airportBus.php';

class publicTransportationFactory {

    /**
     * Factory method to create the correct transportation
     * object with the correct fields
     *
     * @param  string $transportation_type string representation of the transportation method
     * @param  string $origin  an origin city 
     * @param  string $destination  a destination city 
     * @param  string $trip_number  {flightNumber for flightType, trainNumber for Train, or null for airport_bus}
     * @param  string $gate_number  gate number
     * @param  string $seat_number  seat number
     * @param  string $baggage_drop  baggage drop counter
     * @return publicTransportation
     *
     */
    public static function create(string $transportation_type, string $origin, string $destination, string $trip_number = null, string $gate_number = null, string $seat_number = null, string $baggage_drop = null): publicTransportation {
        switch ($transportation_type) {
            case "train":
                $object = new train($origin, $destination, $trip_number, $seat_number);
                break;
            case "flight":
                $object = new flight($origin, $destination, $trip_number, $gate_number, $seat_number, $baggage_drop);
                break;
            case "airport_bus":
                $object = new airportBus($origin, $destination);
                break;
            default:
                $object = new airportBus($origin, $destination);
                break;
        }
        return $object;
    }

}
