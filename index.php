<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Chat App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style></style>
</head>

<body>
    <div class="container">
        <section class="form signup">
            <header>Real ChatApp</header>
            <form action="#" id="form" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt" id="error-txt"> this is an error</div>
                <div class="name-details">
                    <div class="fields input">
                        <label for="firstname">First Name: </label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="fields input">
                        <label for="lastname">Last Name: </label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="fields input">
                    <label for="email">Email Address: </label>
                    <input type="email" name="email" placeholder="Enter Your Email " required>
                </div>
                <div class="fields input">
                    <label for="password">Password: </label>
                    <input type="password" id="password" name="password" onfocusout="eyeslash()" placeholder="Enter Your Password" required>
                    <i class="fa fa-eye-slash" onclick="eye()" id="eye"></i>
                </div>
                <div class="picture">
                    <input type="file" name="image">
                </div>
                <div class="fields button">
                    <input type="submit" id="indexsubmit" value="Start the chat" required>
                </div>
            </form>
            <div class="link">Already Signed Up? <a href="login.php">Login now</a> </div>
        </section>
    </div>

    <script src="./javascript/index.js"></script>
</body>

</html>