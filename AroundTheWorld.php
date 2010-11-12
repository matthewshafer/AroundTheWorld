<?php

class AroundTheWorld
{
	private $radius = null;

	/**
	 * __construct function.
	 * 
	 * Gets called whtn the AroundTheWorld object is created.  You can create the object with no parameters, which means it defaults to miles
	 * you can specify a specific unit of measurement or you can send your own.
	 *
	 * @access public
	 * @param string $radMod. (default: "M")
	 * @param float $customRad. (default: 3963.0)
	 * @return void
	 */
	public function __construct($radMod = "MI", $customRad = 3963.0)
	{
		switch($radMod)
		{
			case "MI":
				$this->radius = 3963.0;
				break;
			case "M":
				$this->radius = 6371009;
				break;
			case "KM":
				$this->radius = 6371.009;
				break;
			case "NM":
				$this->radius = 6371.009 * 0.539956803;
				break;
			case "FT":
				$this->radius = 3963.0 * 5280;
				break;
			case "CUSTOM":
				$this->radius = $customRad;
				break;
		}
	}
	
	
	/**
	 * simpleLocationCalculation function.
	 * 
	 * The accuracy with this function isnt super great, it has something like a 10% error.
	 * Upside is it should be quite a bit faster than the more complicated function
	 *
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
			$x = deg2rad($lat2 - $lat1);
			$y = deg2rad($lon2 - $lon1) * cos(deg2rad($lat1));
			
			$return = $this->radius * sqrt(pow($x, 2) + pow($y, 2));
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
	 *
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
			
			
			$return = $this->radius * acos((sin($lat1) * sin($lat2)) + (cos($lat1) * cos($lat2) * cos($lon2 - $lon1)));
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
	 *
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
			$return = $this->radius * $c;
		}
		else
		{
			$return = -1;
		}
		
		return $return;
	}
	
	/**
	 * dmsToSignedDecimal function.
	 * 
	 * @access public
	 * @param float $degrees
	 * @param float $minutes
	 * @param float $seconds. (default: 0)
	 * @return float containing the decimal degrees
	 */
	public function dmsToSignedDecimal($d, $m, $s = 0.0)
	{
		// figured i would cast it since d shouldn't be an int and not a float but by the end this should be a float
		(float)$finalValue = $d;
		// minutes are 1/60's of a degree and seconds are 1/60 of a minute(so they are 1/60 * 1/60 of a degree, which is why we get 1/3600)
		$ms = ($m * (1/60)) + ($s * (1/3600));
		
		if($d >= 0)
		{
			$finalValue += $ms;
		}
		// if the degrees happens to be less than 0 we need to subtract the minutes and seconds 
		else
		{
			$finalValue -= $ms;
		}
		
		return $finalValue;
	}

}
?>