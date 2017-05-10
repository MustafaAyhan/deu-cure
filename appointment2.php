
<?php
// read POST variables
$user = array();
array_push( $user, array("Tc"=>$_POST['user_tc'], "Name"=>$_POST['user_firstName'], "SurName"=>$_POST['user_surName']));

header('Content-type: application/json');
echo json_encode(array('user'=>$user));
?>