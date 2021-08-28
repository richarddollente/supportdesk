<?php
class UserAccount{

    private $connection, $queryData;

    public function __construct($connection, $userEmail){

        $this->connection = $connection;
        $query = $this->connection->prepare("SELECT * FROM users where userEmail=:useremail");
        $query->bindParam(":useremail", $userEmail);
        $query->execute();

        $this->queryData = $query->fetch(PDO::FETCH_ASSOC);

    }

    public static function isLoggedIn(){

        return isset($_SESSION["userLoggedIn"]);

    }

    public function getUserEmail(){

        return $this->queryData["userEmail"];

    }

    public function getUserFirstname(){

        return $this->queryData["userFirstname"];

    }

    public function getUserLastname(){

        return $this->queryData["userLastname"];

    }

    public function getUserFullname(){

        return $this->queryData["userFirstname"] . " " . $this->queryData["userLastname"];

    }

    public function getUserType(){

        return $this->queryData["userType"];

    }

    public function getUserSchool(){

        return $this->queryData["userSchool"];
        
    }

    public function getUserPhone(){

        return $this->queryData["userPhone"];

    }

    public function getUserAddress(){

        return $this->queryData["userAddress"];

    }





}
?>