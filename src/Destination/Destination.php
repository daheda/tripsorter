<?php
namespace TripSorter\Destination;
/**
 * package {$package}
 * Description of Destionation
 *
 * @author dandrianarinivo
 * @version 1.0
 */
class Destination implements DestinationInterface{

    protected $name;
       
    /**
     * construct
     * @param string $name name of the destination
     */
    public function __construct($name) {
        $this->name = $name;
    }
    
    /**
     * @inheritdoc
     */
    public function __toString() {
        return $this->name;
    }

}
