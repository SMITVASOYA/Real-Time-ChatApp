<?php

session_start();
$outgoing_id = $_SESSION['unique_id'];
include_once "config.php";

$sql = mysqli_query($connect, "SELECT * from chatdata");
$output = "";
if (mysqli_num_rows($sql) == 1) {
    $output .= "NO User Available";
} elseif (mysqli_num_rows($sql) > 1) {
    include "data.php";
}
echo $output;
