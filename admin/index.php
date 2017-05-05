<?php include "includes/admin_header.php"; ?>
        <div id="wrapper">
            <!-- Navigation -->
            <?php include "includes/admin_navigation.php"; ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Welcome To Admin Panel
                                <small><?php //echo " " . $_SESSION['username']; ?></small>
                            </h1>
                        </div>
                    </div>
                    <!-- /.row -->
                    
                    <div class="row">
                        <!-- User square-->
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                               
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class='huge'><?php //echo $user_count = recordCount('users'); ?></div>
                                            <div> Users</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <a href="users.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                                
                            </div>
                        </div><!-- ./User square-->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                    </div> 
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.page-wrapper -->
<?php include "includes/admin_footer.php"; ?>