<?php
include "DataLayer/db.php";
include "LogicLayer/UserManager.php";
include("includes/delete_modal.php");
session_start();
if(isset($_SESSION['user_role'])){
    $tc = $_SESSION['tc'];
    $password = $_SESSION['password'];
    
    $user = UserManager::selectUser($tc);
    //UPDATED USER
    if(isset($_POST['update'])) {
        $firstName  = $_POST['firstName'];
        $surName    = $_POST['surName'];
        $oldEmail   = $_POST['email'];
        $password   = $_POST['password'];
        $email      = $_POST['email'];
        $birthdate  = $_POST['birthDate'];
        $tel        = $_POST['tel'];
        $address    = $_POST['address'];
        $gender     = $_POST['gender'];
        $bloodType  = $_POST['bloodType'];
        
        $error = ['firstName' => '', 'surName' => '', 'email' => '', 'password' => ''];

        if($email == '') {
            $error['email'] = "Email cannot be empty.";
        } elseif($email != $oldEmail && emailExists($email)) {
            $error['email'] = "This email is taken by someone(!) else. <a href='login.php'>Please login in.</a>'";
        }

        if($password == '') {
            $error['password'] = "Password cannot be empty.";
        }elseif(strlen($password) < 3) {
            $error['password'] = "Password needs to be longer than 3 characters.";
        }

        if($firstName == '') {
            $error['firstName'] = "First name cannot be empty.";
        }elseif(strlen($firstName) < 3) {
            $error['firstName'] = "First name needs to be longer than 3 characters.";
        }

        if($surName == '') {
            $error['surName'] = "Surname cannot be empty.";
        }elseif(strlen($surName) < 2) {
            $error['surName'] = "Surname needs to be longer than 2 characters.";
        }

        if($birthdate == '') {
            $birthdate = date("Y-m-d H:i:s");
        }

        foreach($error as $key => $value) {
            if(empty($value)) {
                unset($error[$key]);
            }
        }
        if(empty($error)) {
            $user = new User($tc, $firstName, $surName, $birthdate, $email, $password, $tel, $address, $gender, $bloodType, $user->getUserRole());
            if(UserManager::updateUser($user)){
                echo "<script type='text/javascript'>alert('Congrats!');</script>";
                //loginUser($tc, $password);
            }
            else
                echo "<script type='text/javascript'>alert('Something went wrong(?)');</script>";
            //loginUser($tc, $password);
        }
    }
} else
    header("Location: index.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Profile | DEU CURE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="DEU CURE Register">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- Custom Theme files -->
        <link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
        <link href="css/style-register.css" rel='stylesheet' type='text/css' />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />        
        <!--fonts--> 
        <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
        <!--//fonts--> 
    </head>
    <body>
        <?php include "includes/navigation-login.php"; ?>
        <!--background-->
        <h1 style="font-size: 43px; font-weight: 700; font-family: 'Droid Sans', sans-serif; padding: 70px 0px 20px 0px; color: #fff;">Edit your profile</h1>
        <div class="bg-agile">
            <div class="book-appointment">
                <h2>Profile</h2>
                <form action="profile.php" method="post" role="form" enctype="multipart/form-data">
                    <div class="left-agileits-w3layouts same">
                        <div class="gaps">
                            <p>T.C.</p>
                            <input type="number" name="tc" value="<?php echo $user->getTc();?>" title="tece" disabled/>
                            <h6><?php echo isset($error['tc']) ? $error['tc'] : '';?></h6>
                        </div>	
                        <div class="gaps">	
                            <p>First Name</p>
                            <input type="text" name="firstName" value="<?php echo $user->getFirstName();?>" required/>
                            <h6><?php echo isset($error['firstName']) ? $error['firstName'] : '';?></h6> 
                        </div>
                        <div class="gaps">
                            <p>Surname</p>
                            <input type="text" name="surName" value="<?php echo $user->getSurName();?>" required/>
                            <h6><?php echo isset($error['surName']) ? $error['surName'] : '';?></h6>
                        </div>	
                        <div class="gaps">
                            <p>Password</p>
                            <input type="password" name="password" value="<?php echo $user->getPassword();?>" required/>
                            <h6><?php echo isset($error['password']) ? $error['password'] : '';?></h6>
                        </div>
                        <div class="gaps">
                            <p>E-Mail</p>
                            <input type="email" name="email" value="<?php echo $user->getEmail();?>" required/>
                            <h6><?php echo isset($error['email']) ? $error['email'] : '';?></h6>
                        </div>
                    </div>
                    <div class="right-agileinfo same">
                        <!-- BirthDate -->   
                        <div class="gaps">
                            <p>BirthDate</p>		
                            <input type="text" id="datepicker" name="birthDate" value="<?php echo $user->getBirthDate();?>">
                            <h6> </h6>
                        </div>
                        <!-- Phone Number -->                           
                        <div class="gaps">
                            <p>Phone Number</p>
                            <input type="number" name="tel" value="<?php echo $user->getTel();?>"/>
                            <h6> </h6>
                        </div>
                        <!-- Address -->   
                        <div class="gaps">
                            <p>Address</p>
                            <input type="text" name="address" value="<?php echo $user->getAddress();?>"/>
                            <h6> </h6>
                        </div>
                        <!-- Gender -->   
                        <div class="gaps">
                            <p>Gender</p>	
                            <select name="gender" class="form-control" id="">
                                <option selected value="<?php echo $user->getGender();?>"><?php echo $user->getGender();?></option>
                                <?php
                                if($user->getGender() == 'Male')
                                    echo "<option value='Female'>Female</option>";
                                else
                                    echo "<option value='Male'>Male</option>";
                                ?>
                            </select>
                            <h6> </h6>
                        </div>
                        <!-- BloodType -->   
                        <div class="gaps">
                            <p>Blood Type</p>
                            <select name="bloodType" class="form-control" id="">
                                <?php 
                                $arr = array('A(Rh-)', 'A(Rh+)', 'B(Rh-)', 'B(Rh+)', 'AB(Rh-)', 'AB(Rh+)', '0(Rh-)', '0(Rh+)');
                                for($i = 0; $i < 8; $i++){
                                    if($user->getBloodType() == $arr[$i]){
                                        echo "<option selected value='$arr[$i]'>$arr[$i]</option>";
                                    }
                                    else
                                        echo "<option value='$arr[$i]'>$arr[$i]</option>";                                        
                                }
                                ?>
                            </select>
                            <h6> </h6>
<!--
                            <p>Time</p>		
                            <input type="text" id="timepicker" name="Time" class="timepicker form-control" value="">	
-->
                        </div>
                    </div>
                    <div class="clear"></div>
                    <input type="submit" name="update" value="Update">
                </form>
            </div>
       </div>
        <!--copyright-->
        <div class="copy w3ls">
           <p>&copy; 2017 All rights reserved.</p>
        </div>
        
        <!--//copyright-->
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/wickedpicker.js"></script>
        <script type="text/javascript">
            $('.timepicker').wickedpicker({twentyFour: false});
        </script>
		<!-- Calendar -->
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <script src="js/jquery-ui.js"></script>
        <script>
            $(function() {
            $("#datepicker").datepicker();
                $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd");
            });
        </script>
        <!-- //Calendar -->
    </body>
</html>