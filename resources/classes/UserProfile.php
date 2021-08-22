<?php

    require_once("UserData.php");

class UserProfile{

    private $connection, $userLoggedInObject, $userEmailProfile;

    public function __construct($connection, $userLoggedInObj, $userEmailProfile){

        $this->connection = $connection;
        $this->userLoggedInObject = $userLoggedInObject;
        $this->userData = new UserData($connection, $userEmailProfile);

    }

    public function create(){
        $userEmailProfile = $this->profileData->getUserEmailProfile();

        if(!$this->userData->userExists()){
            return "User does not exist";
        }

        $headerSection = $this->createHeaderSection();
        $tabsSection = $this->createTabsSection();
        $contentSection = $this->createContentSection();

        return "<div class='profileContaner'>
                    $headerSection
                    $tabsSection
                    $contentSection
                </div>";

    }

    public function createHeaderSection(){

        $userFullName = $this->UserData->getUserDataFullName();

    }



}