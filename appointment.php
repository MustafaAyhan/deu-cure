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
                echo "<a target='_blank' href='emergency.php?tc={$_SESSION['tc']}&firstName={$_SESSION['firstName']}&surName={$_SESSION['surName']}&address={$_SESSION['address']}' id='' title='Call An Ambulance'><i class='glyphicon glyphicon-plus'></i></a>";
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
                    <form action="appointment2.php" method="post">
                        <a href="appointment3.php">Make an Appoinment</a>
                        <input type="hidden" name="user_tc" value="<?php echo $_SESSION['tc']; ?>">
                        <input type="hidden" name="user_firstName" value="<?php echo $_SESSION['firstName']; ?>">
                        <input type="hidden" name="user_surName" value="<?php echo $_SESSION['surName']; ?>">
                        <input type="submit" value="Get Appoinment Info">
                    </form>
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
        <?php
        if(isset($_POST['tc'])){
            if(isset($_POST['password'])){
                $tc = $_POST['tc'];
                //check the db
                $password = $_POST['password'];
                $flag = true;
                $flag2 = array();
                array_push($flag2, array("Flag"=>$flag));
                $flag = json_encode(array("user"=>$flag2));
                echo $flag;
                ?>

                <form id="jsform" action="appointment3.php" method="post">
                   <input type="hidden" name="flag" value='<?php echo $flag; ?>'>
                </form>
                <script type="text/javascript">
                    document.getElementById('jsform').submit();
                </script>

                <?php
                
            }
        }
        ?>
<?php include "includes/footer.php"; ?>
