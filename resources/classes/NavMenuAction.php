<?php
class NavMenuAction{

    private $connection, $userLoggedInObject;

    public function __construct($connection, $userLoggedInObject){

        $this->connection = $connection;
        $this->userLoggedInObject = $userLoggedInObject;
        
    }

    public function create(){

        if(UserAccount::isLoggedIn()){

            $menuHTML = $this->createNavItem("Settings", "settings.php");
            $menuHTML .= $this->createNavItem("Logout", "logout.php");
        
        }

        return "<div class='navigationItems'>
                    $menuHTML
                </div>";

    }

    private function createNavItem($text,$link){

        return "<div class='navigationItem'>
                    <a href='$link'>
                        <span>$text</span>
                    </a>
                </div>";        

    }

}
?>