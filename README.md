## Installation
Using Composer :

```
composer install
```

If you don't have composer, you can get it from [Composer](https://getcomposer.org/)

## Test the application
Using command line
1- Enter to the main folder.
2- run the command 
```
./vendor/bin/phpunit
```
## Explaination
- the probleme likes a Bipartite matching, we can use Eulerian path to solve the problem (https://en.wikipedia.org/wiki/Eulerian_path)
- the Eulerian algorithm is not yet implemented

Desing pattern Strategy is used to choose the algorithm, so we have 2 methods to solve the problem:
-Complexity of Eulerian algorithm : not yet implemented
-Complexity of SimpleSorter : O(n) = ((n-1)^2 -(n-1))/2 (polynomial)

Design pattern Factory is used to create the boarding card
```
return [
  'bus' => '\Daheda\TripSorter\Transport\BoardingCards\BusBoardingCard',
  'train' => '\Daheda\TripSorter\Transport\BoardingCards\TrainBoardingCard',
  'flight' => '\Daheda\TripSorter\Transport\BoardingCards\FlightBoardingCard',
];
```


