<?php

/**
 * train is an concrete class extending public transportation
 *
 * @version  $Revision: 1.0 $
 * @access   public
 */
require_once 'publicTransportation.php';

class train extends publicTransportation {

    /**
     * Contains train number
     * @access private
     * @var string
     */
    private $trainNumber;

    /**
     * Contains seat number
     * @access private
     * @var string
     */
    private $seatNumber;

    /**
     * Initializes train
     *
     * @param  string $origin  an origin city 
     * @param  string $destination  a destination city 
     * @param  string $trainNumber  train number
     * @param  string $seatNumber  seat number
     *
     */
    public function __construct(string $origin, string $destination, string $trainNumber, string $seatNumber) {
        $this->ensureFieldNotEmpty("trainNumber", $trainNumber);
        $this->ensureFieldNotEmpty("seatNumber", $seatNumber);
        parent::__construct($origin, $destination);
        $this->setTrainNumber($trainNumber);
        $this->setSeatNumber($seatNumber);
    }

    /**
     * train number setter 
     *
     * @param  string $trainNumber  
     * @access public
     */
    public function setTrainNumber(string $trainNumber): void {
        $this->trainNumber = $trainNumber;
    }

    /**
     * train number getter 
     *
     * @return string train number
     * @access public
     */
    public function getTrainNumber(): string {
        return $this->trainNumber;
    }

    /**
     * sear number setter 
     *
     * @param  string $seatNumber  
     * @access public
     */
    public function setSeatNumber(string $seatNumber): void {
        $this->seatNumber = $seatNumber;
    }

    /**
     * seat number getter 
     *
     * @return string seat number
     * @access public
     */
    public function getSeatNumber(): string {
        return $this->seatNumber;
    }

    /**
     * an overridden function to describe train
     * @access public
     */
    public function describe(): string {
        return "Take train {$this->getTrainNumber()} from {$this->getOrigin()} to {$this->getDestination()}. Sit in seat {$this->getSeatNumber()}.";
    }

}
