<?php
namespace TripSorter\Presenter;

/**
 * package {$package}
 * Description of Console
 *
 * @author dandrianarinivo
 * @version 1.0
 */
 class Console implements IPresenter{

    public $data;
    
    /**
    *setter
    */
    public function setData($aData){
        $this->data = $aData;
        return $this;
    }

    public function getData(){
        if(! $this->data instanceof \ITerator){
            throw new \InvalidArgumentException ('Only instance of Iterator are accepted');
        }
        return $this->data;
    }


     /**
     * return the trip sumury
     * @param \TripSorter\AbstractSorter $oList
     */
     public function print():string{
        try{
            $result = "";
            if(iterator_count($this->getData())){
                $iteration = 0;
                foreach ($this->getData() as $key => $boarding) {
                    $result .= ++$key . ' - ' . $boarding->__toString() . "\n";
                    ++$iteration ;
                }
                $result .= ++$iteration . " - You have arrived at your final destination\n";
            }
            return $result;
        }catch(\Exeption $e){
            return $e->getMessage();
        }
     }
 }