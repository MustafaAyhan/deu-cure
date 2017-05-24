<?php
   if(isset($_POST['assayNumber'])) {
       echo $_POST['assayNumber'];
    ?>
    <html>
        <head>

        </head>
        <body>
           <form action="assay.php" method="post">
                <?php
                $assayType="aaaa";
                $assayDate ="bbbb";
                $assayResult ="cccc";
                $assayArry = array();
                array_push( $assayArry, array("AssayType"=>$assayType, "AssayDate"=>$assayDate, "AssayResult"=>$assayResult));
                echo json_encode(array('Assay'=>$assayArry));
                $asd = json_encode(array('Assay'=>$assayArry));
                ?>
               <input type="hidden" name="allResult" value='<?php echo $asd; ?>'>
               <input type="submit" value="Send Data">
           </form>
           <form action="includes/assayRegister.php" method="post">
                
               <?php
                $assayArry = array();
                
                array_push( $assayArry, array("tc"=>11, "assayNumber"=>88));
                echo json_encode(array('Assay'=>$assayArry));
                $asd = json_encode(array('Assay'=>$assayArry));
                
                ?>
                <input type="hidden" name="newAssay" value='<?php echo $asd; ?>'>
                <input type="submit" value="Yolla">
           </form>
           
        </body>
    </html> 
    <?php 
     } 
?>