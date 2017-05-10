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
            else{
                //Emergency Module web service.
                echo "<a target='_blank' href='emergency.php?tc={$_SESSION['tc']}&firstName={$_SESSION['firstName']}&surName={$_SESSION['surName']}&address={$_SESSION['address']}' id='' title='Call An Ambulance'><i class='glyphicon glyphicon-plus'></i></a>";
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
        <!--gallery-starts--> 
        <div class="treatments">
            <div class="container">
                <h3 class="tittle">GALLERY</h3> 		
                <script src="js/jquery.swipebox.min.js"></script> 
                <script type="text/javascript">
                            jQuery(function($) {
                                $(".swipebox").swipebox();
                            });
                </script>
                <div class="view view-sixth">
                    <a href="images/b7.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="images/b7.jpg" alt="" class="img-responsive">
                    <div class="mask">
                        <h4>MEDI CURE</h4>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                    </div></a>
                </div>
                <div class="view view-sixth">
                    <a href="images/b2.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="images/b2.jpg" alt="" class="img-responsive">
                    <div class="mask">
                        <h4>MEDI CURE</h4>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                    </div></a>
                </div>
                <div class="view view-sixth">
                    <a href="images/b1.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="images/b1.jpg" alt="" class="img-responsive">
                    <div class="mask">
                        <h4>MEDI CURE</h4>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                    </div></a>
                </div>
                <div class="view view-sixth">
                    <a href="images/b3.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="images/b3.jpg" alt="" class="img-responsive">
                    <div class="mask">
                        <h4>MEDI CURE</h4>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                    </div></a>
                </div>
                <div class="view view-sixth">
                    <a href="images/b4.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="images/b4.jpg" alt="" class="img-responsive">
                    <div class="mask">
                        <h4>MEDI CURE</h4>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                    </div></a>
                </div>
                <div class="view view-sixth">
                    <a href="images/4.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="images/4.jpg" alt="" class="img-responsive">
                    <div class="mask">
                        <h4>MEDI CURE</h4>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                    </div></a>
                </div>
                <div class="view view-sixth">
                    <a href="images/444.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="images/444.jpg" alt="" class="img-responsive">
                    <div class="mask">
                        <h4>MEDI CURE</h4>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                    </div></a>
                </div>
                <div class="view view-sixth">
                    <a href="images/44.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="images/44.jpg" alt="" class="img-responsive">
                    <div class="mask">
                        <h4>MEDI CURE</h4>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                    </div></a>
                </div>
                <div class="view view-sixth">
                    <a href="images/b7.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="images/b7.jpg" alt="" class="img-responsive">
                    <div class="mask">
                        <h4>MEDI CURE</h4>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                    </div></a>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <!--gallery-ends-->
<?php include "includes/footer.php"; ?>