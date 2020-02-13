<?php
/**
 * package {$package}
 * Description of SimpleSorterTest
 *
 * @author dandrianarinivo
 * @version 1.0
 */
use TripSorter as DTest
    ,PHPUnit\Framework\TestCase;

class SimpleSorterTest extends TestCase{
    
    protected $oSorter;
    protected $oConsole;
    protected $aRawListDestination = [];
    protected $aBoarding = [];

    protected function createListDestination(array $aList){
        foreach($aList as $sDest){
            $this->aRawListDestination[$sDest] = new DTest\Destination\Destination($sDest);
        }
    }

    protected function getDestination(string $sDest) : DTest\Destination\Destination{
        return $this->aRawListDestination[$sDest] ?? new DTest\Destination\Destination($sDest); 
    }

    protected function createBoardinCard(){
        $this->aBoarding[] = (DTest\Transport\BoardingCardFactory::create('bus'
                        ,$this->getDestination('Barcelona')
                        ,$this->getDestination('Gerona Airport')))
                    ->setName('airport')
                    ->setSeat('No seat assignment');
        
        $this->aBoarding[] = (DTest\Transport\BoardingCardFactory::create('train'
                        ,$this->getDestination('Madrid')
                        ,$this->getDestination('Barcelona')))
                    ->setName('78A')
                    ->setSeat('45B');
        
         $this->aBoarding[] = (DTest\Transport\BoardingCardFactory::create('flight'
                        ,$this->getDestination('Stockholm')
                        ,$this->getDestination('New York JFK')))
                    ->setName('SK22')
                    ->setSeat('7B')
                    ->setGate('22')
                    ->setBaggageDrop('will we automatically transferred from your last leg');
        
          $this->aBoarding[] = (DTest\Transport\BoardingCardFactory::create('flight'
                        ,$this->getDestination('Gerona Airport')
                        ,$this->getDestination('Stockholm')))
                    ->setSeat('3A')
                    ->setName('SK455')
                    ->setGate('45B')
                    ->setBaggageDrop('drop at ticket counter 344');
        
        $this->oSorter->setList($this->aBoarding);
    }

    public function setup(){
        $this->oSorter = new DTest\Algo\SimpleSorter();
        $this->createListDestination(['Paris','London','Madrid','Barcelona','Gerona Airport','Stockholm','New York JFK']);
        $this->createBoardinCard();
        DTest\Transport\BoardingCardFactory::loadConfig(require __DIR__.'/../src/config.php');
        $this->oConsole = new DTest\Presenter\Console();
    }


    /**
     *test if we have the right output 
     */
    function testSortTrip(){
        $expectedRes = <<<TEXT
1 - Take train 78A From Madrid To Barcelona. Sit in seat 45B
2 - Take airport bus From Barcelona To Gerona Airport. No seat assignment.
3 - From Gerona Airport, take flight SK455 To Stockholm. Gate 45B, seat 3A
Baggage drop at ticket counter 344
4 - From Stockholm, take flight SK22 To New York JFK. Gate 22, seat 7B
Baggage will we automatically transferred from your last leg
5 - You have arrived at your final destination\n
TEXT;
    
        $this->assertEquals($expectedRes, $this->oConsole->setData($this->oSorter->sort())->print());
    }

    function testSortTripWithOtherDestination(){
        $expectedRes = <<<TEXT
1 - From Paris, take flight AF125 To Madrid. Gate A2, seat 73B
Baggage will sent by Post
2 - Take train 78A From Madrid To Barcelona. Sit in seat 45B
3 - Take airport bus From Barcelona To Gerona Airport. No seat assignment.
4 - From Gerona Airport, take flight SK455 To Stockholm. Gate 45B, seat 3A
Baggage drop at ticket counter 344
5 - From Stockholm, take flight SK22 To New York JFK. Gate 22, seat 7B
Baggage will we automatically transferred from your last leg
6 - You have arrived at your final destination\n
TEXT;
        $aData = array_merge($this->aBoarding,[
            (DTest\Transport\BoardingCardFactory::create('flight'
                        ,$this->getDestination('Paris')
                        ,$this->getDestination('Madrid')))
                    ->setName('AF125')
                    ->setSeat('73B')
                    ->setGate('A2')
                    ->setBaggageDrop('will sent by Post')
        ]);
        $this->oSorter->setList($aData);
        $this->assertEquals($expectedRes, $this->oConsole->setData($this->oSorter->sort())->print());
    }        
}