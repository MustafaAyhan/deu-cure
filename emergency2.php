
<?php
    if(isset($_POST['emergency'])){
        $varArr = json_decode($_POST['emergency'], true);
        $postedTc = $varArr["Tc"];

        $tc="aaaa";
        $name ="bbbb";
        $surname ="cccc";
        $drNote ="dddd";
        $ptNote ="eeee";
        $emergencyArry = array();
        array_push( $emergencyArry, array("tc"=>$tc, "name"=>$name, "surname"=>$surname, "drNote" => $drNote, "ptNote" => $ptNote));
        echo json_encode(array('emergency'=>$emergencyArry));
    }
?>