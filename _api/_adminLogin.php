<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_db.php';

    $aname = $_POST['aname'];
    $aemail = $_POST['aemail'];
    $apwd   = $_POST['apwd'];

    $sql = "SELECT * FROM `admin` WHERE `a_email` = '$aemail';";
    $res = mysqli_query($con, $sql);
    $numRows = mysqli_num_rows($res);

    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($res);
        if (password_verify($apwd, $row['a_pwd'])) {
            session_start();
            $_SESSION['signedIn'] = true;
            $_SESSION['adminIS'] = true;
            $_SESSION['aID'] = $row['a_id'];
            $_SESSION['uname'] = $row['a_name'];
            header("Location: ../components/main.php");
            exit();
        } else {
            header("Location: ../index.html?login=false");
            exit();
        }
    } else {
        header("Location: ../index.html?login=noUsr");
        exit();
    }
}