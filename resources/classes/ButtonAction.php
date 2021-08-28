<?php
class ButtonAction{

    public static $logInFunction = "notLoggedIn()";

    public static function createUserProfileButton($connection, $userEmail){

        $userObject = new UserAccount($connection, $userEmail);
        $link = "profile.php?userEmail=$userEmail";

        return "<a href='$link'><button class='face'><i class='material-icons'>face</i></button></a>";

    }

    public static function createUserProfileNavButton($connection, $userEmail){

        if(UserAccount::isLoggedIn()){

            return ButtonAction::createUserProfileButton($connection, $userEmail);

        }
        else{

            return "<a href='login.php'><span class='material-icons-outlined'>login</span></a>";                     
            
        }

    }

}