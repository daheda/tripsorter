<?php

namespace TripSorter\Transport\BoardingCards;

/**
 * package {$package}
 * Description of FlightBoardingCard
 *
 * @author dandrianarinivo
 * @version 1.0
 */
class FlightBoardingCard extends AbstractBoardingCard {

    protected $gate;
    protected $seat;
    protected $baggageDrop;
    protected $flight;

    function getGate() {
        return $this->gate;
    }

    function getSeat() {
        return $this->seat;
    }

    function setGate($gate) {
        $this->gate = $gate;
        return $this;
    }

    function setSeat($seat) {
        $this->seat = $seat;
        return $this;
    }

    function getBaggageDrop() {
        return $this->baggageDrop;
    }

    function setBaggageDrop($baggageDrop) {
        $this->baggageDrop = $baggageDrop;
        return $this;
    }


    /**
     * @inherite
     */
    public function __toString() {
        return sprintf(
            "From %s, take {$this->type} {$this->name} To %s. Gate {$this->gate}, seat {$this->seat}\nBaggage {$this->baggageDrop}", $this->from->__toString(), $this->to->__toString()
        );
    }
    
}
