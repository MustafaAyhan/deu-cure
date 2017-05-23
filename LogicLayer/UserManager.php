<?php
include "User.php";

class UserManager {
    
    public static function loginUser($tc, $password) {
        global $connection;
        
        
        $stmt = mysqli_prepare($connection, "SELECT tc, firstName, surName, password, address, userRole FROM users WHERE tc = ?");
        mysqli_stmt_bind_param($stmt, "i", $tc);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $tc, $firstName, $surName, $db_password, $address, $userRole);
        mysqli_stmt_fetch($stmt);
        
        $user = new User($tc, $firstName, $surName, $userRole, NULL, NULL, $db_password, NULL, NULL, $address, NULL);
            
        //if(password_verify($password, $user->getPassword())) {
        if($password == $user->getPassword()) {
            $_SESSION['tc']         = $user->getTc();
            $_SESSION['password']   = $user->getPassword();
            $_SESSION['firstName']  = $user->getFirstName();
            $_SESSION['address']    = $user->getAddress();
            $_SESSION['surName']    = $user->getSurName();
            $_SESSION['user_role']  = $user->getUserRole();
            header("Location: /deu-cure/gallery.php");
        }  else {
            header("Location: /deu-cure/about.php");
        }
    }

    public static function registerUser($user) {
        global $connection;

        //$password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

        $stmt = mysqli_prepare($connection, "INSERT INTO users values(?, ?, ?, 'Patient', ?, ?, ?, ?, ?, ?, ?) ");
        mysqli_stmt_bind_param($stmt, "issssssiss", $user->getTc(), $user->getFirstName(), $user->getSurName(), $user->getBirthDate(), $user->getEmail(), $user->getPassword(), $user->getGender(), $user->getTel(), $user->getAddress(), $user->getBloodType());
        $flag = mysqli_stmt_execute($stmt);
        if($flag)
            return true;
        return false;
    }

    public static function tcExists($tc) {
        global $connection;
        $query  = "SELECT tc FROM users WHERE tc = '$tc'";
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function emailExists($email) {
        global $connection;
        $query  = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function selectUser($tc){
        global $connection;
        $query = "SELECT * FROM users WHERE tc = {$tc}";
        $select_user_query = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($select_user_query);
        $user = new User($row['tc'], $row['firstName'], $row['surName'], $row['userRole'], $row['birthDate'], $row['email'], $row['password'], $row['gender'], $row['telephoneNumber'], $row['address'], $row['bloodType']);
        return $user;
    }

    public static function updateUser($user){
        global $connection;

        $stmt = mysqli_prepare($connection, "UPDATE users SET firstName = ?, surName = ?, birthDate = ?, email = ?, password = ?, telephoneNumber = ?, address = ?, gender = ?, bloodType = ?, userRole = ? WHERE tc = {$user->getTc()}");
        mysqli_stmt_bind_param($stmt, "sssssissss", $user->getFirstName(), $user->getSurName(), $user->getBirthDate(), $user->getEmail(), $user->getPassword(), $user->getTel(), $user->getAddress(), $user->getGender(), $user->getBloodType(), $user->getUserRole());
        $flag = mysqli_stmt_execute($stmt);
        if($flag)
            return true;
        return false;
    }
    
    public static function getAllUsers () {
        global $connection;
        $query = "SELECT * FROM users";
        $select_user_query = mysqli_query($connection, $query);
        $allUsers = array();

        while($row = mysqli_fetch_assoc($select_user_query)) {
            $user = new User($row['tc'], $row['firstName'], $row['surName'], $row['userRole'], $row['birthDate'], $row['email'], $row['password'], $row['gender'], $row['telephoneNumber'], $row['address'], $row['bloodType']);
            array_push($allUsers, $user);
        }

        return $allUsers;
    }
    
    public static function deleteUser($tc) {
        global $connection;
        $query = "DELETE FROM users WHERE tc = $tc ";
        $delete_query = mysqli_query($connection, $query);
        if($delete_query)
            return true;
        return false;
    }
    
    public static function deleteAssaysByTc($tc){
        global $connection;
        $query = "DELETE FROM assays WHERE tc = $tc ";
        $delete_query = mysqli_query($connection, $query);
        if($delete_query)
            return true;
        return false;
    }
    
    public static function insertAssay($tc, $assay) {
        global $connection;
        if(UserManager::tcExists($tc)) {
            $query = "INSERT INTO assays(tc, assayNumber) VALUES({$tc}, {$assay})";
            $insert_query = mysqli_query($connection, $query);
            if($insert_query)
                return true;
            return false;
        }
        return false;
    }
    
    public static function maleCount() {
        global $connection;
        $query = "SELECT * FROM users WHERE gender LIKE 'Male'";
        $execute_query = mysqli_query($connection, $query);
        return mysqli_num_rows($execute_query);
    }
    
    public static function femaleCount() {
        global $connection;
        $query = "SELECT * FROM users WHERE gender LIKE 'Female'";
        $execute_query = mysqli_query($connection, $query);
        return mysqli_num_rows($execute_query);
    }
}
?>