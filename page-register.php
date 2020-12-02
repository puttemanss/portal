<?php
//When register button is pressed
if(isset($_POST["Register_Button"]))
{
    //import
    include_once("db.php");

    //variables
    $V_Firstname = $_POST["signup-firstname"];
    $V_Lastname = $_POST["signup-lastname"];
    $V_Email = $_POST["signup-email"];
    $V_Password = $_POST["signup-password"];
    $V_Password2 = $_POST["signup-password2"];

    //if passwords not match raise error
    if($V_Password != $V_Password2){
		$error_div = '<div class="alert alert-danger alert-dismissible" role="alert">
                            <i class="fa fa-times-circle"></i> Your passwords do not match.
                    </div>';
	}
    else {
        //Session
        session_start();
        $_SESSION['success'] = "";
        //Password Encrypt & Hash Password
        $V_Password = md5($V_Password);
        $V_hash = password_hash($V_Password, PASSWORD_DEFAULT);
        $path = 'assets/images/lg/avatar4.jpg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        // SQL Query
        $sql = "INSERT INTO `users_user`(`User_FirstName`, `User_LastName`, `User_Email`, `User_Password`, `User_Hash`, `User_Active`, `User_Profile_Picture`) VALUES ('$V_Firstname','$V_Lastname','$V_Email','$V_Password','$V_hash','1', '$base64')";

        //Run SQL Query
        if ($conn->query($sql) === TRUE) {
            $V_Url = "page-login.php?page=1&email=$V_Email";
            header("location: $V_Url");
        } else {
            $error_div = '<div class="alert alert-danger alert-dismissible" role="alert">
                                <i class="fa fa-times-circle"></i> There was a problem. Maybe your email is allready in use.
                        </div>';
        }
        
    }
    
    $conn->close();
}
?>
<!doctype html>
<html lang="en">

<head>
<title>Sign Up</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4x Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
</head>

<body class="theme-orange">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                        <img src="assets/images/logo-white.svg" alt="Lucid">
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">Create an account</p>
                        </div>
                        <?php echo $error_div; ?>
                        <div class="body">
                            <form class="form-auth-small" method="POST">
                                <div class="form-group">
                                    <label for="signup-email" class="control-label sr-only">Firstname</label>
                                    <input type="text" class="form-control" id="signup-firstname" name="signup-firstname" placeholder="Your firstname">
                                </div>
                                <div class="form-group">
                                    <label for="signup-email" class="control-label sr-only">Lastname</label>
                                    <input type="text" class="form-control" id="signup-lastname" name="signup-lastname" placeholder="Your lastname">
                                </div>
                                <div class="form-group">
                                    <label for="signup-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control" id="signup-email" name="signup-email" placeholder="Your email">
                                </div>
                                <div class="form-group">
                                    <label for="signup-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" id="signup-password" name="signup-password" placeholder="Password"><br>
                                    <input type="password" class="form-control" id="signup-password" name="signup-password2" placeholder="Repeat Password">
                                </div>
                                <button type="submit" name="Register_Button" class="btn btn-primary btn-lg btn-block">REGISTER</button>
                                <div class="bottom">
                                    <span class="helper-text">Already have an account? <a href="page-login.php">Login</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
