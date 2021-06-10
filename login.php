<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Chat App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <section class="form signup">
            <header>Real ChatApp</header>
            <form action="#" id="form">
                <div id="error-txt" class="error-txt"></div>
                <div class="fields input">
                    <label for="email" type="email">Email Address: </label>
                    <input type="text" name="email" placeholder="Enter Your Email ">
                </div>
                <div class="fields input">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" onfocusout="eyeslash()" placeholder="Enter Your Password">
                    <i class="fa fa-eye-slash" onclick="eye()" id="eye"></i>
                </div>
                <div class="fields button">
                    <input type="submit" id="loginsubmit" value="Start the chat">
                </div>
            </form>
            <div class="link">Not yet signed Up? <a href="index.php">SignUp now</a> </div>
        </section>
    </div>
</body>

<script src="./javascript/login.js"></script>


</html>