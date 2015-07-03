<?php
function geocode($address){
   $address = urlencode($address);
   $url = "http://maps.google.com/maps/api/geocode/json?address={$address}$&region=fr&sensor=true";
   
$aContext = array(
    'http' => array('proxy' => 'tcp://192.168.100.70:8080', 'request_fulluri' => true,),
                );

$cxContext = stream_context_create($aContext);

   $resp_json = file_get_contents($url, false, $cxContext);
   $resp = json_decode($resp_json, true);
 
   if($resp['status']=='OK'){
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];
         
        if($lati && $longi && $formatted_address){
            $data_arr = array();            
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
        } else {return false;}
    } else {return false;}
}

//$data_arr = geocode("83 rue de gergovie, 75014, paris, france");
//$data_arr = geocode("216 route de Lorient, 35000, RENNES");
//var_dump($data_arr);
                     
?>