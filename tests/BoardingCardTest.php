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

class BoardingCardTest extends TestCase{
    public $oFactory;
    public $oFrom;
    public $oTo;

    public function setup(){
        DTest\Transport\BoardingCardFactory::loadConfig(require __DIR__.'/../src/config.php');
        $this->oFrom = new DTest\Destination\Destination('Mauritius');
        $this->oTo = new DTest\Destination\Destination('Dubaï');
    }

    public function testCanCreateTrainBoaring(){
        $oBoadring = 
            DTest\Transport\BoardingCardFactory::create('train',$this->oFrom,$this->oTo);
        $oBoadring->setSeat('9A')
                              ->setName('Eurostar');
        $this->assertInstanceOf('\TripSorter\Transport\BoardingCards\TrainBoardingCard', $oBoadring);
        $this->assertInstanceOf('\TripSorter\Destination\Destination', $oBoadring->getFrom());
        $this->assertInstanceOf('\TripSorter\Destination\Destination', $oBoadring->getTo());
        $this->assertTrue($oBoadring->getFrom()->__toString() == 'Mauritius');
        $this->assertTrue($oBoadring->getTo()->__toString() == 'Dubaï');
    }

    public function testCanCreateBusBoarding(){
        $oBoadring = 
            DTest\Transport\BoardingCardFactory::create('bus',$this->oFrom,$this->oTo);
        $oBoadring->setSeat('No seat')
                              ->setName('airport');
        $this->assertInstanceOf('\TripSorter\Transport\BoardingCards\BusBoardingCard', $oBoadring);
        $this->assertInstanceOf('\TripSorter\Destination\Destination', $oBoadring->getFrom());
        $this->assertInstanceOf('\TripSorter\Destination\Destination', $oBoadring->getTo());
        $this->assertTrue($oBoadring->getFrom()->__toString() == 'Mauritius');
        $this->assertTrue($oBoadring->getTo()->__toString() == 'Dubaï');
    }

    public function testCanCreateFlightBoarding(){
        $oBoadring = 
            DTest\Transport\BoardingCardFactory::create('flight',$this->oFrom,$this->oTo);
        $oBoadring->setSeat('45B')
                    ->setName('SK22')
                    ->setGate('E2')
                    ->setBaggageDrop('Counter 33');
        $this->assertInstanceOf('\TripSorter\Transport\BoardingCards\FlightBoardingCard', $oBoadring);
        $this->assertInstanceOf('\TripSorter\Destination\Destination', $oBoadring->getFrom());
        $this->assertInstanceOf('\TripSorter\Destination\Destination', $oBoadring->getTo());
        $this->assertTrue($oBoadring->getFrom()->__toString() == 'Mauritius');
        $this->assertTrue($oBoadring->getTo()->__toString() == 'Dubaï');
    }

    
}