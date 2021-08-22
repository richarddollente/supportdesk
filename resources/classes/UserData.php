<?php
class UserData{

    private $connection, $userDataObject;

    public function __construct($connection, $userEmailProfile){

        $this->connection = $connection;
        $this->userDataObject = new User($connection, $userEmailProfile);

    }

}