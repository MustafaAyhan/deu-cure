<?php
//UPDATE STATEMENT
if(isset($_GET['source'])){
    $user = UserManager::selectUser($_GET['u_tc']);
    if(isset($_POST['edit_user'])) {
        $tc         = $user->getTc();
        $firstName  = $_POST['firstName'];
        $surName    = $_POST['surName'];
        $birthDate  = $_POST['birthDate'];
        $password   = $user->getPassword();
        $email      = $_POST['email'];
        $tel        = $_POST['tel'];
        $address    = $_POST['address'];
        $gender     = $_POST['gender'];
        $bloodType  = $_POST['bloodType'];
        $userRole   = $_POST['userRole'];
        
        $user = new User($tc, $firstName, $surName, $birthDate, $email, $password, $tel, $address, $gender, $bloodType, $userRole);
        UserManager::updateUser($user);
        echo "<p class='bg-success'>User Updated. <a href='users.php'>Edit More Users</a></p>";
    }
}
else {
    header("Location: index.php");
}
?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="tc">T.C.</label>
                    <input type="text" value="<?php echo $user->getTc(); ?>" class="form-control" name="tc" disabled>
                </div>

                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" value="<?php echo $user->getFirstName(); ?>" class="form-control" name="firstName">
                </div>

                <div class="form-group">
                    <label for="surName">Lastname</label>
                    <input type="text" value="<?php echo $user->getSurName(); ?>" class="form-control" name="surName">
                </div>

                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" value="<?php echo $user->getEmail(); ?>" class="form-control" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" value="<?php echo $user->getPassword(); ?>" class="form-control" name="password" disabled>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="birthDate">Birth Date</label>
                    <input type="text" value="<?php echo $user->getBirthDate(); ?>" class="form-control" name="birthDate">
                </div>

                <div class="form-group">
                    <label for="tel">Telephone Number</label>
                    <input type="tel" value="<?php echo $user->getTel(); ?>" class="form-control" name="tel">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" value="<?php echo $user->getAddress(); ?>" class="form-control" name="address">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control" id="">
                        <option selected value="<?php echo $user->getGender(); ?>"><?php echo $user->getGender(); ?></option>
                        <?php
                        if($user->getGender() == 'Male') {
                            echo "<option value='Female'>Female</option>";
                        } else {
                            echo "<option value='Male'>Male</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                   <label for="bloodType">Blood Type</label>
                    <select name="bloodType" class="form-control" id="">
                        <?php 
                        $arr = array('A(Rh-)', 'A(Rh+)', 'B(Rh-)', 'B(Rh+)', 'AB(Rh-)', 'AB(Rh+)', '0(Rh-)', '0(Rh+)');
                        for($i = 0; $i < 8; $i++){
                            if($user->getBloodType() == $arr[$i]){
                                echo "<option selected value='$arr[$i]'>$arr[$i]</option>";
                            }
                            else
                                echo "<option value='$arr[$i]'>$arr[$i]</option>";                                        
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="role">User Role</label>
                    <select name="userRole" class="form-control" id="">
                        <option selected value='<?php echo $user->getUserRole();?>'><?php echo $user->getUserRole(); ?></option>
                        <?php
                        if($user->getUserRole() == 'Admin') {
                            echo "<option value='Patient'>Patient</option>";
                        } else {
                            echo "<option value='Admin'>Admin</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
            </div>
            
        </form>
    