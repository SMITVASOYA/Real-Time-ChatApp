<?php
include_once "config.php";
session_start();
$searchTerm = mysqli_real_escape_string($connect, $_POST['searchTerm']);
$searchTerm = str_replace(' ', '', $searchTerm);

$sql = mysqli_query($connect, "SELECT * from chatdata where fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%' or fullname LIKE '%{$searchTerm}%' ");

$output = "";
if (mysqli_num_rows($sql) > 0) {
    include "data.php";
} else {

    $output .= '  <div style="margin-top: 41px; text-align:center;font-weight:530;                 font-size:20px;       text-decoration: underline;">
            No such user found from Search </div>';
}
echo $output;
