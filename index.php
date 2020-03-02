<?php

use Src\Output\TripOutput;
use Src\Reader\Json;
use Src\Sorter\TripSorter;

require_once __DIR__ . '/vendor/autoload.php';

define('FILE_PATH', __DIR__ . '/DataSource');

$file = FILE_PATH . '/boardingCards.json';

$jsonReader = new Json();
$trips = $jsonReader->fromFileAsArray($file);

$tripSorter = new TripSorter($trips);
$tripSorter->sort();

$tripOutput = new TripOutput($tripSorter->getTrips());
echo 'Source Data. Path : ' . $file . PHP_EOL;
print_r(json_encode($trips));
echo PHP_EOL . 'Output: ' . PHP_EOL;
print_r($tripOutput->getAsText());
die;