<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_db.php';

    $cmname = $_POST['cmname'];
    $cmuid = $_POST['cmuid'];
    $cmclass = $_POST['cmclass'];
    $cmqty = (int)$_POST['cmqty'];
    $cmunit = $_POST['cmunit'];
    $cmcom = $_POST['cmcom'];
    $cmgloc = $_POST['cmgloc'];
    $cmcmpt = $_POST['cmcmpt'];
    $cmaloc = $_POST['cmaloc'];
    $cmmiss = $_POST['cmmiss'];
    $cmsupply = $_POST['cmsupply'];
    $cminvoice = $_POST['cminvoice'];
    $cmdesc = $_POST['cmdesc'];

    $cmID = '';
    $cmCreatedBy = $_SESSION['aID'];
    $proID = $_GET['prid'];

    $chk_sql1 = "SELECT * FROM `components_class`";
    $res_chk1 = mysqli_query($con, $chk_sql1);

    if ($res_chk1) {
        $numRows_1 = mysqli_num_rows($res_chk1);
        $dateTime = new DateTime();
        $timestamp = $dateTime->format('YmdHis');

        $prefix = "COMPS";
        $cmID = $prefix . $timestamp . mt_rand(1000, 9999);

        $sql = "INSERT INTO `components` (`cmpt_id`, `cmpt_name`, `cmpt_unique_id`, `cmpt_class`, `cmp_qty`, `cmp_unit`, `cmpt_consumable`, `cmpt_global_location`, `cmpt_location_compartment`, `cmpt_altered_loc`, `cmpt_missing`, `cmpt_notes`, `cmpt_supplier`, `cmpt_invoice_no`, `cmpt_added_by`, `cmpt_project_id`) VALUES ('$cmID', '$cmname', '$cmuid', '$cmclass', '$cmqty', '$cmunit', '$cmcom', '$cmgloc', '$cmcmpt', '$cmaloc', '$cmmiss', '$cmdesc', '$cmsupply', '$cminvoice', '$cmCreatedBy', '$proID');";

        $res = mysqli_query($con, $sql);

        if ($res) {
            header("Location: ../components/admin/projectPage.php?prid=$proID");
            exit();
        } else {
            header("Location: ../components/admin/projectPage.php?prid=$proID&Err=ServerErr");
            exit();
        }
    }
}
