<?php
class UserData{

    private $connection, $userDataObject;

    public function __construct($connection, $userEmailProfile){

        $this->connection = $connection;
        $this->userDataObject = new UserAccount($connection, $userEmailProfile);

    }

    public function getUserDataObject(){

        return $this->userDataObject;

    }

    public function getUserDataEmail(){

        return $this->userDataObject->getUserEmail();

    }

    public function getUserDataFullName(){

        return $this->userDataObject->getUserFullname();

    }

    public function getUserDataType(){

        return $this->userDataObject->getUserType();

    }

    public function getUserDataSchool(){

        return $this->userDataObject->getUserSchool();

    }

    public function getUserDataPhone(){

        return $this->userDataObject->getUserPhone();

    }

    public function getUserDataAddress(){

        return $this->userDataObject->getUserAddress();

    }

    public function userExists(){

        $query = $this->connection->prepare("SELECT * FROM users where userEmail=:userem");
        $query->bindParam(":userem", $userEmailProfile);
        $userEmailProfile = $this->getUserDataEmail();
        $query->execute();

        return $query->rowCount() != 0;

    }

    public function getAllUserData(){

        return array(
            "Name" => $this->getUserDataFullName(),
            "Email" => $this->getUserDataEmail(),
            "User Type" => $this->getUserDataType(),
            "School" => $this->getUserDataSchool(),
            "Phone" => $this->getUserDataPhone(),
            "Address" => $this->getUserDataAddress()
        );

    }

}
?>