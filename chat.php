<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="./css/chat.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="wrapper">
        <section class="chat">
            <header>
                <?php
                include_once "php/config.php";
                $user_id = mysqli_real_escape_string($connect, $_GET['user_id']);
                $sql = mysqli_query($connect, "SELECT * from chatdata where unique_id ={$user_id} ");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <a href="user.php"><i class="bi bi-arrow-left"></i></a>
                <img src="image/<?php echo $row['img'] ?>" class="image" alt="">
                <div class="details">
                    <span style="font-weight: bold;">
                        <?php echo $row['fname'] . " " . $row['lname'] ?>
                    </span>
                    <p id="headerp" style="color: rgb(98, 204, 98); font-weight: 600;"><?php echo $row['status']; ?></p>
                </div>


            </header>
            <div class="chat-area">
                <div id="chatarea">
                </div>
                <div style="position: relative; bottom:1px">
                    <div id="emoji" style="display: none; padding: 6px;
                            width: 435px;margin-left: -28px;background-color:white;border-radius:10px">
                    </div>
                </div>
            </div>
            <form action="" class="type-area" id="form" autocomplete="off">
                <div class="text-emoji">
                    <i style="margin-right: 2px; font-size: 20px;" class="bi bi-emoji-smile" id="seremoji"></i>
                </div>
                <div>
                    <input type="text" name="incoming_msg_id" value="<?php echo $user_id ?>" hidden>
                    <input type="text" name="outgoing_msg_id" value="<?php echo $_SESSION['unique_id'] ?>" hidden>
                    <input type="text" id="msg" name="inputfeild" style="width: 350px; font-size:18px; margin-left: 7px; margin-right: 7px; border:none; height: 26px;" placeholder="Type a message">
                </div>
                <div class="send">
                    <button class="send" id="sendbtn">
                        <i class="fa fa-send-o" id="send" style="font-size:25px"></i>
                    </button>
                </div>

            </form>
        </section>
    </div>
    <script src="./javascript/chat.js"></script>
</body>

</html>