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

    if ($res_chk1) {
        $numRows_1 = mysqli_num_rows($res_chk1);
        $dateTime = new DateTime();
        $timestamp = $dateTime->format('YmdHis');

        $prefix = "ITC";
        $ccID = $prefix . $timestamp . mt_rand(1000, 9999);

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
