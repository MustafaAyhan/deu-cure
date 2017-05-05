        <!--top-header-->
        <!--bottom-->
        <section class="button">
            <button id="showLeftPush"><img src="images/menu.png" alt=""></button>
        </section>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <h3>Menu</h3>
            <a href="index.php" class="active">HOME</a>
            <a href="about.php">ABOUT</a>
<!--
            <a href="blog.php">BLOG</a>
            <a href="shortcodes.php">SHORT CODES</a>
-->
            <a href="gallery.php">GALLERY</a>
            <?php
            if(isset($_SESSION['user_role'])){
                echo "<a href='profile.php'>PROFILE</a>";
                /*
                Locaitioin to the appointment module
                */
                echo "<a href='appointment.php'>APPOINMENT</a>";
                /*
                Location to the laboratuary 
                */
                echo "<a href='assay.php'>ASSAY</a>";
                if($_SESSION['user_role'] == 'Admin')
                    echo "<a href='/deu-cure/admin/index.php'>ADMIN</a>";
                else
                    echo "<a href='contact.php'>CONTACT</a>";
            }
            else
                echo "<a href='/deu-cure/register.php?source=index'>REGISTER</a>";
            
            if(isset($_SESSION['user_role']))
                echo "<a href='/deu-cure/includes/logout.php'>LOGOUT</a>";
            ?>
        </nav>

        <!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
        <script src="js/classie.js"></script>
        <script>
            var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
                showLeftPush = document.getElementById( 'showLeftPush' ),
                showRightPush = document.getElementById( 'showRightPush' ),
                body = document.body;

            showLeftPush.onclick = function() {
                classie.toggle( this, 'active' );
                classie.toggle( body, 'cbp-spmenu-push-toright' );
                classie.toggle( menuLeft, 'cbp-spmenu-open' );
                disableOther( 'showLeftPush' );
            };

            function disableOther( button ) {
                if( button !== 'showLeftPush' ) {
                    classie.toggle( showLeftPush, 'disabled' );
                }
                if( button !== 'showRightPush' ) {
                    classie.toggle( showRightPush, 'disabled' );
                }
            }
        </script>