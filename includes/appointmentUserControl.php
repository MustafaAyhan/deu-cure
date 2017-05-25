<?php
session_start();
include "../DataLayer/db.php";
include "../LogicLayer/UserManager.php";
if(isset($_POST['patientSSN'])){
    if(isset($_POST['patientPassword'])){
        $tc = $_POST['patientSSN'];
        $password = $_POST['patientPassword'];
        $user = UserManager::selectUser($tc);
        $name = $user->getFirstName() . ' ' . $user->getSurName();
        $user = UserManager::selectUser($tc);
        
        if($password == $user->getPassword()){
            $Sendedflag = array();
            array_push($Sendedflag, array("PatientSSN"=>$tc,"PatientPassword"=>$password,"PatientName"=>$name));
            echo json_encode(array("Patient"=>$Sendedflag));
            
            ?>
<!--
            <form id="jsform" action="../appointment3.php" method="post">
               <input type="hidden" name="patientControll" value='<?php echo $flag; ?>'>
            </form>
            <script type="text/javascript">
                document.getElementById('jsform').submit();
            </script>
-->
        <?php
        } 
        else {
            $flag=null;
            echo json_encode(array("Flag"=>$flag));
        }
    }
}
?>