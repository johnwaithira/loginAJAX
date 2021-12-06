<?php
$GLOBALS['conn'] = new mysqli("localhost", "root", "", "login");
function esc($data){
    return mysqli_real_escape_string($GLOBALS['conn'], $data);
}
function checkEmail($email){
        $check = $GLOBALS['conn']->query("SELECT * FROM users WHERE email = '$email'");
        if($check->num_rows < 1){
            return 2;
        }else{
            return 1;
        }
    }
function securePass($password){
    return md5($password);
}
function checkEmpty($username,$email, $password){
    if(empty($username) && empty($password) && empty($email)){
        return "All filed are required";
    }elseif(!empty($password) && empty($username) && empty($email)){
        return "Username and Email are required";
    }
    elseif(empty($password) && empty($username) && !empty($email)){
        return "Username and Password are required";
    }
    elseif(empty($password) && !empty($username) && empty($email)){
        return "Email and Password are required";
    }
    elseif(empty($username)){
        return "Please enter username";
    }
    elseif(empty($email)){
        return "Please enter an Email";
    }
    elseif(empty($password)){
        return "Please enter Password";        
    }
    $var =  checkEmail($email);
    if($var == 1){
        return "Email is already used";
    }
    if($var == 2){
        $sign = signUp($username,$email,$password);
        if($sign == 1){
            echo "Account created successfully";
        }else{
            echo "Failed to creeate, Try later ";
        }
    }
}
function signUp($username,$email,$password){
    
    if(!empty($username) && !empty($password) && !empty($email)){
            $userid = bin2hex(random_bytes(3));
            $sign = $GLOBALS['conn']->query("INSERT INTO users(
                userid,
                username,
                email,
                password
                ) 
                VALUES('$userid','$username', '$email', '$password')");
        if($sign){
            return 1;
        }
    }
}

// login

