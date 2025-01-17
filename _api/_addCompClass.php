<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_db.php';

    $ccName = $_POST['ccname'];
    $ccDesc = $_POST['ccdesc'];
    $ccImg = $_POST['ccimg'];
    $ccID = '';
    $aCreatedBy = $_SESSION['aID'];

    $chk_sql1 = "SELECT * FROM `components_class`";
    $res_chk1 = mysqli_query($con, $chk_sql1);
    $row1 = mysqli_fetch_assoc($res_chk1);

    if ($res_chk1) {
        $numRows_1 = mysqli_num_rows($res_chk1);
        if ($numRows_1 < 10) {
            $tempID = $numRows_1 + 1;
            $ccID = 'ITC0000' . $tempID;
        } elseif (($numRows_1 >= 10) and ($numRows_1 < 100)) {
            $tempID = $numRows_1 + 1;
            $ccID = 'ITC000' . $tempID;
        } elseif (($numRows_1 >= 100) and ($numRows_1 < 1000)){
            $tempID = $numRows_1 + 1;
            $ccID = 'ITC00' . $tempID;
        }elseif (($numRows_1 >= 1000) and ($numRows_1 < 10000)){
            $tempID = $numRows_1 + 1;
            $ccID = 'ITC0' . $tempID;
        }else {
            $tempID = $numRows_1 + 1;
            $ccID = 'ITC' . $tempID;
        }

        $sql = "INSERT INTO `components_class` (`it_c_id`, `it_c_name`, `it_c_desc`, `it_c_created_by`, `it_c_img`) VALUES ('$ccID', '$ccName', '$ccDesc', '$aCreatedBy', '$ccImg')";

        $res = mysqli_query($con, $sql);

        if ($res) {
            header("Location: ../components/admin/projectList.php");
            exit();
        } else {
            header("Location: ../components/main.php?Err=ServerErr");
            exit();
        }
    }
}
