<?php
session_start();

include_once "config.php";

$fname = mysqli_real_escape_string($connect, $_POST["fname"]);
$lname = mysqli_real_escape_string($connect, $_POST["lname"]);
$email = mysqli_real_escape_string($connect, $_POST["email"]);
$password = mysqli_real_escape_string($connect, $_POST["password"]);
// $image = mysqli_real_escape_string($connect , $_POST["image"]);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {

    //vaLIDating the email 
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        //checking the whether email is already exists or not 
        $sql = mysqli_query($connect, "SELECT email FROM chatdata where email = '{$email}'");

        if (mysqli_num_rows($sql) > 0) {
            echo "$email this mail IS ALREADY EXIST!!";
        } else {

            //chek the image is uploaded or not
            if (isset($_FILES['image'])) { // if file is uploded
                $image_name = $_FILES['image']['name']; // geting the uploaded image name
                $image_type = $_FILES['image']['type']; // getting the uploaded img type
                $imgtmp_name =  $_FILES['image']['tmp_name']; // setting the name of file to save or move to the server 

                // lets explode image and get the last extension like jpg png
                $image_explode = explode('.', $image_name);
                $image_extension = end($image_explode); //get the extension of particular image

                $extensions = ['png', 'jpg', 'jpeg']; //this is the possible extension could be possible

                if (in_array($image_extension, $extensions) === true) {
                    $time = time(); // here it is useful to rename the image name with time so that it is always unique
                    $new_img_name = $time . $image_name;
                    //lets move the user uploaded file into the folder 
                    if (move_uploaded_file($imgtmp_name, 'C:/xampp/htdocs/Chatapp/image/' . $new_img_name)) {
                        $status = "Online";
                        $rnd_id = rand(time(), 1000000); //creating the random id for user

                        //let's insert all user data into table
                        $fullname = $fname . $lname;
                        $sql2 = mysqli_query($connect, "INSERT INTO chatdata (unique_id,fname,lname,fullname,email,password,img,status) VALUES ({$rnd_id},'{$fname}','{$lname}','{$fullname}','{$email}','{$password}','{$new_img_name}','{$status}')");

                        if ($sql2) { //if the data is inserted
                            $sql3 = mysqli_query($connect, "SELECT * from chatdata where email='{$email}'");

                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);

                                $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user unique_id in other php file


                                echo "success";
                            }
                        } else {
                            echo "somthing is wrong";
                        }
                    }
                } else {
                    echo "please select the jpg or jpeg or png file extension image";
                }
            } else {
                echo "Please select an image file";
            }
        }
    } else {
        echo "please enter the validate email";
    }
} else {
    echo "All fields are required";
}
