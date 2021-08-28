<?php
class UserLogin{

    private $connection;
    private $errorArray = array();

    public function __construct($connection){

        $this->connection = $connection;

    }

    public function login($useremail, $userpw, $usertype){

        $userpw = hash("sha512", $userpw);
        
        $query = $this->connection->prepare("SELECT * FROM users where userEmail=:useremail and userPassword=:userpw and userType=:usertype");
        $query->bindParam(":useremail", $useremail);
        $query->bindParam(":userpw", $userpw);
        $query->bindParam(":usertype", $usertype);

        $query->execute();

        if($query->rowCount() == 1){
            return true;
        }
        else{
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }

    }

    public function getError($error) {

        if(in_array($error, $this->errorArray)) {
            return "<span class='error-message'>$error</span>";
        }

    }
}
?>