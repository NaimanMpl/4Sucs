<?php
if(isset($_POST['signup-submit'])) {
    require './dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $password_confirm = $_POST['pwd-repeat'];

    if(empty($username) || empty($email) || empty($password) || empty($password_confirm)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidmailusername");
        exit();
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    } else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidusername&mail=".$email);
        exit(); 
    } else if($password !== $password_confirm) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }else{
        $sql = "SELECT username FROM users WHERE username=? AND password=?";
        $ps = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($ps, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($ps, "s", $username);
            mysqli_stmt_execute($ps);
            mysqli_stmt_store_result($ps);
            $resultQuery = mysqli_stmt_num_rows($ps);
            if($resultQuery > 0) {
                header("Location: ../signup.php?error=usernamealreadytaken&mail=".$email);
                exit();
            }else{
                $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";
                $ps = mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($ps, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }else{
                    $hashPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($ps, "sss", $username, $email, $hashPwd);
                    mysqli_stmt_execute($ps);
                    header("Location: ../signup.php?error=signup-success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($ps);
    mysqli_close($con);
}else{
    header("Location: ../index.php");
    exit();
}
?>