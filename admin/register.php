<?php
include_once("connection.php");
$msg="";

if(isset ($_POST['email']) && ($_POST['password']!=''))
{
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $name=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    
    $key = "ThisIsASecretKey123"; // Encryption key (should be kept secret)
    $encryptedPassword = encryptPassword($password, $key);

    $address=mysqli_real_escape_string($con,$_POST['address']);
    $qualification=mysqli_real_escape_string($con,$_POST['qualification']);
    $mobile =mysqli_real_escape_string($con,$_POST['mobile']);
    $experience =mysqli_real_escape_string($con,$_POST['experience']);
    $birthday =mysqli_real_escape_string($con,$_POST['birthdate']);

    $selectUser = "SELECT `name`,`email`  FROM employee WHERE `name` =  '".$name."' AND email = '".$email."' ";
    $userRes = mysqli_query($con, $selectUser);
    var_dump($userRes->num_rows > 0);
    if($userRes->num_rows > 0){
        echo "<script>alert('User already exist!');</script>";
        // die;
    }else{
        $insertQuery = "INSERT INTO `employee`(
            `name`,
            `email`,
            `mobile`,
            `password`,
            `address`,
            `qualification`,
            `experience`,
            `birthday`,
            `role`
        )
        VALUES(
            '".$name."',
            '".$email."',
            '".$mobile."',
            '".$encryptedPassword."',
            '".$address."',
            '".$qualification."',
            '".$experience."',
            '".$birthday."',
            '2'
        )";
        if (mysqli_query($con, $insertQuery)) 
        {
            echo "<script>alert('User registered Successfully!');";
            echo "window.location.href = '/index.php';</script>";
    
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

function encryptPassword($password, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($password, 'aes-256-cbc', $key, 0, $iv);
    $encryptedPassword = base64_encode($iv . $encrypted);   
    return $encryptedPassword;
}

?>

<html>
    <head>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
 <style>    


body {
  margin: 0;
  padding: 0;
  background-color:black;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 50px;
  max-width: 600px;
  height: auto !important;
  border: 1px solid #9C9C9C;
  background-color:#EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
     #msg{
         color:red;
     }
</style>
    </head>
<body>
    <div id="login">
        <h1 class="text-center text-white pt-5"> User Regitration Details</h1>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">                
                    <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="#" method="post">
                            <h3 class="text-center text-info">Register</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="text-info">Mobile:</label><br>
                                <input type="number" name="mobile" id="mobile" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info" >Address:</label><br>
                                <textarea id="address" name="address" rows="4" cols="60" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Quatification:</label><br>
                                <input type="qualification" name="qualification" id="qualification" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Experience:</label><br>
                                <input type="experience" name="experience" id="experience" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Birthdate:</label><br>
                                <input type="date" name="birthdate" id="birthdate" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <br>
                            <div id="register-link" class="text-right">
                                <a href="login.php" class="text-info">Login here</a>
                            </div>
                            
                            <div id="msg" class="text-right">
                            <?php echo $msg ?>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>