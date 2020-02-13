<?php

namespace TripSorter\Transport\BoardingCards;

/**
 * package {$package}
 * Description of TrainBoardingCard
 *
 * @author dandrianarinivo
 * @version 1.0
 */
class TrainBoardingCard extends AbstractBoardingCard {

    protected $seat;
    protected $train;

    function getSeat() {
        return $this->seat;
    }

    function setSeat($seat) {
        $this->seat = $seat;
        return $this;
    }

    public function __toString() {
        return sprintf(
            "Take {$this->type} {$this->name} From %s To %s. Sit in seat {$this->seat}", $this->from->__toString(), $this->to->__toString()
        );
    }

}
