<?php
    class user
    {
        public $ID_User;
        public $Rank;
        public $FName_User;
        public $LName_User;
        public $Role;
        public $Faculty;
        public $ID_Department;
        
        


        public function __construct($ID_User,$Rank,$FName_User,$LName_User,$Role,$Faculty,$ID_Department)
        {
            $this->ID_User=$ID_User;
            $this->Rank=$Rank;
            $this->FName_User=$FName_User;
            $this->LName_User=$LName_User;
            $this->Role=$Role;
            $this->Faculty=$Faculty;
            $this->ID_Department=$ID_Department;
            
        }
        public static function getByUserName($UserName)
        {
            require("connection_connect.php");
            $sql="select * from user where UserName = '".$UserName."'";
            $result=$conn->query($sql);
            $my_row=$result->fetch_assoc();
            $ID_User=$my_row['ID_User'];
            $Rank=$my_row['Rank'];
            $FName_User=$my_row['FName_User'];
            $LName_User=$my_row['LName_User'];
            $Role=$my_row['Role'];
            $Faculty=$my_row['Faculty'];
            $ID_Department =$my_row['ID_Department'];
            $UserName=$my_row['UserName'];
            require("connection_close.php");

            return new User($ID_User,$Rank,$FName_User,$LName_User,$Role,$Faculty,$ID_Department,$UserName);
        }
        public static function getByUserID($ID_User)
        {
            require("connection_connect.php");
            $sql="select * from user where ID_User = '".$ID_User."'";
            $result=$conn->query($sql);
            $my_row=$result->fetch_assoc();
            $ID_User=$my_row['ID_User'];
            $Rank=$my_row['Rank'];
            $FName_User=$my_row['FName_User'];
            $LName_User=$my_row['LName_User'];
            $Role=$my_row['Role'];
            $Faculty=$my_row['Faculty'];
            $ID_Department =$my_row['ID_Department'];
            $UserName=$my_row['UserName'];
            require("connection_close.php");

            return new User($ID_User,$Rank,$FName_User,$LName_User,$Role,$Faculty,$ID_Department,$UserName);
        }
    }
?>