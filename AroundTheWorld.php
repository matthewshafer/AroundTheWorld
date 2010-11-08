<?php

class AroundTheWorld
{

	public function __construct()
	{
		
	}
	
	
	/**
	 * simpleLocationCalculation function.
	 * 
	 * The accuracy with this function isnt super great, it has something like a 10% error.
	 * Upside is it should be quite a bit faster than the more complicated function
	 * @access public
	 * @param float $lat1
	 * @param float $lon1
	 * @param float $lat2
	 * @param float $lon2
	 * @return float containing the number of miles between the two points, -1 if one or more invalid values
	 */
	public function simpleLocationCalculationDecimal($lat1, $lon1, $lat2, $lon2)
	{
		$return = 0.0;
		
		if(is_float($lat1) && is_float($lon1) && is_float($lat2) && is_float($lon2))
		{
			$x = 69.1 * ($lat2 - $lat1);
			$y = 53.0 * ($lon2 - $lon1);
			
			$return = sqrt($x * $x + $y * $y);
		}
		else
		{
			$return = -1;
		}
		
		return $return;
	}
	
	/**
	 * greatCircleDistanceCalculationDecimal function.
	 * 
	 * The accuracy with this function should be relatively accurate, it uses the great circle distance formula
	 
	 * @access public
	 * @param float $lat1
	 * @param float $lon1
	 * @param float $lat2
	 * @param float $lon2
	 * @return float containing the number of miles between the two points, -1 if one or more invalid values
	 */
	public function greatCircleDistanceCalculationDecimal($lat1, $lon1, $lat2, $lon2)
	{
		$return = 0.0;
		
		if(is_float($lat1) && is_float($lon1) && is_float($lat2) && is_float($lon2))
		{
			$lat1 = deg2rad($lat1);
			$lon1 = deg2rad($lon1);
			$lat2 = deg2rad($lat2);
			$lon2 = deg2rad($lon2);
			
			
			$return = 3963.0 * acos((sin($lat1) * sin($lat2)) + (cos($lat1) * cos($lat2) * cos($lon2 - $lon1)));
		}
		else
		{
			$return = -1;
		}
		
		return $return;
	}
	
	/**
	 * haversineCalculationDecimal function.
	 * 
	 * This is the most accurate method for finding the distance between two points
	 * @access public
	 * @param float $lat1
	 * @param float $lon1
	 * @param float $lat2
	 * @param float $lon2
	 * @return float containing the number of miles between the two points, -1 if one or more invalid values
	 */
	public function haversineCalculationDecimal($lat1, $lon1, $lat2, $lon2)
	{
		$return = 0.0;
		
		if(is_float($lat1) && is_float($lon1) && is_float($lat2) && is_float($lon2))
		{
			$tLat = deg2rad($lat2 - $lat1);
			$tLon = deg2rad($lon2 - $lon1);
			
			// figured we could simplify some things.  The actual fomula has sin($tlat/2) * sin($tLat/2) so
			// we could just do the sin once and then raise that to the power of 2.
			$a = pow(sin($tLat/2), 2) + ((cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * pow(sin($tLon/2), 2)));
			// we could also move this up into the above line and then save creating another variable
			$c = 2 * asin(min(1, sqrt($a)));
			
			// converting to miles
			$return = 3963.0 * $c;
		}
		else
		{
			$return = -1;
		}
		
		return $return;
	}

}
?>