
<?php
// read POST variables
$user = array();
array_push( $user, array("Tc"=>$_GET['tc'], "Name"=>$_GET['firstName'], "SurName"=>$_GET['surName'], "Address" => $_GET['address']));

header('Content-type: application/json');
echo json_encode(array('user'=>$user));
?>