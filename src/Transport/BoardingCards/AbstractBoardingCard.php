<?php
namespace TripSorter\Transport\BoardingCards;
/**
 * package {$package}
 * Description of AbstractBoardingCard
 *
 * @author dandrianarinivo
 * @version 1.0
 */
use TripSorter\Destination;

abstract class AbstractBoardingCard implements BoardingCardInterface{
    
    /**
     * @var string $type type of the boarding
     */
    protected $name;
    
    /**
     * @var \TripSorter\DestinationInterface
     */
    protected $from;
    
    /**
     * @var \TripSorter\DestinationInterface
     */
    protected $to;
    
    function __construct(Destination\Destination $from,Destination\Destination $to) {
        $this->from = $from;
        $this->to = $to;
    }
    
    
    
    public function getFrom() {
        return $this->from;
    }

    public function getTo() {
        return $this->to;
    }
    
    public function __toString() {
        return sprintf(
                "Take {$this->type} From %s To %s",
                $this->from->__toString(),
                $this->to->__toString()
            );
    }
    
    function getType() {
        return $this->type;
    }

    function setType($type) {
        $this->type = $type;
        return $this;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
        return $this;
    }

    
}
