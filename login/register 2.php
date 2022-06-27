<?php
session_start();

    $con = require("connection.php");
    include("functions.php");
    $error = false;

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password))
        {
            // save info to database
            $user_id = random_num(20);
            $query = "insert into users (user_id,email,password) values ('$user_id','$email','$password')";

            $result = mysqli_query($con, $query);
            if($result == true){   
                header("Location: index.php");
                die;
            }
            
            $error = "This email address has already been used!";
        }else
        {
            $error = "Please enter valid information!";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href=""/>
    <script src="/js/main.js" defer></script>
    <script src="https://kit.fontawesome.com/44df10ddff.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <a href="/index.html" class="logo">Fine Clothes</a>
        </nav>    
    </header>
    <section class="banner">
    <div id="box-login">
        <form method="POST">
            <div class="login-title">Register</div>
           
            <h5 class="login-h5">Email</h5><i class="fa fa-envelope" aria-hidden="true"></i>
            <input id="text-form" type="email" name="email" placeholder="Enter email address"><br><br>
            <h5 class="login-h5">Password</h5><i class="fa fa-lock" aria-hidden="true"></i>
            <input id="text-form" type="password" name="password" placeholder="Enter password"><br><br>

            <input id="button-form" type="submit" value="Register"><br><br>

            <a href="index.php">Click to Login</a><br><br>
        </form>
    </div>
    <?php if($error):?>
    <div class="error-msg">
        <?php echo $error; ?> 
    </div>
    <?php endif ?>

    </section>


    <footer class="footer">
        <div class="social">
            <a href="https://www.instagram.com/fineclothes/"><i class="fab fa-instagram"></i></a>
            <a href="https://facebook.com/fineclothes"><i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com/fineclothes"><i class="fab fa-twitter"></i></a>
            <a href="https://linkedin.com/fineclothes"><i class="fab fa-linkedin"></i></a>
        </div>
        <ul class="list">
            <li>
                <a href="/index.html">Home</a>
                <a href="#">Services</a>
                <a href="#">Terms</a>
                <a href="#">Privacy Policy</a>
                <a href="/contact/form.html">Contact Us</a>
            </li>
        </ul>
        <p class="copyright">
            © 2022 Fine Clothes. 
        </p>
    </footer>



</body>
</html>