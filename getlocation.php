<?php
/**
* Author: CodexWorld
* Author URI: http://www.codexworld.com
* Function Name: getAddress()
* $latitude => Latitude.
* $longitude => Longitude.
* Return =>  Address of the given Latitude and longitude.
**/
function getAddress($latitude,$longitude){
    if(!empty($latitude) && !empty($longitude)){
        //Send request and receive json data by address
        $geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false'); 
        $output = json_decode($geocodeFromLatLong);
        $status = $output->status;
        //Get address from json data
        $address = ($status=="OK")?$output->results[1]->formatted_address:'';
        //Return address of the given latitude and longitude
        if(!empty($address)){
            return $address;
        }else{
            return false;
        }
    }else{
        return false;   
    }
}
/**
 * Use getAddress() function like the following.
 */
$latitude = '17.3945886';
$longitude = '78.4500496';
$address = getAddress($latitude,$longitude);


echo $address = $address?$address:'Not found';


?>





<?php
$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng=17.3945886,78.4500496&sensor=false');

        $output= json_decode($geocode);

    for($j=0;$j<count($output->results[0]->address_components);$j++){
               $cn=array($output->results[0]->address_components[$j]->types[0]);
           if(in_array("country", $cn))
           {
            $country= $output->results[0]->address_components[$j]->long_name;
           }
            }
            echo $country;
			
			?>