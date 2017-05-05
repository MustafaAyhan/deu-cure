<?php
session_start();
include "DataLayer/db.php";
include "LogicLayer/UserManager.php";

if(isset($_POST['register'])){
    echo "in if -1<br>";
    $tc         = $_POST['tc'];
    $firstName  = $_POST['firstName'];
    $surName    = $_POST['surName'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $birthdate  = $_POST['birthDate'];
    $tel        = $_POST['tel'];
    $address    = $_POST['address'];
    $gender     = $_POST['gender'];
    $bloodType  = $_POST['bloodType'];
    
    $error = ['tc' => '', 'firstName' => '', 'surName' => '', 'email' => '', 'password' => ''];
    if($tc == '') {
        $error['tc'] = "T.C. cannot be empty.";
    } elseif(strlen($tc) != 2) {
        $error['tc'] = "T.C. needs to be 11 characters.";
    } elseif(UserManager::tcExists($tc)) {
        $error['tc'] = "This T.C is already registred to the system. <a href='login.php'>Please login in.</a>'";
    }

    if($email == '') {
        $error['email'] = "Email cannot be empty.";
    } elseif(UserManager::emailExists($email)) {
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
        $birthdate = date("yyyy-mm-dd");
    }

    foreach($error as $key => $value) {
        if(empty($value)) {
            unset($error[$key]);
        }
    }
    echo "in if 0<br>";
    if(empty($error)) {
        echo "in if 1<br>";
        $user = new User($tc, $firstName, $surName, $birthdate, $email, $password, $tel, $address, $gender, $bloodType, 'Patient');
        echo "in if 2<br>";
        if(UserManager::registerUser($user)){
            echo "in if 3<br>";
            $role = $_POST['inpsource'];
            //echo "<script type='text/javascript'>alert('Congrats!');</script>";
            if($role == 'index'){
                echo "in if 4<br>";
                //echo "<script type='text/javascript'>alert('Congrats2!');</script>";
                echo "in if 5<br>";
                $_SESSION['tc']         = $user->getTc();
                $_SESSION['password']   = $user->getPassword();
                $_SESSION['firstName']  = $user->getFirstName();
                $_SESSION['address']    = $user->getAddress();
                $_SESSION['surName']    = $user->getSurName();
                $_SESSION['user_role']  = $user->getUserRole();
                header("Location: /deu-cure/gallery.php");
            }
            else{
                header("Location: /deu-cure/admin/index.php");
            }
        }
    }
    else
        echo "<script type='text/javascript'>alert('Something went wrong(?)');</script>";
        //loginUser($tc, $password);
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Register | DEU CURE</title>
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
        <h1 style="font-size: 43px; font-weight: 700; font-family: 'Droid Sans', sans-serif; padding: 70px 0px 20px 0px; color: #fff;">Sign in as a new user</h1>
        <div class="bg-agile">
            <div class="book-appointment">
                <h2>Register Form</h2>
                <form action="register.php" method="post" role="form">
                    <div class="left-agileits-w3layouts same">
                        <div class="gaps">
                            <p>T.C.</p>
                            <input type="number" name="tc" placeholder="" title="tece" required/>
                            <h6><?php echo isset($error['tc']) ? $error['tc'] : '';?></h6>
                        </div>	
                        <div class="gaps">	
                            <p>First Name</p>
                            <input type="text" name="firstName" placeholder="" required/>
                            <h6><?php echo isset($error['firstName']) ? $error['firstName'] : '';?></h6> 
                        </div>
                        <div class="gaps">
                            <p>Surname</p>
                            <input type="text" name="surName" placeholder="" required/>
                            <h6><?php echo isset($error['surName']) ? $error['surName'] : '';?></h6>
                        </div>	
                        <div class="gaps">
                            <p>Password</p>
                            <input type="password" name="password" placeholder="" required/>
                            <h6><?php echo isset($error['password']) ? $error['password'] : '';?></h6>
                        </div>
                        <div class="gaps">
                            <p>E-Mail</p>
                            <input type="email" name="email" placeholder="" required/>
                            <h6><?php echo isset($error['email']) ? $error['email'] : '';?></h6>
                        </div>
                    </div>
                    <div class="right-agileinfo same">
                        <!-- BirthDate -->   
                        <div class="gaps">
                            <p>BirthDate</p>		
                            <input type="text" id="datepicker1" name="birthDate" value="" onfocus="this.value = '';">
                            <h6> </h6>
                        </div>
                        <!-- Phone Number -->                           
                        <div class="gaps">
                            <p>Phone Number</p>
                            <input type="number" name="tel" placeholder=""/>
                            <h6> </h6>
                        </div>
                        <!-- Address -->   
                        <div class="gaps">
                            <p>Address</p>
                            <input type="text" name="address" placeholder=""/>
                            <h6> </h6>
                        </div>
                        <!-- Gender -->   
                        <div class="gaps">
                            <p>Gender</p>	
                            <select name="gender" class="form-control" id="">
                                <option></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <h6> </h6>
                        </div>
                        <!-- BloodType -->   
                        <div class="gaps">
                            <p>Blood Type</p>
                            <select name="bloodType" class="form-control" id="">
                                <option value=""></option>
                                <option value="Ah-">A(Rh-)</option>
                                <option value="Ah+">A(Rh+)</option>
                                <option value="Bh-">B(Rh-)</option>
                                <option value="Bh+">B(Rh+)</option>
                                <option value="AB-">AB(Rh-)</option>
                                <option value="AB+">AB(Rh+)</option>
                                <option value="0rh-">0(Rh-)</option>
                                <option value="0rh+">0(Rh+)</option>
                            </select>
                            <h6> </h6>
<!--
                            <p>Time</p>		
                            <input type="text" id="timepicker" name="Time" class="timepicker form-control" value="">	
-->
                        </div>
                    </div>
                    <div class="clear"></div>
                    <input type="hidden" name="inpsource" value="<?php echo (isset($_GET["source"]) ? $_GET["source"] : "nope"); ?>">
                    <input type="submit" name="register" value="Register">
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
            $( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
            });
        </script>
        <!-- //Calendar -->
    </body>
</htmlyym