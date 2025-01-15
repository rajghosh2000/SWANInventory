<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_db.php';

    $aName = $_POST['aname'];
    $aEmail = $_POST['aemail'];
    $aGender = $_POST['agender'];
    $aPwd = $_POST['apwd'];
    $aID = '';
    $aCreatedBy = 'AD002';

    $chk_sql = "SELECT * FROM `admin` WHERE a_email='$aEmail';";
    $res_chk = mysqli_query($con, $chk_sql);
    $row = mysqli_fetch_assoc($res_chk);

    if ($res_chk) {
        $numRows = mysqli_num_rows($res_chk);
        if ($numRows == 0) {
            $chk_sql1 = "SELECT * FROM `admin`";
            $res_chk1 = mysqli_query($con, $chk_sql1);
            $row1 = mysqli_fetch_assoc($res_chk1);

            if ($res_chk1) {
                $numRows_1 = mysqli_num_rows($res_chk1);
                if($numRows_1 < 10){
                    $aID = 'AD00' . $numRows_1;
                }elseif(($numRows_1 >= 10) and ($numRows_1 < 100)){
                    $aID = 'AD0' . $numRows_1;
                }else{
                    $aID = 'AD' . $numRows_1;
                }

                $aPassword = password_hash($aPwd, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_pwd`, `a_created_by`, `a_gender`) VALUES ('$aID', '$aName',  '$aEmail', '$aPassword', '$aCreatedBy', '$aGender');";

                $res = mysqli_query($con, $sql);

                if ($res) {
                    header("Location: ../components/admin/projectList.php");
                    exit();
                }else {
                    header("Location: ../components/main.php?Err=ServerErr");
                    exit();
                }
            }
        }else{
            header("Location: ../components/main.php?Err=AdminExists");
            exit();
        }     
    }
}
