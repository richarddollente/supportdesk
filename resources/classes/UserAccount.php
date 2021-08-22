<?php
class UserAccount{

    private $connection, $queryData;

    public function __construct($connection, $userEmail){

        $this->connection = $connection
        $this = $this->connection->prepare("SELECT * FROM users where userEmail=:userem");
        $query->bindParam(":userem", $userEmail);
        $query->execute();

        $this->queryData = $query->fetch(PDO::FETCH_ASSOC);

    }

    public static function isLoggedIn(){

        return isset($_SESSION["userLoggedIn"]);

    }

    public function getUserEmail(){

        return $this->sqldata["userEmail"];

    }

    public function getUserFirstname(){

        return $this->sqldata["userFirstname"];

    }

    public function getUserLastname(){

        return $this->sqldata["userLastname"];

    }

    public function getUserFullname(){

        return $this->sqldata["userFirstname"] . " " . $this->sqldata["userLastname"];

    }

    public function getUserType(){

        return $this->sqldata["userType"];
    }



}