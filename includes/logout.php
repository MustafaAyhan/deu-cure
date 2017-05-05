<?php session_start(); ?>
<?php
$_SESSION['password']   = null;
$_SESSION['address']    = null;
$_SESSION['surName']    = null;
$_SESSION['tc'] = null;
$_SESSION['firstname'] = null;
$_SESSION['user_role'] = null;

header("Location: ../index.php");
?>