
<?php
if(isset($_POST['SSN'])){
    $varArr = $_POST['SSN'];
    if($varArr != null){
        $AppointmentID="aaaa";
        $PatientName ="bbbb";
        $PatientSSN ="bbbb";
        $Date ="bbbb";
        $Time ="bbbb";
        $BranchName ="cccc";
        $SubbranchName ="cccc";
        $DoctorName ="cccc";
        $appArry = array();
        array_push( $appArry, array("AppointmentID"=>$AppointmentID, "PatientName"=>$PatientName, 
                                    "PatientSSN"=>$PatientSSN,"Date"=>$Date,
                                    "Time"=>$Time,"BranchName"=>$BranchName,
                                    "SubbranchName"=>$SubbranchName,"DoctorName"=>$DoctorName));
        array_push( $appArry, array("AppointmentID"=>$AppointmentID, "PatientName"=>$PatientName, 
                                    "PatientSSN"=>$PatientSSN,"Date"=>$Date,
                                    "Time"=>$Time,"BranchName"=>$BranchName,
                                    "SubbranchName"=>$SubbranchName,"DoctorName"=>$DoctorName));
        echo json_encode(array('appointments'=>$appArry));
    }
}
?>