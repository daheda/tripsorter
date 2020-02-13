<?php
namespace TripSorter\Algo;

/**
 * package {$package}
 * Description of AbstractSorter
 *
 * @author dandrianarinivo
 * @version 1.0
 */
 abstract class AbstractSorter{
  
    abstract public function __construct();
     /**
    *@override
    */
    public function current (){
        return $this->list[$this->pos];
    }

    /**
    *@override
    */
    public function key () :int{
         return $this->pos;
    }

    /**
    *@override
    */
    public function next (){
         ++$this->pos;
    }

    /**
    *@override
    */
    public function rewind (){
         $this->pos = 0;
    }

    /**
    *@override
    */
    public function valid (): bool{
         return isset($this->list[$this->pos]);
    }

 }