<?php

    require_once("resources/navigation.php");
    require_once("resources/classes/UserLogin.php");
    require_once("resources/classes/Constants.php");
    require_once("resources/classes/FormSanitizer.php");

    $userlogin = new UserLogin($connection);

    if(isset($_POST["loginSubmit"])) {

        $userEmail = FormSanitizer::sanitizeFormUserEmail($_POST["userEmail"]);
        $userPassword = FormSanitizer::sanitizeFormUserPassword($_POST["userPassword"]);
        $userType = FormSanitizer::sanitizeFormUserType($_POST["userType"]);

        $isSuccessful = $userlogin->login($userEmail, $userPassword, $userType);

        if($isSuccessful){
            $_SESSION["userLoggedIn"] = $userEmail;
            $_SESSION["userType"] = $userType;
            header("location: profile.php?userEmail=" . $userEmail);
        }
    }

    function getInputValue($user){
        if(isset($_POST[$user])){
            echo $_POST[$user];
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
        <link href="design/style.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>Login | Supportdesk</title>
    </head>
<body>
    <div class="login-container">
        <div class="column">
            <div class="header">
                <img src="" title="logo" alt="Site Logo">
                <h3>Login</h3>
                <span>to continue to Support Portal</span>
            </div>
            <div class="login-form">
                <form action="login.php" method="POST">
                    <?php echo $userlogin->getError(Constants::$loginFailed); ?>
                    <input type="email" name="userEmail" placeholder="Email" value="" required>
                    <input type="password" name="userPassword" placeholder="Password" required>
                    <select class=usertype name="userType" placeholder="Role" required >
                        <option value="User">User</option>
                        <option value="Administrator">Administrator</option>
                </select>
                    <input type="submit" name="loginSubmit" value="LOGIN">
                </form>
            </div>
        <a class="register-message" href="register.php">Register</a>
        <br>
        <a class="forgotPW-message" href="forgot-password.php">Forgot Password</a>
        </div>
    </div>
<?php
    include("resources/chatbox.php");
?>
    </body>
</html>
