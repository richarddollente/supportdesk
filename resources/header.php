<?php
    
    require_once("resources/navigation.php");
    require_once("resources/classes/ButtonAction.php");
    require_once("resources/classes/UserAccount.php");
    require_once("resources/classes/NavMenuAction.php");

    $userEmailLoggedIn = UserAccount::isLoggedIn() ? $_SESSION["userLoggedIn"] : "";
    $userLoggedInObject = new UserAccount($connection, $userEmailLoggedIn);

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
        <script src="resources/javascript/commonActions.js"></script>

        <title>User | Supportdesk</title>
    </head>
    <body>
    <?php
    
    require_once("resources/chatbox.php");

    ?>
        <div id="page-container">
            <div id="head-container">
                
                <button class="nav-show-hide"><i class="material-icons">menu</i></button>

                <a class="logo-container" href="profile.php?userEmail=<?php echo $_SESSION['userLoggedIn']?>">
                    <img src="" title="logo" alt="Site Logo">
                </a>

                <div class="search-bar-container">
                    <form action="search.php" method="GET">
                        <input type="text" class="search-bar" name="term" placeholder="Search...">
                        <button class="search-button"><i class="material-icons">search</i></button>
                    </form>
                </div>

                <div class="right-icons">
                    <?php echo ButtonAction::createUserProfileNavButton($connection, $userLoggedInObject->getUserEmail());?>
                </div>

            </div>

        <div id="side-nav-container" style="display: none;">
            <?php
                $navigationAction = new NavMenuAction($connection, $userLoggedInObject);
                echo $navigationAction->create();
            ?>
        </div>

        <div id="main-section-container">
            <div id="main-content-container">



                


        