<?php
namespace TripSorter\Algo;

/**
 * package {$package}
 * Description of SimpleSoter
 *
 * @author dandrianarinivo
 * @version 1.0
 */
 class SimpleSorter extends AbstractSorter implements ISorter{
    public $list;
    public $pos;
    
    public function __construct() {
        $this->pos = 0;
    }

    public function setList(array $aList){
        $this->list = $aList;
    }

    /**
     * add a boarding card to the stack
     * @param Transport\BoardingCards\AbstractBoardingCard $oBoarding
     * @return void
     */
    public function add(Transport\BoardingCards\AbstractBoardingCard $oBoadring) {
        $this->list[] = $oBoadring;
    }

    /**
    * @todo
    */
    public function sort(){
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
        $this->list = $sorted;
        return $this;
    } 
    
 }