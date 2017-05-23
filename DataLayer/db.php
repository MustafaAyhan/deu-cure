<?php ob_start();
    // For the world
//    $servername = "mysql.hostinger.web.tr";
//    $username = "u431409018_user";
//    $databasename = "u431409018_name";
//    $password = "3hNY1FmsJjXF";
    //For the local
    $servername = "localhost";
    $username = "root";
    $databasename = "deucure";
    $password = "";
    $connection = mysqli_connect($servername, $username, $password, $databasename);
    /* change character set to utf8 */
    if (!mysqli_set_charset($connection, "utf8")) {
        printf("Error loading character set utf8: %s\n", mysqli_error($connection));
        die();
    }

    if(!$connection) {
        echo "Database connection is lost.";
    }
?>
