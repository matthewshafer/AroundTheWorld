<?php

require_once("../AroundTheWorld.php");


$world = new AroundTheWorld();

printf("%f miles\n", $world->simpleLocationCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f miles invalid\n", $world->simpleLocationCalculationDecimal("37.76637243960179", -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f miles\n", $world->greatCircleDistanceCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f miles invalid\n", $world->greatCircleDistanceCalculationDecimal("37.76637243960179", -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f miles\n", $world->haversineCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f miles invalid\n", $world->haversineCalculationDecimal("37.76637243960179", -122.46734619140625, 37.8813571797486, -122.255859375));

printf("Now in KM\n");

$world = new AroundTheWorld("KM");

printf("%f Kilometers\n", $world->simpleLocationCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Kilometers invalid\n", $world->simpleLocationCalculationDecimal("37.76637243960179", -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Kilometers\n", $world->greatCircleDistanceCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Kilometers invalid\n", $world->greatCircleDistanceCalculationDecimal("37.76637243960179", -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Kilometers\n", $world->haversineCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Kilometers invalid\n", $world->haversineCalculationDecimal("37.76637243960179", -122.46734619140625, 37.8813571797486, -122.255859375));



?>