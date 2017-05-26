<?php include "includes/header.php"; ?>
        <?php include "includes/navigation.php"; ?>
	    <!-- banner -->
        <div class="banner page-head">
            <div class="logo">
                <h1><a href="../index.php">DEU CURE</a></h1>
            </div>
            <div class="search">
            <?php 
            if(!isset($_SESSION['user_role']))
                echo "<a href='login.php'><i class='glyphicon glyphicon-user'></i></a>";
            else{
                //Emergency Module web service.
                $userTc = $_SESSION['tc'];
                $userFirstName = $_SESSION['firstName'];
                $userSurname = $_SESSION['surName'];
                $userAddress = $_SESSION['address'];
                $emergencyInfoArray = array();
                array_push($emergencyInfoArray, array("tc"=>$userTc, "firstName"=>$userFirstName, "surname"=>$userSurname, "address"=>$userAddress));
                $allInfoToEmergency = json_encode(array('Emergency'=>$emergencyInfoArray));
                //echo $allInfoToEmergency;
                echo "<a target='_blank'  href='emergency2.php?emergency={$allInfoToEmergency}' id='' title='Call An Ambulance'><i class='glyphicon glyphicon-plus'></i></a>";
            }
            ?>
            </div>  
            <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
            <div id="small-dialog" class="mfp-hide">
                <div class="search-top">
                    <div class="login">
                        <input type="submit" value="">
                        <input type="text" value="Type something..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">		
                    </div>			
                </div>
                <script>
                    $(document).ready(function() {
                    $('.popup-with-zoom-anim').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });

                    });
                </script>				
            </div>
        </div>
        <!-- //banner -->
        <!--about-starts--> 
        <div class="about">
            <div class="container">
                <h3 class="tittle">ABOUT DEU CURE</h3>
                <div class="col-md-5 about-grid-left text-center">
                    <img src="images/6.jpg" alt=""/>
                </div>
                <div class="col-md-7 about-grid">
                    <p>Massachusetts General Hospital (Mass General or MGH) is the original and largest teaching hospital of Harvard Medical School and a biomedical research facility located in the West End neighborhood of Boston, Massachusetts. It is the third oldest general hospital in the United States and the oldest and largest hospital in New England with 950 beds. With Brigham and Women's Hospital, it is one of the two founding members of Partners HealthCare, the largest healthcare provider in Massachusetts.</p>
                    <p> Massachusetts General Hospital conducts the largest hospital-based research program in the world, with an annual research budget of more than $750 million. It is currently ranked as the #3 hospital in the United States by U.S. News and World Report.</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--about-bottom-->
        <div class="about-bottom">
                <div class="container">
                    <div class="about-bottom-grids">
                        <div class="col-md-7 about-bottom-grid-left">
                            <h3 class="tittle t-two">OUR TREATMENTS</h3>
                            <h4>The earliest documented institutions aiming to provide cures were ancient Egyptian temples. </h4>
                            <p>Common support units include a pharmacy, pathology, and radiology. Hospitals are usually funded by the public sector, by health organisations (for profit or nonprofit), by health insurance companies, or by charities, including direct charitable donations. Historically, hospitals were often founded and funded by religious orders, or by charitable individuals and leaders.</p>
                        </div>
                        <div class="col-md-5 about-bottom-grid-right">
                            <h3 class="tittle t-two">Owners</h3>
                            <div class="about-bottom-grid-right-grid">
                                <div class="about-bottom-grid-right-grdl">
                                    <img src="images/bbb.jpg" alt=" " class="img-responsive" />
                                </div>
                                <div class="about-bottom-grid-right-grdr">
                                    <p><span>D</span>okuz Eylül University, Computer Engineering degree(hopefully).</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="about-bottom-grid-right-grid">
                                <div class="about-bottom-grid-right-grdl">
                                    <img src="images/asd.jpg" alt=" " class="img-responsive" />
                                </div>
                                <div class="about-bottom-grid-right-grdr">
                                    <p><span>D</span>okuz Eylül University, Computer Engineering degree(hopefully)
                                                    games, hobies, books, asdasd</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        <!--//about-bottom-->
<?php include "includes/footer.php"; ?>