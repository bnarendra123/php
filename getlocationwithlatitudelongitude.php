<?php


/* results for latitudes and longitude values 

/*premise: 10-3-291/B/9
political: Vijaynagar Colony
political: Venkatadri Colony
political: Masab Tank
locality: Hyderabad
administrative_area_level_2: Hyderabad
administrative_area_level_1: Telangana
country: India
postal_code: 500057*/


include 'config.php';

$ruid= $_GET['rid'];
$lat= $_GET['lat'];
$lng= $_GET['lng'];

//$address= getaddress($lat,$lng);


$geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$lng.'&sensor=false');

        $output= json_decode($geocode);

    for($j=0;$j<count($output->results[0]->address_components);$j++){
               $cn=array($output->results[0]->address_components[$j]->types[0]);
           if(in_array("administrative_area_level_2", $cn))
           {
            $locality= $output->results[0]->address_components[$j]->long_name;
           }
            }
      

if($lat=='' && $lng==''){

echo '{"status":200}';

}

else {

$insert = "update register set areainterest='$locality' where ruid='$ruid'";


$insert1 = mysqli_query($connect,$insert);


if($insert1){

echo '{"status":100}';

}else{


echo '{"status":200}';

}

}







?>