<?php
    session_start();
    
    include_once "config.php";

    $email = mysqli_real_escape_string($connect , $_POST["email"]);
    $password = mysqli_real_escape_string($connect , $_POST["password"]);

    if(!empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sqlemail = mysqli_query($connect, "SELECT email from chatdata WHERE email = '{$email}' ");

            if(mysqli_num_rows($sqlemail)>0){
                $sqlpassword = mysqli_query($connect, "SELECT * from chatdata where email = '{$email}'  ");
                
                $row = mysqli_fetch_assoc($sqlpassword);
                if($password == $row["password"]){
                     $_SESSION['unique_id'] = $row['unique_id'];
                     
                     $sql =mysqli_query($connect,"UPDATE chatdata set status = 'Online' where unique_id = '{$_SESSION['unique_id']}'");
                    echo "success";
                }
                else{
                    echo "Pass is wrong";
                }
            
            }
            else{
                echo "User not Found";
            }
        }
        else{
            echo "Enter Valid E-Mail Address";
        }
    }
    else{
        echo "All Fields are required";
    }
?>