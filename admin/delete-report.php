<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if ($_GET['action'] = 'del') {
        $postid = intval($_GET['pid']);
        $query = mysqli_query($con, "delete from tblreport where busid='$postid'");
        if ($query) {
            $msg = "report deleted ";
            header('location:manage-report.php');
        } else {
            $error = "Something went wrong . Please try again.";
        }
    }
}
?>