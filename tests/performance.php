<?php
require_once("../AroundTheWorld.php");
$world = new AroundTheWorld();

$maxRunsPerTest = 100000;

$start = microtime(true);

for($i = 0; $i < $maxRunsPerTest; $i++)
{
	$world->simpleLocationCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375);
}
$end = microtime(true);

printf("total time to run simple calculation %d times was %f seconds\n", $maxRunsPerTest, ($end - $start));


$start = microtime(true);

for($i = 0; $i < $maxRunsPerTest; $i++)
{
	$world->greatCircleDistanceCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375);
}
$end = microtime(true);

printf("total time to run great circle distance calculation %d times was %f seconds\n", $maxRunsPerTest, ($end - $start));

$start = microtime(true);

for($i = 0; $i < $maxRunsPerTest; $i++)
{
	$world->haversineCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375);
}
$end = microtime(true);

printf("total time to run the haversine calculation %d times was %f seconds\n", $maxRunsPerTest, ($end - $start));
?>