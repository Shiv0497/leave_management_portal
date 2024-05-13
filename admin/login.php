<?php
include_once("connection.php");
$msg="";
if(isset ($_POST['email']) && ($_POST['password']))
{
    $key = "ThisIsASecretKey123"; // Encryption key (should be kept secret)
 $email=mysqli_real_escape_string($con,$_POST['email']);
 $password=mysqli_real_escape_string($con,$_POST['password']);
 $decryptedPassword = decryptPassword($encryptedPassword, $key);    
$query= "select * from employee where email='$email' and password ='$decryptedPassword'";
$result_set=mysqli_query($con,$query);
    $count=mysqli_num_rows($result_set);
    if($count>0){
     $row=mysqli_fetch_assoc($result_set);
        $_SESSION['ROLE']=$row['role'];
        $_SESSION['USER_ID']=$row['id'];
        $_SESSION['USER_NAME']=$row['name'];
      header('location:index.php');
        die();
         }
    else{
        // $msg= "*please enter correct login details";
        // echo  "<script>setInterval(function() 
        //                 {
        //                     var element = document.getElementById('msg');
        //                     if (element) {
        //                         element.textContent = 'xyz';
        //                     } else {
        //                         console.log('Element with ID not found.');
        //                     }
        //                 }, 3000); 
        //     </script>";        

            echo '<script>document.getElementById("msg").style.display = "block";
            setTimeout(function() {
              document.getElementById("msg").style.display = "none";
            }, 3000);</script>';
        
    }
}

function decryptPassword($encryptedPassword, $key) {
    $encryptedPassword = base64_decode($encryptedPassword);
    $iv = substr($encryptedPassword, 0, 16);
    $encrypted = substr($encryptedPassword, 16);
    $password = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);    
    return $password;
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
  height: 320px;
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
        <h1 class="text-center text-white pt-5">LOGIN DETAILS</h1>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">                
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="#" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div id="msg" class="text-center" style="display:none;">
                                <h5>Credentials Invalid</h5>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">EMAIL ADDRESS:</label><br>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="register.php" class="text-info">Register here</a>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>