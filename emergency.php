<?php
// read POST variables
$user = array();
array_push( $user, array("Tc"=>$_GET['tc'], "Name"=>$_GET['firstName'], "SurName"=>$_GET['surName'], "Address" => $_GET['address']));

header('Content-type: application/json');
echo json_encode(array('user'=>$user));

// get the result and parse to JSON


// desired text to be hashed by MD5
//$original_text = $_GET["tc"]; 
//
//$headers = array(
//"Content-Type: application/json"
//);
//
//// query string for sending our text parameter
//$fields = array("tc" => $original_text);
//
//// prepare GET query
//// can be tested by web browser, http://md5.jsontest.com/?text=hello%20world
//$url = "http://localhost/deu-cure/emergency.php?" . http_build_query($fields);
//
//// initialize a cURL session
//$ch = curl_init();
//
//// set the url, number of GET vars, GET data
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_POST, false);
//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//// TRUE to return the transfer as a string of the return value of curl_exec() 
//// instead of outputting it out directly
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
//// FALSE to stop cURL from verifying the peer's certificate.
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//
//// execute request
//$result = curl_exec($ch);
//
//// close cURL resource, and free up system resources
//curl_close($ch);
//
//echo json_encode($_POST);
		
		

?>		