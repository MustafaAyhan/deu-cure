<?php
//SQL validation
function confirmQuery($result) {
    global $connection;
    if(!$result) {
        die('Query FAILED. ' . mysqli_error($connection) . ' ' . mysqli_errno($connection));
    }
}
//Protection for inputs
function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}

function loginUser($tc, $password) {
    global $connection;    
    $stmt = mysqli_prepare($connection, "SELECT tc, firstName, surName, password, userRole FROM users WHERE tc = ?");
    mysqli_stmt_bind_param($stmt, "i", $tc);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $db_tc, $db_firstName, $db_surName, $db_password, $db_user_role);
    mysqli_stmt_fetch($stmt);
    
    if(password_verify($password, $db_password)) {
        $_SESSION['tc']         = $db_tc;
        $_SESSION['password']   = $password;
        $_SESSION['firstName']  = $db_firstName;
        $_SESSION['surName']    = $db_surName;
        $_SESSION['user_role']  = $db_user_role;
        header("Location: /deu-cure/gallery.php");
    }  else {
        header("Location: /deu-cure/about.php");
    }
}

function registerUser($tc, $firstName, $surName, $birthdate, $email, $password, $tel, $address, $gender, $bloodType) {
    global $connection;

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
    
    $stmt = mysqli_prepare($connection, "INSERT INTO users (tc, firstName, surName, userRole, birthDate, email, password, gender, telephoneNumber, address, bloodType) values(?, ?, ?, 'Patient', ?, ?, ?, ?, ?, ?, ?) ");
    mysqli_stmt_bind_param($stmt, "issssssiss", $tc, $firstName, $surName, $birthdate, $email, $password, $gender, $tel, $address, $bloodType);
    $flag = mysqli_stmt_execute($stmt);
    if($flag)
        return true;
    else    
        return false;
}

function tcExists($tc) {
    global $connection;
    $query  = "SELECT tc FROM users WHERE tc = '$tc'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    
    if(mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function emailExists($email) {
    global $connection;
    $query  = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    if(mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function selectUser($tc){
    $query = "SELECT * FROM users WHERE tc = $tc";
    $select_user_query = mysqli_query($connection, $query);
    confirmQuery($select_user_query);
    
    while($row = mysqli_fetch_assoc($select_user_query)) {
        $tc         = $row['tc'];
        $firstName  = $row['firstName'];
        $surName    = $row['surName'];
        $email      = $row['email'];
        $password   = $row['password'];
        $birthdate  = $row['birthDate'];
        $tel        = $row['tel'];
        $address    = $row['address'];
        $gender     = $row['gender'];
        $bloodType  = $row['bloodType'];
    }
}

function updateUser($tc, $firstName, $surName, $birthdate, $email, $password, $tel, $address, $gender, $bloodType){
    global $connection;
    
    $query_password = "SELECT password FROM users WHERE tc = $tc";
    $get_user_query = mysqli_query($connection, $query_password);
    confirmQuery($get_user_query);
    $row = mysqli_fetch_array($get_user_query);
    $db_user_password = $row['password'];

    if($db_user_password != $password) {
        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
    }
    
    $stmt = mysqli_prepare($connection, "UPDATE users SET firstName = ?, surName = ?, birthDate = ?, email = ?, password = ?, telephoneNumber = ?, address = ?, gender = ?, bloodType = ? WHERE tc = $tc");
    mysqli_stmt_bind_param($stmt, "ssssssiss", $firstName, $surName, $birthdate, $email, $password, $tel, $address, $gender, $bloodType);
    $flag = mysqli_stmt_execute($stmt);
    if($flag)
        return true;
    return false;
}
?>