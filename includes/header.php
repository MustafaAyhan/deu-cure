<?php
session_start();
include "DataLayer/db.php";
?>
<html>
    <head>
        <title>Deu Cure a Medical Hospital</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Deu Cure" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
                function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- toggle menu links -->
        <link href="css/component.css" rel="stylesheet" type="text/css"  />
        <!-- //menu links -->
        <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
        <!-- effect9 links -->
        <link href="css/ihover.css" rel="stylesheet" media="all">
        <!-- js -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <!-- //js -->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
            <!-- start-smoth-scrolling -->
                <script type="text/javascript" src="js/move-top.js"></script>
                <script type="text/javascript" src="js/easing.js"></script>
                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $(".scroll").click(function(event){		
                            event.preventDefault();
                            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                        });
                    });
                </script>
            <!-- start-smoth-scrolling -->

    </head>
    <!-- slide-toggle-menu -->
    <body class="cbp-spmenu-push">