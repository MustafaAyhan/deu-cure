<html>
    <head>
        
    </head>
    <body>
       <form action="/deu-cure/includes/appointmentUserControl.php" method="post">
           <input type="hidden" name="tc" value="11">
           <input type="hidden" name="password" value="asd">
           <input type="submit" value="Send Data">
       </form>
       <?php
        if(isset($_POST['flag'])){
            $isMemberFlag = $_POST['flag'];
            $serviceParamObj = json_decode($isMemberFlag, true);
            $assayType = $serviceParamObj['user'][0]['Flag'];
            if($assayType == false)
                echo "aasdasdad";
            echo $assayType;
            //var_dump($serviceParamObj);
        }
        ?>
    </body>
</html>