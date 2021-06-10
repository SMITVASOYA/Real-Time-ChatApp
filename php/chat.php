<?php
session_start();

include_once "config.php";
if (isset($_SESSION['unique_id'])) {
    $input = mysqli_real_escape_string($connect, $_POST["inputfeild"]);
    $incoming = mysqli_real_escape_string($connect, $_POST['incoming_msg_id']);
    $outgoing = mysqli_real_escape_string($connect, $_POST['outgoing_msg_id']);

    if (!empty($input)) {
        mysqli_query($connect, "INSERT into message (incoming_msg_id, outgoing_msg_id,message) values({$incoming},{$outgoing},'{$input}')") or die();
    }
} else {
    header('location: login.php');
}
