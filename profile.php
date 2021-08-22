<?php
    
    require_once("resources/header.php");
    require_once("resources/UserProfile.php");

    if(isset($_GET["userEmail"])){
        $userEmailProfile = $_GET["userEmail"];
    }
    else{
        echo "User not found";
        exit();
    }

    $userprofile = new UserProfile($connection, $userLoggedInObject, $userEmailProfile);
    echo $userprofile->create();

?>