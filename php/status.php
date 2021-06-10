<?php
session_start();
include_once "config.php";

echo "";
$incoming = mysqli_real_escape_string($connect, $_POST['incoming_msg_id']);
$outgoing = mysqli_real_escape_string($connect, $_POST['outgoing_msg_id']);

$sql = mysqli_query($connect, "SELECT * FROM message 
    LEFT JOIN chatdata ON message.outgoing_msg_id = chatdata.unique_id
    where (incoming_msg_id = {$incoming} AND outgoing_msg_id ={$outgoing}) OR (incoming_msg_id = {$outgoing} AND outgoing_msg_id ={$incoming})");


if (mysqli_num_rows($sql) > 0) {
    $row =  mysqli_fetch_assoc($sql);
    echo $row['status'];
}
