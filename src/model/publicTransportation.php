<?php

/**
 * publicTransportation is an abstract class for representing public transportation
 * it unifies the transportation method functionality
 *
 * @version  $Revision: 1.0 $
 * @access   public
 */
abstract class publicTransportation {

    /**
     * Contains the origin City
     * @access private     
     * @var string
     */
    private $origin;

    /**
     * Contains the destination City
     * @access private
     * @var string
     */
    private $destination;

    /**
     * Initializes publicTransportation
     *
     * @param  string $origin  an origin city
     * @param  string $destination  a destination city
     *
     */
    public function __construct(string $origin, string $destination) {
        $this->ensureFieldNotEmpty("origin", $origin);
        $this->ensureFieldNotEmpty("destination", $destination);
        $this->setOrigin($origin);
        $this->setDestination($destination);
    }

    /**
     * origin setter 
     *
     * @param  string $origin  an origin city string
     * @access public
     */
    public function setOrigin(string $origin): void {
        $this->origin = $origin;
    }

    /**
     * origin getter 
     *
     * @return string transportation origin city
     * @access public
     */
    public function getOrigin(): string {
        return $this->origin;
    }

    /**
     * destination setter 
     *
     * @param  string $destination  an destination city string
     * @access public
     */
    public function setDestination(string $destination): void {
        $this->destination = $destination;
    }

    /**
     * destination getter 
     *
     * @return string transportation destination city
     * @access public
     */
    public function getDestination(): string {
        return $this->destination;
    }

    /**
     * an abstract function to describe the transportation
     * @access public
     */
    public abstract function describe();
    
    /**
     * validation function to make sure the passed
     * field has non-empty value
     *
     * @access protected
     */
    protected function ensureFieldNotEmpty(string $fieldName, string $fieldValue): void
    {
        if ($fieldValue === "") {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is empty/has no value',
                    $fieldName
                )
            );
        }
    }

}
