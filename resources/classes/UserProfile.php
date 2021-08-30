<?php

    require_once("resources/classes/UserData.php");

class UserProfile{

    private $connection, $userLoggedInObject, $userEmailProfile;

    public function __construct($connection, $userLoggedInObject, $userEmailProfile){

        $this->connection = $connection;
        $this->userLoggedInObject = $userLoggedInObject;
        $this->userData = new UserData($connection, $userEmailProfile);

    }

    public function create(){
        $userEmailProfile = $this->userData->getUserDataEmail();

        if(!$this->userData->userExists()){
            return "User does not exist";
        }

        $headerSection = $this->createHeaderSection();
        $tabsSection = $this->createTabsSection();
        $contentSection = $this->createContentSection();

        return "<div class='profile-contaner'>
                    $headerSection
                    $tabsSection
                    $contentSection
                </div>";

    }

    public function createHeaderSection(){

        $userFullName = $this->userData->getUserDataFullName();
        
        $button = $this->createHeaderButton();

        return "<div class='user-profile-header'>
                    <div class='userdata-container'>
                        <div class='userdata'>
                            <span class='usertitle'>$userFullName</span>
                        </div>
                    </div>
                
                    <div class='button-container'>
                        <div class='button-item'>
                            $button
                        </div>
                    </div>
                </div>";

    }

    public function createTabsSection(){

        return "<ul class='nav nav-tabs' role='tablist'>
                    <li class='nav-item'>
                        <a class='nav-link' id='about-tab' data-toggle='tab' href='#about' role='tab' aria-controls='about' aria-selected='false'>ABOUT</a>
                    </li>
                </ul>";

    }

    public function createContentSection(){

        $aboutSection = $this->createAboutSection();

        return "<div class='tab-content aboutUser'>
                    <div class='tab-pane fade show active' id='about' role='tabpanel' aria-labelledby='about-tab'>
                        $aboutSection
                    </div>
                <div>";

    }

    private function createHeaderButton(){

        if($this->userLoggedInObject->getUserEmail() ==$this->userData->getUserDataEmail()){

            return "";

        }

    }

    private function createAboutSection(){

        $html = "<div class='section'>
                    <div class='title'>
                        <span>Details</span>
                    </div>
                    <div class='values'>";
        
        $details = $this->userData->getAllUserData();
        foreach($details as $key=> $value){
            $html .= "<span>$key: $value</span>";
        }

        $html .= "</div></div>";

        return $html;

    }

}
?>