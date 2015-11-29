<?php
session_start();
include ("dbconnect.php");
var_dump($_SESSION);
$firstName = $_SESSION["form-first-name"];
$lastName = $_SESSION["form-last-name"];
$mailId = $_SESSION["form-email"];
$password = $_SESSION["form-password"];
$passwordToStore = md5($password);
$mobile_number = $_POST['form-mobile-number'];
$alternative_mobile_number = $_POST['form-alternate-mobile'];
$dob = $_POST['form-dob'];
$gender = $_POST['form-gender'];
$qualification = $_POST['form-qual'];
$institution = $_POST['form-inst'];
$occupation = $_POST['form-occ'];
$address = $_POST['form-add'];
$state = $_POST['form-state'];
$pic = $_POST['form-pic'];
$doc = $_POST['form-doc'];
$district = $_POST['form-dist'];
$location = $_POST['form-geo'];
$userId = explode("@", $mailId)[0];
$curDate = date("D M d, Y G:i");

$sqlQuery = "INSERT INTO `m_user`(`user_id`,`first_name`,`last_name`,`email_id`,`mobile_number`,`alternative_mobile_number`,`date_of_birth`,`gender`,`qualification`,`institution`,`occupation`,`state`,`district`,`location`,`address`,`document_path`,`picture_path`,create_time`,`update_time`,`cud`,`verified`,`m_id`,`verifier_mid`,`pwd`) values ($userId,$firstName,$lastName,$mailId,$mobile_number,$alternative_mobile_number,$dob,$gender,$qualification,$institution,$occupation,$state,$district,$location,$address,$doc,$pic,$curDate,$curDate,'C',0,0,'1',$passwordToStore)";
mysqli_query($conn,$sqlQuery);

?>


