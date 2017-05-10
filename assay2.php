<?php
   if(isset($_POST['assayNumber'])) {
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
                echo json_encode(array('Assays'=>$assayArry));
                $asd = json_encode(array('Assays'=>$assayArry));
                ?>
               <input type="hidden" name="allResult" value='<?php echo $asd; ?>'>
               <input type="submit" value="yolla">
           </form>
           
        </body>
    </html> 
    <?php 
     } 
?>