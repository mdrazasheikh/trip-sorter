## Prerequisite
* [PHP > 7.0.0](https://www.php.net/downloads)
* [Composer](https://getcomposer.org/)
* [Docker](https://docs.docker.com/get-docker/) (optional)

## Installation
Using Composer :

```
composer install
```
## Assumptions
* Run all the commands from the root folder of the app
* Data source is from `DataSource` folder on the app root
* only json formats from file are supported
* There is always a start and end for the trips
* The output is currently printed via `print_r`

## Optimizations
* Tests do not cover all corners of the code. Fine tuning can be done for this
* Factory can be implemented to support multiple request/response format based on interface segregation as in the implementation with less efforts
* Can be extended to more transportation easily

## Run the application
###### CLI
```
php index.php
```
###### PHP web server
```
php -S localhost:<PORT>
```
###### Docker
```
docker build -t trip-sorter .
docker run trip-sorter
```

select a `<PORT>` which is currently not in use.

## Tests
To run tests make sure you are in the main folder, and then you can run this command line :

```
./vendor/bin/phpunit tests
```
