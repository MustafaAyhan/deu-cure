<?php session_start(); ?>
<?php include "DataLayer/db.php"; ?>
<?php include "LogicLayer/UserManager.php"; ?>
<?php
if(isset($_POST['login'])) {
    UserManager::loginUser($_POST['tc'], $_POST['password']);
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Deu Cure Login Form</title>
        <!-- Custom Theme files -->
        <link href="css/style-login.css" rel="stylesheet" type="text/css" media="all"/>                   
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

        <!-- Custom Theme files -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="keywords" content="Deu Cure Login Form" />
        <!--Google Fonts-->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--Google Fonts-->
    </head>
    <body>
        <?php include "includes/navigation-login.php"; ?>
        <!--header start here-->
        <div class="login-form">
            <div class="top-login">
                <span><img src="images/group.png" alt=""/></span>
            </div>
            <h1>Login</h1>
            <div class="login-top">
                <form method="post" action="">
                    <div class="login-ic">
                        <i ></i>
                        <input type="text" name="tc" value="T.C." required/>
                        <div class="clear"> </div>
                    </div>
                    <div class="login-ic">
                        <i class="icon"></i>
                        <input type="password" name="password" value="password" required/>
                        <div class="clear"> </div>
                    </div>
                    <div class="log-bwn">
                        <input type="submit" name="login" value="Login" >
                    </div>
                </form>
            </div>
            <p class="copy">&copy; 2017 Deu Cure Login Form. All rights reserved.</p>
        </div>		
        <!--header start here-->
    </body>
</html>