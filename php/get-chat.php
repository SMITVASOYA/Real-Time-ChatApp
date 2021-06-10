<?php
session_start();
$outgoing_id = $_SESSION['unique_id'];

include_once "config.php";

if (isset($_SESSION['unique_id'])) {

    $incoming = mysqli_real_escape_string($connect, $_POST['incoming_msg_id']);
    $outgoing = mysqli_real_escape_string($connect, $_POST['outgoing_msg_id']);

    $output = "";

    $sql = mysqli_query($connect, "SELECT * FROM message 
    LEFT JOIN chatdata ON message.outgoing_msg_id = chatdata.unique_id
    where (incoming_msg_id = {$incoming} AND outgoing_msg_id ={$outgoing}) OR (incoming_msg_id = {$outgoing} AND outgoing_msg_id ={$incoming}) ORDER BY msg_id  ");


    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
            if ($row['outgoing_msg_id'] === $outgoing) {
                $output .= '  <div style="margin-bottom:2px" class="chat-out">
                    <div class="chat-details">
                        <p>' . $row['message'] . '</p>
                    </div>';
            } else {
                $output .= '<div class="chat-in">
                    <img src="image/' . $row['img'] . '" class="chat-image" alt="">
                    <div class="chat-details">
                        <p>' . $row['message'] . ' </p>
                    </div>
                </div>';
            }
        }
        echo $output;
    }
} else {
    header("../login.php");
}
