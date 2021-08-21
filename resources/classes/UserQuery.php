<?php
class UserQuery{

    private $connection, $queryData;

    public function __construct($connection, $useremail){

        $this->connection = $connection
        $this = $this->connection->prepare("SELECT * FROM users where userEmail=:userem")

    }

}