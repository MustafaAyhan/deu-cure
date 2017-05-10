<?php
include "../DataLayer/db.php";
include "../LogicLayer/UserManager.php";
session_start();
if(UserManager::deleteAssaysByTc($_SESSION['tc']))
    UserManager::deleteUser($_SESSION['tc']);
include "logout.php";
?>