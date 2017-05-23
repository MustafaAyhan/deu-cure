<?php
    if(isset($_GET['emergency'])){
        $varArr = json_decode($_GET['emergency'], true);
        echo $_GET['emergency'];
    }
   if(isset($_POST['tc'])) {
       echo $_POST['tc'];
    ?>
    <html>
        <head>

        </head>
        <body>
          <?php
            
        ?>
           <form action="emergency.php" method="post">
                <?php
                $tc="aaaa";
                $name ="bbbb";
                $surname ="cccc";
                $drNote ="dddd";
                $ptNote ="eeee";
                $emergencyArry = array();
                array_push( $emergencyArry, array("TC"=>$tc, "Name"=>$name, "Surname"=>$surname, "drNote" => $drNote, "ptNote" => $ptNote));
                echo json_encode(array('Emergency'=>$emergencyArry));
                $asd = json_encode(array('Emergency'=>$emergencyArry));
                ?>
               <input type="hidden" name="EmergencyPatientInfo" value='<?php echo $asd; ?>'>
               <input type="submit" value="Send Data">
           </form>
           
        </body>
    </html> 
    <?php 
     } 
?>