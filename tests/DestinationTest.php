<?php
/**
 * package {$package}
 * Description of BoardingPassTest
 *
 * @author dandrianarinivo
 * @version 1.0
 */
use TripSorter as DTest
    ,PHPUnit\Framework\TestCase;

class DestinationTest extends TestCase{
    public $oDestination;

    public function setUp(){
        $this->oDestination = new DTest\Destination\Destination('Dubaï');
    }

    public function testvalidDestination(){
        $this->assertTrue($this->oDestination->__toString() === 'Dubaï');
    }
}