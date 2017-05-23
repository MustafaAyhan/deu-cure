<?php
include "../DataLayer/db.php";
include "../LogicLayer/UserManager.php";
if(isset($_POST['tc'])){
    if(isset($_POST['password'])){
        $tc = $_POST['tc'];
        $password = $_POST['password'];        
        $user = UserManager::selectUser($tc);
        
        if($password == $user->getPassword()){
            $flag = true;
        } 
        else {
            $flag = false;
        }
        
        $Sendedflag = array();
        array_push($Sendedflag, array("Flag"=>$flag));
        $flag = json_encode(array("user"=>$Sendedflag));
        echo $flag;
        ?>
        
        <form id="jsform" action="../appointment3.php" method="post">
           <input type="hidden" name="flag" value='<?php echo $flag; ?>'>
        </form>
        <script type="text/javascript">
            document.getElementById('jsform').submit();
        </script>

        <?php

    }
}
?>