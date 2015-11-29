<?php

include("dbconnect.php");

$decision = $_GET['action'];
$userId = $_GET['userId'];

if ($decision == "approve")
{
	$query = "UPDATE m_user SET verified=1 WHERE user_id=".$userId;
	mysqli_query($conn, $query);
}

elseif ($decision == "decline") {
	$query = "UPDATE m_user SET verified=-1 WHERE user_id=".$userId;
	mysqli_query($conn, $query);
}

header("Location: ../moderator-approve.php");
?>