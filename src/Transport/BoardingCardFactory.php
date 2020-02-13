<?php

namespace TripSorter\Transport;

/**
 * package {$package}
 * Description of BoardingCardFactory
 *
 * @author dandrianarinivo
 * @version 1.0
 */
use TripSorter\Destination as destination;

class BoardingCardFactory {

    static $config;
    /**
     * create a bording card
     * @param string $type of the boarding card
     * @param \Destination  $from departure
     * @param \Destination $to arrival
     */
    static function create($type,destination\Destination $from,destination\Destination $to){
        try{
            $class = self::getClassByConf($type);
            $instance = new $class($from,$to);
            $instance->setType($type);
            
            if(! $instance instanceof \TripSorter\Transport\BoardingCards\AbstractBoardingCard)
                throw new \InvalidArgumentException ('Invalid parameter : '.$name.' does not implement BoardingCardInterface');
             
            return $instance;
            
        } catch (\Exception $e) {
            return null;
        }
    }
    
    /**
     * get class from a map
     */
    static function getClassByConf($name){
            
        if(!isset(self::$config[$name]))
            throw new \LogicException ('Class not found');
        
        return self::$config[$name];
        
    }
    
    static function loadConfig(array $config){
        self::$config = $config;
    }
}
