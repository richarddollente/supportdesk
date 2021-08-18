<?php

    require_once("resources/navigation.php");
    require_once("resources/classes/UserAccounts.php");
    require_once("resources/classes/Constants.php");
    require_once("resources/classes/FormSanitizer.php");

    $useraccount = new UserAccounts($connection);

    if(isset($_POST["loginSubmit"])) {

        $userEmail = FormSanitizer::sanitizeFormUserEmail($_POST["userEmail"]);
        $userPassword = FormSanitizer::sanitizeFormUserPassword($_POST["userPassword"]);

        $isSuccessful = $useraccount->login($userEmail, $userPassword);

        if($isSuccessful){
            $_SESSION["userLoggedIn"] = $userEmail;
            header("location: profile.php");
        }
    }

    function getInputValue($user){
        if(isset($_POST[$user])){
            echo $_POST[$user];
        }
    }

?>
<?php
    include("resources/header.php");
?>
<body>
    <div class="login-container">
        <div class="column">
            <div class="header">
                <img src="" alt="Site Logo">
                <h3>Login</h3>
                <span>to continue to Support Portal</span>
            </div>
            <div class="loginForm">
                <form action="login.php" method="POST">
                    <?php echo $useraccount->getError(Constants::$loginFailed); ?>
                    <input type="email" name="userEmail" placeholder="Email" value="" required>
                    <input type="password" name="userPassword" placeholder="Password" required>
                    <input type="submit" name="loginSubmit" value="LOGIN">
                </form>
            </div>
        <a class="registerMessage" href="register.php">Register</a>
        <br>
        <a class="forgotPWMessage" href="forgot-password.php">Forgot Password</a>
        </div>
    </div>
<?php
    include("resources/chatbox.php");
?>
<?php
    include("resources/footer.php");
?>
