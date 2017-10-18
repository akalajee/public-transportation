<?php

/**
 * flight is an concrete class extending public transportation
 *
 * @version  $Revision: 1.0 $
 * @access   public
 */
require_once 'publicTransportation.php';

class flight extends publicTransportation {

    /**
     * Contains flight number
     * @access private
     * @var string
     */
    private $flightNumber;

    /**
     * Contains gate number
     * @access private
     * @var string
     */
    private $gateNumber;

    /**
     * Contains seat number
     * @access private
     * @var string
     */
    private $seatNumber;

    /**
     * Contains baggage drop counter
     * @access private
     * @var string
     */
    private $baggageDrop;

    /**
     * Initializes flight
     *
     * @param  string $origin  an origin city 
     * @param  string $destination  an destination city 
     * @param  string $flightNumber  flight number
     * @param  string $gateNumber  gate number
     * @param  string $seatNumber  seat number
     * @param  string $baggageDrop  baggage drop
     *
     */
    public function __construct(string $origin, string $destination, string $flightNumber, string $gateNumber, string $seatNumber, string $baggageDrop) {
        $this->ensureFieldNotEmpty("flightNumber", $flightNumber);
        $this->ensureFieldNotEmpty("gateNumber", $gateNumber);
        $this->ensureFieldNotEmpty("seatNumber", $seatNumber);
        parent::__construct($origin, $destination);
        $this->setFlightNumber($flightNumber);
        $this->setGateNumber($gateNumber);
        $this->setSeatNumber($seatNumber);
        $this->setBaggageDrop($baggageDrop);
    }

    /**
     * flight number setter 
     *
     * @param  string $flightNumber  
     * @access public
     */
    public function setFlightNumber(string $flightNumber): void {
        $this->flightNumber = $flightNumber;
    }

    /**
     * flight number getter 
     *
     * @return string flight number
     * @access public
     */
    public function getFlightNumber(): string {
        return $this->flightNumber;
    }

    /**
     * gate number setter 
     *
     * @param  string $gateNumber  
     * @access public
     */
    public function setGateNumber(string $gateNumber): void {
        $this->gateNumber = $gateNumber;
    }

    /**
     * gate number getter 
     *
     * @return string gate number
     * @access public
     */
    public function getGateNumber(): string {
        return $this->gateNumber;
    }

    /**
     * seat number setter 
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
     * baggage drop setter 
     *
     * @param  string $baggageDrop  
     * @access public
     */
    public function setBaggageDrop(string $baggageDrop): void {
        $this->baggageDrop = $baggageDrop;
    }

    /**
     * baggage drop getter 
     *
     * @return string baggage drop
     * @access public
     */
    public function getBaggageDrop(): string {
        return $this->baggageDrop;
    }

    /**
     * baggage drop utility description function
     *
     * @return string baggage drop description
     * @access public
     */
    public function getBaggageDropDescription(): string {
        if (is_numeric($this->getBaggageDrop())) {
            return "Baggage drop at ticket counter {$this->getBaggageDrop()}.";
        } elseif ($this->getBaggageDrop() == false) {
            return "Baggage will automatically be transferred from your last leg.";
        }
    }

    /**
     * an overridden function to describe train
     * @access public
     */
    public function describe(): string {
        return "From {$this->getOrigin()}, take flight {$this->getFlightNumber()} to {$this->getDestination()}. Gate {$this->getGateNumber()}, seat {$this->getSeatNumber()}.<br>" . $this->getBaggageDropDescription();
    }

}
