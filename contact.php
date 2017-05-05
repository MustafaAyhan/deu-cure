<?php include "includes/header.php"; ?>
        <?php include "includes/navigation.php"; ?>
        <!-- banner -->
        <div class="banner page-head">
            <div class="logo">
                <h1><a href="index.php">DEU CURE</a></h1>
            </div>
            <div class="search">
            <?php 
            if(!isset($_SESSION['user_role']))
                echo "<a href='login.php'><i class='glyphicon glyphicon-user'></i></a>";
            else
                echo "<a href='emergency.php' title='Call An Ambulance'><i class='glyphicon glyphicon-plus'></i></a>"; //WEB SERVICE TO THE EMERGENCY
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
        <!-- contact-us -->
        <div class="contact-us">
            <div class="container">
                <h3 class="tittle">CONTACT</h3>
                <div class="contact-grids">
                    <div class="col-md-4 contact-grid text-center">
                        <div class="point-icon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></div>
                        <p>Dokuz Eylül University, Tınaztepe Campus, Buca/Izmir</p>
                    </div>
                    <div class="col-md-4 contact-grid text-center">
                        <div class="point-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
                        <p><a href="mail-to:sample@example.com">mustafa.ayhan95@gmail.com</a></p>
                        <p><a href="mail-to:sample@example.com">aykutoprak2315@gmail.com</a></p>
                    </div>
                    <div class="col-md-4 contact-grid text-center">
                        <div class="point-icon"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></div>
                        <p>+90507 809 0075</p>
                        <p>+90541 397 6677</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="contact-info">
                    <form>
                        <input type="text" placeholder="Your Name" required>
                        <input type="text" placeholder="Your E-Mail" required>
                        <input type="text" placeholder="Subject" required>
                        <textarea placeholder="Your Message" required></textarea>
                        <input type="submit" value="SEND MESSAGE">
                    </form>
                </div>
            </div>
        </div>
        <!-- //contact-us -->
<?php include "includes/footer.php"; ?>
