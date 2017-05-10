<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: rgba(14, 60, 93, 0.68);
    border-color: #fff;
    text-shadow: 0px 12px 20px black;">
    <div class="container">
        <!-- Brand and toggle get grouped for better display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/deu-cure" style="color: #fff">DEU CURE</a>
        </div>
        <!-- Collect the nav links, forms and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" >
                <li><a href="about.php" style="color: #fff">ABOUT</a></li>
                <li><a href="gallery.php" style="color: #fff">GALLERY</a></li>
                <li><a href="contact.php" style="color: #fff">CONTACT</a></li>
                <?php
                if(!isset($_SESSION['user_role'])){
                ?>
                    <li><a href="login.php" style="color: #fff">LOGIN</a></li>
                    <li><a href="register.php" style="color: #fff">REGISTER</a></li>
                <?php
                }
                else
                    echo "<li><a href='/deu-cure/includes/delete.php' style='color: #fff'>DELETE</a></li>";
                ?>
                
            </ul>
        </div>
    </div>                    
</nav>
<script>
$(document).ready(function(){
    $(".delete_link").on('click', function(){
        var id = $(this).attr("rel");
        var delete_url = "profile.php?delete=" + id + " ";
        $(".delete_modal_link").attr("href", delete_url);
        $("#myModal").modal('show');
    });
});
</script>