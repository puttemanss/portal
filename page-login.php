<?php

$error_div = "";
$G_Email = "";

//GET
if($_GET["page"] == 1)
{
    $G_Email = $_GET["email"];
}
else if($_GET["page"] == "2-1")
{
    $error_div = '';
}
else if($_GET["page"] == "2-2")
{
    $error_div = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-times-circle"></i> Your account is not confirmed. Please see your mail.</div>';
}
else if($_GET["page"] == "3")
{   
    session_start();
    // remove all session variables
    session_unset();
    // destroy the session
    session_destroy();
    $error_div = '<div class="alert alert-info alert-dismissible" role="alert"><i class="fa fa-info-circle"></i> You have successfully logged out.</div>';
}
else if($_GET["page"] == "4")
{   
    session_start();
    // remove all session variables
    session_unset();
    // destroy the session
    session_destroy();
    $error_div = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-times-circle"></i>Your account has been deleted. Ask your superior for more information.</div>';
}
else{
    $G_Email = "user@domain.com";
}

session_start();
//When login button is pressed
if(isset($_POST["Login_Button"]))
{
    //import
    include_once("db.php");

    //variables
    $V_Email = $_POST["signin-email"];
    $V_Password = $_POST["signin-password"];
    $V_Password = md5($V_Password);

    //SQL Query
    $sql = "SELECT * FROM users_user WHERE User_Email = '$V_Email' AND User_Password = '$V_Password'";
    $result = $conn->query($sql);

    //RUN SQL Query
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['S_User_UserID'] = $row['User_UserID'];
            $V_User_UserID = $row['User_UserID'];
            $_SESSION['S_User_FirstName'] = $row['User_FirstName'];
            $_SESSION['S_User_LastName'] = $row['User_LastName'];
            $_SESSION['S_User_Name'] = $row['User_FirstName'] . " " . $row['User_LastName'];
            $_SESSION['S_User_Email'] = $row['User_Email'];
            $_SESSION['S_User_Hash'] = $row['User_Hash'];
            $_SESSION['S_User_Profile_Picture'] = $row['User_Profile_Picture'];
            $_SESSION['S_User_Active'] = $row['User_Active'];
            $V_User_Active = $row['User_Active'];
            $_SESSION['S_User_Role'] = $row['User_RoleID'];
            if($V_User_Active == 1){
                $_SESSION['S_Session_Active'] = "True";
                header("location: index.php");
            }
            else{
                $_SESSION['S_Session_Active'] = "False";
                $error_div = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-times-circle"></i> Your account is not confirmed. Please see your mail.</div>';
            }
        }
    } 
    else {
        $error_div = '<div class="alert alert-danger alert-dismissible" role="alert">
                            <i class="fa fa-times-circle"></i> Your email and password does not match.
                    </div>';
    }
    $conn->close();
}
?>

<!doctype html>
<html lang="en">

<head>
<title>Login Page</title>
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
                            <p class="lead">Login to your account</p>
                        </div>
                        <?= $error_div; ?>
                        <div class="body">
                            <form class="form-auth-small" action="page-login.php" method="POST">
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control" id="signin-email" name="signin-email" value="<?= $G_Email;?>" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" id="signin-password" name="signin-password" value="" placeholder="Password">
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>								
                                </div>
                                <button type="submit" name="Login_Button" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.php">Forgot password?</a></span>
                                    <span>Don't have an account? <a href="page-register.php">Register</a></span>
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
