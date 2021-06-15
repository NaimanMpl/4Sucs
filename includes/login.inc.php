<?php
if(isset($_POST['login-submit'])){
    require './dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location: ../login.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username=? OR email=?";
        $ps = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($ps, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($ps, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($ps);
            $resultQuery = mysqli_stmt_get_result($ps);
            if ($row = mysqli_fetch_assoc($resultQuery)) {
                $pwdCheck = password_verify($password, $row['password']);
                if ($pwdCheck == false) {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }else if($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];

                    header("Location: ../index.php?login=success");
                    exit();
                } else {
                    header("Location: ../login.php?error=wrongpassword");
                    exit(); 
                }
            } else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }

    }
} else {
    header("Location: ../index.php");
    exit();
}
?>