<?php
// Database connection
// $db_host = "localhost";
// $db_username = "your_username";
// $db_password = "your_password";
// $db_name = "your_database_name";

// $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// Register user
if(isset($_REQUEST['submit'])) {
    // $username = mysqli_real_escape_string($conn, $_POST['username']);
    // $email = mysqli_real_escape_string($conn, $_POST['email']);
    // $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email= 'shvmhdb@gmail.com';
    $password = "Shivam@123#";
    // Hashing the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Generate verification code
    $verification_code = md5(uniqid(rand(), true));

    // Insert user details into database
    // $sql = "INSERT INTO users (username, email, password, verification_code) VALUES ('$username', '$email', '$hashed_password', '$verification_code')";
    // if(mysqli_query($conn, $sql)) {
        // Send verification email
        $to = $email;
        $subject = "Email Verification";
        $message = "Hello $username,\n\nThank you for registering. Please click the link below to verify your email:\n\nhttp://yourdomain.com/verify.php?code=$verification_code\n\nRegards,\nYourWebsite Team";
        $headers = "From: shvmhdb@gmail.com\r\n";
        mail($to, $subject, $message, $headers);
        echo "Registration successful. Please verify your email.";


        <?php
// Include the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path to PHPMailer autoload.php file

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.example.com';                     // SMTP server
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'your@example.com';                     // SMTP username
    $mail->Password   = 'yourpassword';                         // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
    $mail->Port       = 587;                                    // TCP port to connect to

    // Recipient
    $mail->setFrom('your@example.com', 'Your Name');            // Sender's email and name
    $mail->addAddress($email, $username);                       // Recipient's email and name

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Email Verification';                      // Email subject
    $mail->Body    = "Hello $username, <br><br>Thank you for registering. Please click the link below to verify your email:<br><br><a href='http://yourdomain.com/verify.php?code=$verification_code'>Verify Email</a><br><br>Regards,<br>YourWebsite Team";

    // Send the email
    $mail->send();
    echo 'Registration successful. Please verify your email.';
} catch (Exception $e) {
    // Handle exceptions
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


    // } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }
}

// Verification script (verify.php)
if(isset($_GET['code'])) {
    $verification_code = $_GET['code'];
    $sql = "SELECT * FROM users WHERE verification_code = '$verification_code'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];
        $sql_update = "UPDATE users SET verified = 1 WHERE id = '$user_id'";
        if(mysqli_query($conn, $sql_update)) {
            echo "Email verified successfully.";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid verification code.";
    }
}

die;
// Close connection
mysqli_close($conn);
?>
