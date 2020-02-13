<?php
namespace TripSorter\Transport\BoardingCards;
/**
 * package {$package}
 * Description of BusBoardingCard
 *
 * @author dandrianarinivo
 * @version 1.0
 */
class BusBoardingCard extends AbstractBoardingCard {
    
    protected $seat;
    
    function getSeat() {
        return $this->seat;
    }

    function setSeat($seat) {
        $this->seat = $seat;
        return $this;
    }

    
    public function __toString() {
        return sprintf(
                "Take {$this->name} {$this->type} From %s To %s. {$this->seat}.",
                $this->from->__toString(),
                $this->to->__toString()
            );
    }

}
