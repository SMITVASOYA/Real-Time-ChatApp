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
    <link rel="stylesheet" href="./css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="wrapper">
        <section class="user">
            <header>
                <?php
                include_once "php/config.php";
                $sql = mysqli_query($connect, "SELECT * from chatdata where unique_id ={$_SESSION['unique_id']} ");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <div class="content">
                    <img src="image/<?php echo $row['img'] ?>" class="image" alt="">
                    <div class="details">
                        <span style="font-weight: bold">
                            <?php echo $row['fname'] . " " . $row['lname'] ?>
                        </span>
                        <p style="color: green; font-weight: 600">Online</p>
                    </div>
                </div>
                <a href="php/logout.php" onclick="logout()" class="logout">Logout</a>
            </header>
            <div class="search">
                <input type="text" placeholder="Enter Name to Search" name="searchTerm" id="search">
                <button class="button" id="searchbtn1">
                    <i class="fa fa-search" id="searchbtn2"> </i>
                </button>
            </div>


            <div class="contactlist">
            </div>


        </section>
    </div>
    <script src="./javascript/user.js"></script>
</body>

</html>