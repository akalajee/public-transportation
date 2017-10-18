<?php

/**
 * airportBus is a concrete class extending public transportation
 *
 * @version  $Revision: 1.0 $
 * @access   public
 */

require_once 'publicTransportation.php';

class airportBus extends publicTransportation {

    /**
     * Initializes publicTransportation
     *
     * @param  string $origin  an origin city
     * @param  string $destination  a destination city
     *
     */
    public function __construct(string $origin, string $destination) {
        parent::__construct($origin, $destination);
    }

    /**
     * an abstract function to describe the transportation
     * @access public
     */
    public function describe(): string {
        return "Take the airport bus from {$this->getOrigin()} to {$this->getDestination()}. No seat assignment.";
    }

}
