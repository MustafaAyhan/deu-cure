<?php
   if(isset($_POST['assay'])) {
        $assayType="aaaa";
        $assayDate ="bbbb";
        $assayResult ="cccc";
        $assayArry = array();
        array_push( $assayArry, array("assayType"=>$assayType, "assayDate"=>$assayDate, "assayResult"=>$assayResult));
        echo json_encode(array('assay'=>$assayArry));
   }
    ?>