<?php

namespace TripSorter;

/**
 * package {$package}
 * Description of Sorter
 *
 * @author dandrianarinivo
 * @version 1.0
 */
class Sorter {

    protected $list;
    protected $sorted ;
    
    public function __construct() {
        $this->sorted = array();
    }

    /**
     * add a boarding card to the stack
     * @param Transport\BoardingCards\AbstractBoardingCard $oBoarding
     * @return void
     */
    function add(Transport\BoardingCards\AbstractBoardingCard $oBoadring) {
        $this->list[] = $oBoadring;
    }

    /**
     * sort the trip,
     * @param int $start
     * @return void
     */
    function sort() {
        $sorted = [array_pop($this->list)];
        for ($i = count($this->list); $this->list && $i--;) {
            foreach ($this->list as $key => $card) {
                if (end($sorted)->getTo() === $card->getFrom()) {
                    array_push($sorted, $card);
                    unset($this->list[$key]);
                } elseif (reset($sorted)->getFrom() === $card->getTo()) {
                    array_unshift($sorted, $card);
                    unset($this->list[$key]);
                }
            }
        }
        $this->sorted = $sorted;
    }

    /**
     * return the trip sumury
     * @param void
     * @return string the trip description
     */
    function getTrip() {
        $result = "";
        $iteration = 0;
        foreach ($this->sorted as $key => $boarding) {
            $result .= ++$key . ' - ' . $boarding->__toString() . "\n";
            ++$iteration ;
        }
        $result .= ++$iteration . " - You have arrived at your final destination\n";
        
        return $result;
    }

}
