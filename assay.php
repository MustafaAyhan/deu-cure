<?php include "includes/header.php"; ?>
<?php include "LogicLayer/UserManager.php"; ?>
        <?php include "includes/navigation.php"; ?>
        <!-- banner -->
        <link rel="form-style-6" href="css/style.css">
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
                    <div class="form-style-6" style=" background: white;">
                        <form action="assay.php" method="get">
                            <input type="hidden" name="myAssayNum" value="true"/>
                            <input type="submit"value="Display My Assay Number">
                        </form>
                    </div>
                    <br/>
                    <div class="form-style-6">
                        <h1>Show Assay Result</h1>
                        <form  action="assay.php" method="get">
                            <style type="text/css">
                            .form-style-6{
                                font: 95% Arial, Helvetica, sans-serif;
                                max-width: 400px;
                                margin: 10px auto;
                                padding: 16px;
                                background: #F7F7F7;
                            }
                            .form-style-6 h1{
                                background: #37b7e5;
                                padding: 20px 0;
                                font-size: 140%;
                                font-weight: 300;
                                text-align: center;
                                color: #fff;
                                margin: -16px -16px 16px -16px;
                            }
                            .form-style-6 input[type="text"],
                            .form-style-6 textarea,
                            .form-style-6 select 
                            {
                                -webkit-transition: all 0.30s ease-in-out;
                                -moz-transition: all 0.30s ease-in-out;
                                -ms-transition: all 0.30s ease-in-out;
                                -o-transition: all 0.30s ease-in-out;
                                outline: none;
                                box-sizing: border-box;
                                -webkit-box-sizing: border-box;
                                -moz-box-sizing: border-box;
                                width: 100%;
                                background: #fff;
                                margin-bottom: 4%;
                                border: 1px solid #ccc;
                                padding: 3%;
                                color: #666;
                                font: 95% Arial, Helvetica, sans-serif;
                            }
        /*
                            .form-style-6 input[type="text"]:focus,

                            {
                                box-shadow: 0 0 5px #43D1AF;
                                padding: 3%;
                                border: 1px solid #43D1AF;
                            }
        */

                            .form-style-6 input[type="submit"],
                            .form-style-6 input[type="button"]{
                                box-sizing: border-box;
                                -webkit-box-sizing: border-box;
                                -moz-box-sizing: border-box;
                                width: 100%;
                                padding: 3%;
                                background: #37b7e5;
                                border-bottom: 2px solid #30C29E;
                                border-top-style: none;
                                border-right-style: none;
                                border-left-style: none;    
                                color: #fff;
                            }
                            .form-style-6 input[type="submit"]:hover,
                            .form-style-6 input[type="button"]:hover{
                                background: #2EBC99;
                            }
                            </style>
                            <input type="text" name="takenAssayNumber" placeholder="Assay Number" required />
                            <input type="submit" value="Show" />
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <?php
                if(isset($_POST['allResult'])){
                    $results = json_decode($_POST['allResult'], true);
                    $assayType = $results['Assay'][0]['AssayType'];
                    $assayDate = $results['Assay'][0]['AssayDate'];
                    $assayResult = $results['Assay'][0]['AssayResult'];
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
                                        <th>Assay Type</th>
                                        <th>Assay Date</th>
                                        <th>Assay Reslut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $_SESSION['tc'];?>
                                        </td>
                                        <td>
                                            <?php echo $_SESSION['firstName'];?>
                                        </td>
                                        <td>
                                            <?php echo $_SESSION['surName'];?>
                                        </td>
                                        <td>
                                            <?php echo $assayType;?>
                                        </td>
                                        <td>
                                            <?php echo $assayDate;?>
                                        </td>
                                        <td>
                                            <?php echo $assayResult;?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <?php
                 if(isset($_GET['myAssayNum'])){
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr >
                                        <th>TC</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Assay Numbers</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $assays = UserManager::getAssayNumbers($_SESSION['tc']);
                                for($i = 0; $i < count($assays); $i++) { 
                                    echo "<tr>";
                                        echo "<td>{$_SESSION['tc']}</td>";
                                        echo "<td>{$_SESSION['firstName']}</td>";
                                        echo "<td>{$_SESSION['surName']}</td>";
                                        echo "<td>{$assays[$i]->getAssayNumber()}</td>";
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
                <?php
                 if(isset($_GET['takenAssayNumber'])){
                     $tc = $_SESSION['tc'];
                     $assayNum = $_GET['takenAssayNumber'];
                     
                     if(UserManager::controlAssayNumberExist($assayNum)){
                         
                         $assayInfoArray = array();
                         array_push($assayInfoArray,array("tc"=>$tc, "assayNumber"=>$assayNum));
                         $assayNumResult = json_encode(array('Assay' => $assayInfoArray));
                         //echo $assayNumResult;
                ?>
                        <form id="jsform" action="assay2.php" method="post">
                            <input type="hidden" name="assayNumber" value='<?php echo $assayNumResult; ?>'>
                        </form>
                        <script type="text/javascript">
                            document.getElementById('jsform').submit();
                        </script>
                <?php
                     }
                     else{echo $assayNum;
                ?>
                    <script type="text/javascript">alert("There is not Assay Number in that number!! Please try again");</script>
                <?php 
                     }
                 }
                ?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php include "includes/footer.php"; ?>