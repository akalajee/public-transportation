# public-transportation
 public-transportation is a great application to create, sort and display 
 methods of transportations in a friendly manner. 
### Install
1. Unzip the code into your server root
2. Change data.php to include your desired data. Provide a sample input array containing the desirable boarding cards.
3. Run pilot.php

##### Dependencies
1. Apache
2. PHP 7.x
3. PHPUnit 6.4.0
##### Assumptions
1. For flight transportation type, if baggageDrop location is not specified,
   will assume baggage will be dropped automatically from previuos leg.

2.  No re-visit for the same city will occur, as the nature of the problem implies.
##### Running tests
1. phpunit --bootstrap src/model/airportBus.php tests/model/airportBusTest.php --testdox test
2. phpunit --bootstrap src/model/flight.php tests/model/flightTest.php --testdox test
3. phpunit --bootstrap src/model/train.php tests/model/trainTest.php --testdox test
##### Finished!