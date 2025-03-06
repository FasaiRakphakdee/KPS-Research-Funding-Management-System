<?php
class type_funding
{
    public $ID_Type_Funding;
    public $Name_Type_Funding;

    public function __construct($ID_Type_Funding, $Name_Type_Funding)
    {
        $this->ID_Type_Funding = $ID_Type_Funding;
        $this->Name_Type_Funding = $Name_Type_Funding;
    }
    public static function getAll()
    {
        $type_fundings = [];
        require("connection_connect.php");
        $sql = "select * from type_funding";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID_Type_Funding = $my_row["ID_Type_Funding"];
            $Name_Type_Funding = $my_row["Name_Type_Funding"];
            $type_fundings[] = new type_funding($ID_Type_Funding,$Name_Type_Funding);
        }

        require("connection_close.php");
        return $type_fundings;
    }
}
