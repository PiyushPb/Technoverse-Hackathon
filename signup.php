<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/loginandsignup.css">
</head>
<body>
    <section class="container forms">
        <div class="form signup">
            <div class="form-content">
                <header>Signup</header>
                <form method="POST">

                    <div class="field input-field">
                        <input type="text" placeholder="Name" class="input" name="name">
                    </div>

                    <div class="field input-field">
                        <input type="tel" placeholder="Phone number" class="input" name="phone">
                    </div>

                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="email">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Create password" class="password" name="password">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Confirm password" class="password" name="confirm_password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field button-field">
                        <button type="submit" name="signup">Signup</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Already have an account? <a href="login.php" class="link login-link">Login</a></span>
                </div>
            </div>

            <div class="line"></div>

            <div class="media-options">
                <a href="assets/facebook.png" class="field facebook">
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

<?php
include 'conn.php';

function generateReferralKey() {
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $referralKey = '';
    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $referralKey .= $characters[rand(0, $charactersLength - 1)];
    }
    return $referralKey;
}

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $phone_number = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($name) || empty($phone_number) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "<script>alert('Please fill in all fields')</script>";
    } elseif ($password != $confirm_password) {
        echo "<script>alert('Passwords do not match')</script>";
    } else {
        $query = "SELECT * FROM users WHERE email = '$email' OR phone_number = '$phone_number'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<script>alert('User email or phone number already registered')</script>";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $referralKey = generateReferralKey();

            $sql = "INSERT INTO users (name, email, phone_number, password, referral) VALUES ('$name', '$email', '$phone_number', '$hashed_password', '$referralKey')";


            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('User registered successfully')</script>";
                header("Location: login.php"); // Redirect to index.php or any other page
                exit();
            } else {
                echo "<script>alert('Error uploading data: " . $conn->error . "')</script>";
            }
        }
    }
}
?>