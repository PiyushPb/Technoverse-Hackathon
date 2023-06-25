<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}
include 'conn.php';

// Get the user ID from the session
$user_id = $_SESSION['id'];

// Retrieve user data from the database
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch user data
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
    $referral = $row['referral'];
    $friends_referral = $row['friends_referral'];
} else {
    // User not found in the database
    echo "User not found.";
    exit();
}

// Handle referral update
if (isset($_POST['update_referral'])) {
    $new_referral = $_POST['referral'];

    // Check if the new referral is different from the current referral and not the same as the user's own referral
    if ($new_referral != $friends_referral && $new_referral != $referral) {
        // Check if the referral exists in the database
        $referral_sql = "SELECT * FROM users WHERE referral = '$new_referral'";
        $referral_result = $conn->query($referral_sql);

        if ($referral_result->num_rows > 0) {
            // Update the friends_referral in the database
            $update_sql = "UPDATE users SET friends_referral = '$new_referral' WHERE id = '$user_id'";
            $conn->query($update_sql);

            // Disable referral input field after updating
            $referral_disabled = true;
        } else {
            // Invalid referral code
            echo "Invalid referral code.";
        }
    }
}

// Generate referral code
$referral_code = $friends_referral ?: "No referral code available";
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin: 50px auto;
            max-width: 500px;
        }
        .profile-form label {
            font-weight: bold;
        }
        .profile-form input[type="text"] {
            margin-bottom: 15px;
        }
        .profile-form .btn-primary {
            margin-bottom: 15px;
        }
        .referral-code {
            margin-top: 30px;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }
        .referral-code .copy-btn {
            margin-top: 10px;
        }
    </style>
    <script>
        function copyReferralCode() {
            var referralCode = document.getElementById("referral-code").textContent;
            navigator.clipboard.writeText(referralCode).then(function() {
                alert("Referral code copied to clipboard!");
            }, function() {
                alert("Failed to copy referral code.");
            });
        }
    </script>
</head>
<body>
    <div class="container">
        <h1 class="text-center">User Profile</h1>
        <form class="profile-form" method="POST" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" class="form-control" value="<?php echo $name; ?>" disabled>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" class="form-control" value="<?php echo $email; ?>" disabled>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" class="form-control" value="<?php echo $phone_number; ?>" disabled>
            </div>

            <div class="form-group">
                <label for="referral">Referral:</label>
                <div class="input-group">
                    <input type="text" id="referral" name="referral" class="form-control" value="<?php echo $friends_referral; ?>" <?php if (isset($friends_referral) || isset($referral_disabled)) echo "disabled"; ?>>
                    <?php if (!isset($friends_referral) && !isset($referral_disabled)) { ?>
                        <div class="input-group-append">
                            <button type="submit" name="update_referral" class="btn btn-primary">Update</button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </form>

        <div class="referral-code">
            <h4>Your Referral Code:</h4>
            <p id="referral-code" class="lead"><?php echo $referral; ?></p>
            <button onclick="copyReferralCode()" class="btn btn-primary copy-btn">Copy</button>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
