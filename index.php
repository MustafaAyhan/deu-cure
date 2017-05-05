<?php include "includes/header.php"; ?>
        <?php include "includes/navigation.php"; ?>
            <!-- banner -->
        <div class="banner">
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
            <div class="banner-info">
                <script src="js/responsiveslides.min.js"></script>
                    <script>
                        // You can also use "$(window).load(function() {"
                        $(window).load(function() {
                         // Slideshow 4
                        $("#slider3").responsiveSlides({
                            auto: true,
                            pager: false,
                            nav: true,
                            speed: 500,
                            namespace: "callbacks",
                            before: function () {
                        $('.events').append("<li>before event fired.</li>");
                        },
                        after: function () {
                            $('.events').append("<li>after event fired.</li>");
                            }
                            });
                            });
                    </script>
                    <div  id="top" class="callbacks_container">
                        <ul class="rslides" id="slider3">
                            <li>
                                <div class="banner-text">
                                    <h3>MAKE YOUR LIFE MORE<span> HEALTHY AND SAFE</span></h3>
                                    <p> A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. The best-known type of hospital is the general hospital, which typically has an emergency department to treat urgent health problems ranging from fire and accident victims to a heart attack. </p>
                                    <div class="read text-center"><a href="single.html" class="hvr-outline-out button2">READ MORE</a></div>
                                </div>
                            </li>
                            <li>
                                <div class="banner-text">
                                    <h3>BETTER HEALTH CARE IS CLOSER<span> THAN YOU THINK</span></h3>
                                    <p> A district hospital typically is the major health care facility in its region, with large numbers of beds for intensive care and additional beds for patients who need long-term care. Specialised hospitals include trauma centres, rehabilitation hospitals, children's hospitals, seniors' (geriatric) hospitals, and hospitals for dealing. </p>
                                    <div class="read text-center"><a href="single.html" class="hvr-outline-out button2">READ MORE</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="down-arrow text-center"><a class="scroll" href="#banner-bottom"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></a></div>
            </div>
        </div>
        <!-- //banner -->
        <!-- banner-bottom -->
        <div id="banner-bottom" class="banner-bottom">
            <div class="container">
                <h3 class="tittle">WELCOME TO DEU CURE</h3>
                <p> A teaching hospital combines assistance to people with teaching to medical students and nurses. The medical facility smaller than a hospital is generally called a clinic. Hospitals have a range of departments (e.g.: surgery and urgent care) and specialist units such as cardiology. </p>
                <ul id="sti-menu" class="sti-menu">
                        <li data-hovercolor="#fff">
                            <a href="#" class="disabled">
                                <h4 data-type="mText" class="sti-item">HEALTH</h4>
                                <p data-type="sText" class="sti-item">Live good and well life</p>
                                <span data-type="icon" class="sti-icon glyphicon glyphicon-plus sti-item"></span>
                            </a>
                        </li>
                        <li data-hovercolor="#fff">
                            <a href="#" class="disabled">
                                <h4 data-type="mText" class="sti-item">SURGERY</h4>
                                <p data-type="sText" class="sti-item">No pain no gain in life</p>
                                <span data-type="icon" class="sti-icon glyphicon glyphicon-scissors sti-item"></span>
                            </a>
                        </li>
                        <li data-hovercolor="#fff">
                            <a href="#" class="disabled">
                                <h4 data-type="mText" class="sti-item">CAREERS</h4>
                                <p data-type="sText" class="sti-item">Successful doctors work with us</p>
                                <span data-type="icon" class="sti-icon glyphicon glyphicon-education sti-item"></span>
                            </a>
                        </li>
                        <li data-hovercolor="#fff">
                            <a href="#" class="disabled">
                                <h4 data-type="mText" class="sti-item">PLANNING</h4>
                                <p data-type="sText" class="sti-item">Good surgery schedule .</p>
                                <span data-type="icon" class="sti-icon glyphicon glyphicon-apple sti-item"></span>
                            </a>
                        </li>

                        <script type="text/javascript" src="js/jquery.iconmenu.js"></script>
                        <script type="text/javascript">
                            $(function() {
                                $('#sti-menu').iconmenu({
                                    animMouseenter	: {
                                        'mText' : {speed : 400, easing : 'easeOutExpo', delay : 140, dir : 1},
                                        'sText' : {speed : 400, easing : 'easeOutExpo', delay : 0, dir : 1},
                                        'icon'  : {speed : 800, easing : 'easeOutBounce', delay : 280, dir : 1}
                                    },
                                    animMouseleave	: {
                                        'mText' : {speed : 400, easing : 'easeInExpo', delay : 140, dir : 1},
                                        'sText' : {speed : 400, easing : 'easeInExpo', delay : 280, dir : 1},
                                        'icon'  : {speed : 400, easing : 'easeInExpo', delay : 0, dir : 1}
                                    }
                                });
                            });
                        </script>
                </ul>
            </div>
        </div>
        <!-- //banner-bottom -->
        <!-- measure -->
        <div class="measure">
            <div class="container">
                <h3>WE MEASURE SUCCESS IN SMILES AND IMPROVEMENT IN HEALTH AND QUALITY OF LIFE.</h3>
            </div>
        </div>
        <!-- measure -->
        <!-- qualified -->
        <div class="qualified">
            <div class="container">
                <h3 class="tittle">ONLY QUALIFIED MEDICAL SERVICES</h3>
                <div class="qualified-grids">
                    <div class="col-md-7 qualify-left">
                        <div class="qualify-left-grids">
                            <div class="qua-left-gd text-right">
                                <h4>Only Qualified</h4>
                                <p>A teaching hospital combines assistance to people with teaching to medical students and nurses. The medical facility smaller than a hospital is generally called a clinic. </p>
                            </div>
                            <div class="qua-right-gd text-center">
                                <img src="images/t2.png" alt="" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="qualify-left-grids">
                            <div class="qua-left-gd text-right">
                                <h4>Medical Services</h4>
                                <p>Hospitals have a range of departments (e.g.: surgery and urgent care) and specialist units such as cardiology. Some hospitals have outpatient departments and some have chronic treatment units.</p>
                            </div>
                            <div class="qua-right-gd text-center">
                                <img src="images/t3.png" alt="" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-5 qualify-right grid">
                        <figure class="effect-moses">
                                <img src="images/pexels-photo-248156.jpeg" alt="" />
                                <figcaption>
                                    <h4>DEU <span>CURE</span></h4>
                                    <p>Only qualified medical services.</p>
                                </figcaption>			
                        </figure>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>	
        <!-- qualified -->
        <div class="welcome-grids">
            <div class="container">
                <h3 class="tittle" style="color: #fff">THE BEST MEDICINE IS PREVENTION</h3>
                    <div class="col-md-3 welcome-grid text-center">
                        <div class="ih-item circle effect9 left_to_right"><a href="#">
                            <div class="img"><img src="images/22.jpg" alt="" /></div>
                            <div class="info">
                              <h4>DEU CURE</h4>
                              <p>Best Hospital</p>
                            </div></a>
                        </div>
                    </div>
                    <div class="col-md-3 welcome-grid text-center">
                        <div class="ih-item circle effect9 left_to_right"><a href="#">
                            <div class="img"><img src="images/3.jpg" alt="" /></div>
                            <div class="info">
                              <h4>DEU CURE</h4>
                              <p>In Izmir</p>
                            </div></a>
                        </div>
                    </div>
                    <div class="col-md-3 welcome-grid text-center">
                        <div class="ih-item circle effect9 left_to_right"><a href="#">
                            <div class="img"><img src="images/2.jpg" alt="" /></div>
                            <div class="info">
                              <h4>DEU CURE</h4>
                              <p>Special Care</p>
                            </div></a>
                        </div>
                    </div>
                    <div class="col-md-3 welcome-grid text-center">
                        <div class="ih-item circle effect9 left_to_right"><a href="#">
                            <div class="img"><img src="images/111.jpg" alt="" /></div>
                            <div class="info">
                              <h4>DEU CURE</h4>
                              <p>Lux Rooms</p>
                            </div></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
            </div>
        </div>
<?php include "includes/footer.php";?>