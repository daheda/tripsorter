<?php
/**
 * package {$package}
 * Description of PresenterTest
 *
 * @author dandrianarinivo
 * @version 1.0
 */
use TripSorter as DTest
    ,PHPUnit\Framework\TestCase;

class PresenterTest extends TestCase{
    public $console;
    
    public function setup(){
        $this->console = new DTest\Presenter\Console();
    }

    /**
    * Test Case for print result
    * @return void
    */
    public function testPrintOutEmpty(){
        $oIterator = new ArrayIterator([]);
        $this->assertTrue($this->console
                    ->setData($oIterator)
                    ->print() == "");
    }

    /**
    *Test case exception excepted if we print a non itarator object
    */
    public function testPrintOutException(){
        $this->expectException(\InvalidArgumentException::class);
        $this-> expectExceptionMessage("Only instance of Iterator are accepted");
        $this->console->setData([])->print();
    }
}