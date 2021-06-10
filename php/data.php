<?php

include_once "config.php";

while ($row = mysqli_fetch_assoc($sql)) {
    $sql2 = "SELECT * from message where (incoming_msg_id={$row['unique_id']} OR outgoing_msg_id={$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id})ORDER by msg_id DESC LIMIT 1";

    $query2 = mysqli_query($connect, $sql2);

    $row2 = mysqli_fetch_assoc($query2);

    if (mysqli_num_rows($query2) > 0) {
        $result = $row2['message'];
    } else {
        $result = "No message available";
    }

    (strlen($result) > 28) ? $msg = substr($result, 0, 28) . '...' : $msg = $result;

    if ($row['status'] == "Online") {
        $status = "green";
    } elseif ($row['status'] == "Offline") {
        $status = "grey";
    }

    if ($row['unique_id'] != $_SESSION['unique_id']) {
        $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                    <div class="">
                        <div style="display: flex">
                            <img src="image/' . $row['img'] . '" class="image" alt="">
                            <div class="details"><span style="font-weight: bold">'
            . $row['fname'] . " " . $row['lname'] .
            '</span>
                                <p>' .  $msg . '</p>
                            </div>
                        </div>
                    </div>
                    <div class="dot">
                        <svg height="50" width="50">
                        <circle class="svgcircle" id="svgcircle" cx="40" cy="30" r="8"  fill="' . $status . '"/>
                        </svg>
                    </div>

                </a>
            ';
    }
}
