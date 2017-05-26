<?php ob_start(); ?>
<?php include "../DataLayer/db.php"; ?>
<?php include "../LogicLayer/UserManager.php"; ?>
<?php session_start(); ?>

<?php
if($_SESSION['user_role'] != 'Admin') {
    header("Location: ../index.php ");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Deu Cure Admin - Admin Template</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="css/styles.css" rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Gender', 'Percent'],
                <?php
                $maleNumber = UserManager::maleCount(); 
                $femaleNumber = UserManager::femaleCount(); 
                ?>
              ['Male',     <?php echo $maleNumber;?>],
              ['Female',      <?php echo $femaleNumber;?>]
            ]);

            var options = {
              title: 'User Gender Percent Graphic',
              is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
          }
        </script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script src="js/jquery.js"></script>
    </head>
    <body>