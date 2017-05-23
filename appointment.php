<?php include "includes/header.php"; ?>
        <?php include "includes/navigation.php"; ?>
        <!-- banner -->
        <div class="banner page-head">
            <div class="logo">
                <h1><a href="index.php">DEU CURE</a></h1>
            </div>
            <div class="search">
            <?php 
            if(!isset($_SESSION['user_role']))
                echo "<a href='login.php'><i class='glyphicon glyphicon-user'></i></a>";
            else{
                //Emergency Module web service.
                $userTc = $_SESSION['tc'];
                $userFirstName = $_SESSION['firstName'];
                $userSurname = $_SESSION['surName'];
                $userAddress = $_SESSION['address'];
                $emergencyInfoArray = array();
                array_push($emergencyInfoArray, array("tc"=>$userTc, "firstName"=>$userFirstName, "surname"=>$userSurname, "address"=>$userAddress));
                $allInfoToEmergency = json_encode(array('Emergency'=>$emergencyInfoArray));
                //echo $allInfoToEmergency;
                echo "<a target='_blank'  href='emergency2.php?emergency={$allInfoToEmergency}' id='' title='Call An Ambulance'><i class='glyphicon glyphicon-plus'></i></a>";
            }
            ?>
            </div>  
            <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
            <div id="small-dialog" class="mfp-hide">
                <div class="search-top">
                    <div class="login">
                        <input type="submit" value="">
                        <input type="text" value="Type something..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">		
                    </div>			
                </div>
                <script>
                    $(document).ready(function() {
                    $('.popup-with-zoom-anim').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });

                    });
                </script>				
            </div>
        </div>
        <!-- //banner -->
        <br>
        <br>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <p align="center">
                            To Make An Appointment, Please Go To <a href="appointment3.php" style="color:#37b7e5;">Appointment Module</a>
                        </p>
                    </div>
                    <br />
                    <br />
                    
                    <div align="center">
                        <form action="appointment2.php" method="post">
                            <?php
                                $userTc = $_SESSION['tc'];
                                $userFirstName = $_SESSION['firstName'];
                                $userSurname = $_SESSION['surName'];
                                $appointmentInfoArray = array();
                                array_push($appointmentInfoArray, array("tc"=>$userTc, "firstName"=>$userFirstName, "surname"=>$userSurname));
                                $allInfoToAppointment = json_encode(array('Appointment'=>$appointmentInfoArray));
                            ?>
                            <input type="hidden" name="Appointment" value='<?php echo $allInfoToAppointment; ?>'>
                            <input type="submit" value="Get Appoinment Info" style="background: #37b7e5; color:white">
                        </form>
                    </div>
                    
                    
                </div>
                <?php
                if(isset($_POST['appoinmentsArray'])){
                    ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>TC</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Doctor Name</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Hour</th>
                                        <th>Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $appoinments = $_POST['appoinmentsArray'];
                                $serviceParamObj = json_decode($appoinments, true);
                                for($i = 0; $i < count($appoinments); $i++) { 
                                    echo "<tr>";
                                        echo "<td>{$_SESSION['tc']}</td>";
                                        echo "<td>{$_SESSION['firstName']}</td>";
                                        echo "<td>{$_SESSION['surName']}</td>";
                                        echo "<td>{$appoinments[i]->doctorName}</td>";
                                        echo "<td>{$appoinments[i]->date}</td>";
                                        echo "<td>{$appoinments[i]->hour}</td>";
                                        echo "<td>{$appoinments[i]->department}</td>";
                                    echo "</tr>";
                                    }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php include "includes/footer.php"; ?>
