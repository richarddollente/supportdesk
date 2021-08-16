<?php
        include("resources/header.php");
        require_once("resources/navigation.php");
        
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
                    <input type="text" name="userEmail" placeholder="Email" value="" required>
                    <input type="password" name="userPassword" placeholder="Password" required>
                    <input type="submit" name="loginSubmit" value="LOGIN">
                </form>
            </div>
        <a class="registerMessage" href="register.php">Register</a>
        <a class="forgotPWMessage" href="forgot-password.php">Forgot Password</a>
        </div>
    </div>
<?php
    include("resources/chatbox.php");
?>
<?php
    include("resources/footer.php");
?>
