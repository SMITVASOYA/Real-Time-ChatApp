<?php
session_start();
include_once "config.php";

$sql = mysqli_query($connect, "UPDATE chatdata set status = 'Offline' where unique_id = '{$_SESSION['unique_id']}'");

unset($_SESSION['unique_id']);
header("location: ../login.php");
