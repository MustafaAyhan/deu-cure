<html>
    <head>
        
    </head>
    <body>
       <form action="/deu-cure/includes/appointmentUserControl.php" method="post">
           <input type="hidden" name="tc" value="11">
           <input type="hidden" name="password" value="1111">
           <input type="submit" value="Send Data">
       </form>
       <?php
        if(isset($_POST['patientControll'])){
            echo $_POST['patientControll'];
            $isMemberFlag = $_POST['patientControll'];
            $serviceParamObj = json_decode($isMemberFlag, true);
            $assayType = $serviceParamObj['Patient'][0]['PatientSSN'];
            /*if($assayType != null)
                echo "aasdasdad";
            echo $assayType;*/
            //var_dump($serviceParamObj);
        }
        ?>
    </body>
</html>