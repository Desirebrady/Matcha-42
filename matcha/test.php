<?php 

$lat = -25.7479;
$long = 28.2293;

$lat2 = -25.756222;
$long2 = 28.238347;


/*
function getDistanceBetweenPointsNew($lat, $long, $lat2, $long2, $unit) {
    $theta = $longitude1 - $longitude2;
    $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
    $distance = acos($distance);
    $distance = rad2deg($distance);
    $distance = $distance * 60 * 1.1515; switch($unit) {
         case 'Mi': break; case 'Km' : $distance = $distance * 1.609344;
    }
    return (round($distance,2));
}
*/


// function distance($lat, $long, $lat2, $long2)
// {
//     $theta = $long - $long2;
//     $dist = sin(deg2rad($lat)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
//     $dist = acos($dist);
//     $dist = rad2deg($dist);
//     $miles = $dist * 60 * 1.1515;
//     return ($miles * 1.609344);
// }

function distance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $rad = M_PI / 180;
        //Calculate distance from latitude and longitude
        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin($latitudeFrom * $rad)
            * sin($latitudeTo * $rad) +  cos($latitudeFrom * $rad)
            * cos($latitudeTo * $rad) * cos($theta * $rad);

        return acos($dist) / $rad * 60 *  1.853;
    }



echo round(distance($lat2, $long2, $lat, $long));
?>