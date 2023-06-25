<?php
session_start(); // Start the session

include 'conn.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($conn, $email_search);

    $email_count = mysqli_num_rows($query);

    if ($email_count) {
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password'];

        $pass_decode = password_verify($password, $db_pass);

        if ($pass_decode) {
            $_SESSION['username'] = $email_pass['name'];
            $_SESSION['isLoggedIn'] = True;
            $_SESSION['id'] = $email_pass['id']; // Add this line to store the uid in the session
        
            header("Location: index.php"); // Redirect to index.php or any other page
            exit();
        
        } else {
            echo "<script>alert('Incorrect password')</script>";
        }
    } else {
        echo "<script>alert('Invalid email')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/loginandsignup.css">

</head>
<body>

    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                <form method="POST" autocomplete="off">
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name = "email"  autocomplete="off">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password" name = "password" autocomplete="off">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="form-link">
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>

                    <div class="field button-field">
                        <button name = "login" type = "submit">Login</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="signup.php" class="link signup-link">Signup</a></span>
                </div>
            </div>

            <div class="line"></div>

            <div class="media-options">
                <a href="" class="field facebook">
                    <img src="assets/facebook.png" alt="" class="google-img">
                    <span>Login with Facebook</span>
                </a>
            </div>

            <div class="media-options">
                <a href="#" class="field google">
                    <img src="assets/google.png" alt="" class="google-img">
                    <span>Login with Google</span>
                </a>
            </div>

        </div>
    </section>
    
</body>
</html>
