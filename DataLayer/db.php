<?php ob_start();
    $connection = mysqli_connect("localhost", "root", "", "deucure");
    /* change character set to utf8 */
    if (!mysqli_set_charset($connection, "utf8")) {
        printf("Error loading character set utf8: %s\n", mysqli_error($connection));
        die();
    }

    if(!$connection) {
        echo "Database connection is lost.";
    }
?>
