<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_db.php';

    $PName = $_POST['pname'];
    $PCode = $_POST['pcode'];
    $PFund = $_POST['pfund'];
    $PDomain = $_POST['pdomain'];
    $PID = '';
    $PSdate = $_POST['pstartDate'];
    $PManage = $_POST['pman'];

    $PCreatedBy = $_SESSION['aID'];

    $chk_sql = "SELECT * FROM `projects` WHERE pro_code='$PCode';";
    $res_chk = mysqli_query($con, $chk_sql);
    $row = mysqli_fetch_assoc($res_chk);

    if ($res_chk) {
        $numRows = mysqli_num_rows($res_chk);
        if ($numRows == 0) {
            $chk_sql1 = "SELECT * FROM `projects`";
            $res_chk1 = mysqli_query($con, $chk_sql1);
            $row1 = mysqli_fetch_assoc($res_chk1);

            if ($res_chk1) {
                $numRows_1 = mysqli_num_rows($res_chk1);
                if($numRows_1 < 10){
                    $tempID = $numRows_1 + 1;
                    $PID = 'PR00' . $tempID;
                }elseif(($numRows_1 >= 10) and ($numRows_1 < 100)){
                    $tempID = $numRows_1 + 1;
                    $PID = 'PR0' . $tempID;
                }else{
                    $tempID = $numRows_1 + 1;
                    $PID = 'PR' . $tempID;
                }

                $sql = "INSERT INTO `projects` (`pro_id`, `pro_code`, `pro_name`, `pro_funded_by`, `pro_domain`, `pro_manager`, `a_id`, `pro_startDate`) VALUES ('$PID', '$PCode',  '$PName', '$PFund', '$PDomain', '$PManage', '$PCreatedBy', '$PSdate');";

                $res = mysqli_query($con, $sql);

                if ($res) {
                    header("Location: ../components/admin/projectList.php");
                    exit();
                }else {
                    header("Location: ../components/admin/projectList.php?Err=ServerErr");
                    exit();
                }
            }
        }else{
            header("Location: ../components/admin/projectList.php?Err=ProjectExists");
            exit();
        }     
    }
}
