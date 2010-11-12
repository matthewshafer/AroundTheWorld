<?php

require_once("../AroundTheWorld.php");


$world = new AroundTheWorld();

printf("%f miles\n", $world->simpleLocationCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f miles invalid\n", $world->simpleLocationCalculationDecimal("37.76637243960179", -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f miles\n", $world->greatCircleDistanceCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f miles invalid\n", $world->greatCircleDistanceCalculationDecimal("37.76637243960179", -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f miles\n", $world->haversineCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f miles invalid\n", $world->haversineCalculationDecimal("fortytwo", -122.46734619140625, 37.8813571797486, -122.255859375));

printf("Now in KM\n");

$world = new AroundTheWorld("KM");

printf("%f Kilometers\n", $world->simpleLocationCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Kilometers\n", $world->simpleLocationCalculationDecimal(37.76637243960179, "-122.46734619140625", 37.8813571797486, -122.255859375));

printf("%f Kilometers invalid\n", $world->simpleLocationCalculationDecimal("thirtyseven", -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Kilometers\n", $world->greatCircleDistanceCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Kilometers invalid\n", $world->greatCircleDistanceCalculationDecimal("fifteen", -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Kilometers\n", $world->haversineCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Kilometers\n", $world->haversineCalculationDecimal("37.76637243960179", "-122.46734619140625", "37.8813571797486", "-122.255859375"));

printf("%f Kilometers invalid\n", $world->haversineCalculationDecimal("12point1", -122.46734619140625, 37.8813571797486, -122.255859375));

printf("Now in Feet\n");

$world = new AroundTheWorld("FT");

printf("%f Feet\n", $world->simpleLocationCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Feet invalid\n", $world->simpleLocationCalculationDecimal("3plus7", -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Feet\n", $world->greatCircleDistanceCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Feet invalid\n", $world->greatCircleDistanceCalculationDecimal("twelveminus1", -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Feet\n", $world->haversineCalculationDecimal(37.76637243960179, -122.46734619140625, 37.8813571797486, -122.255859375));

printf("%f Feet invalid\n", $world->haversineCalculationDecimal("37.76637243960179j", -122.46734619140625, 37.8813571797486, -122.255859375));


printf("Testing the DMS conversion\n");

$world = new AroundTheWorld();

printf("50 seconds 29 minutes and 50.5 seconds to decimal is %f\n", $world->dmsToSignedDecimal(50, 29, 50.5));
printf("50 seconds 29 minutes and 50.5 seconds to decimal is %f\n", $world->dmsToSignedDecimal(50, 29, "50.5"));
printf("-50 seconds 29 minutes and 50.5 seconds to decimal is %f\n", $world->dmsToSignedDecimal(-50, 29, 50.5));
printf("-50 seconds 29 minutes to decimal is %f\n", $world->dmsToSignedDecimal(-50, 29));



?>