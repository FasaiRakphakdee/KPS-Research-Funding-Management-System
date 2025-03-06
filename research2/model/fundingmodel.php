<?php
class funding
{
    public $ID_Funding;
    public $Cost_Fund;
    public $Name_Funding;
    public $Year_Funding;
    public $Time_Req;
    public $Date_Req;
    public $ID_User;
    public $ID_Co;
    public $ID_Type_Funding;
    public $ID_Type_Doc;
    public $ID_status;


    public function __construct($ID_Funding, $Cost_Fund, $Name_Funding, $Year_Funding, $Time_Req, $Date_Req, $ID_User, $ID_Co, $ID_Type_Funding, $ID_Type_Doc, $ID_status)
    {
        $this->ID_Funding = $ID_Funding;
        $this->Cost_Fund = $Cost_Fund;
        $this->Name_Funding = $Name_Funding;
        $this->Year_Funding = $Year_Funding;
        $this->Time_Req = $Time_Req;
        $this->Date_Req = $Date_Req;
        $this->ID_User = $ID_User;
        $this->ID_Co = $ID_Co;
        $this->ID_Type_Funding = $ID_Type_Funding;
        $this->ID_Type_Doc = $ID_Type_Doc;
        $this->ID_status = $ID_status;
    }
    public static function getByUserID($ID_User)
    {
        require("connection_connect.php");
        $fundingList = [];
        $sql = "select * from funding where ID_User =" . $ID_User;
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID_Funding = $my_row['ID_Funding'];
            $Cost_Fund = $my_row['Cost_Fund'];
            $Name_Funding = $my_row['Name_Funding'];
            $Year_Funding = $my_row['Year_Funding'];
            $Time_Req = $my_row['Time_Req'];
            $Date_Req = $my_row['Date_Req'];
            $ID_User = $my_row['ID_User'];
            $ID_Co = $my_row['ID_Co'];
            $ID_Type_Funding = $my_row['ID_Type_Funding'];
            $ID_Type_Doc = $my_row['ID_Type_Doc'];
            $ID_status = $my_row['ID_status'];
            $fundingList[] = new funding($ID_Funding, $Cost_Fund, $Name_Funding, $Year_Funding, $Time_Req, $Date_Req, $ID_User, $ID_Co, $ID_Type_Funding, $ID_Type_Doc, $ID_status);
        }
        require("connection_close.php");
        return $fundingList;
    }
    public static function create($ID_Funding, $Cost_Fund, $Name_Funding, $Year_Funding, $Time_Req,$Date_Req,$ID_User ,$ID_Co ,$ID_Type_Funding ,$ID_Type_Doc ,$ID_status ,)
    {
        require("connection_connect.php");
        $sql = "insert into funding(ID_Funding,Cost_Fund,Name_Funding,Year_Funding,Time_Req,Date_Req,ID_User,ID_Co,ID_Type_Funding,ID_Type_Doc,ID_status) values 
        ('$ID_Funding','$Cost_Fund',$Name_Funding,$Year_Funding,'$Time_Req','$Date_Req','$ID_User ','$Time_Req','$ID_Co ','$ID_Type_Funding ','$ID_Type_Doc ','$ID_status ')";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "add success $result rows";
    }


}
