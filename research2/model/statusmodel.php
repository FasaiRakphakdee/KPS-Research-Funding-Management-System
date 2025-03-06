<?php
    class status
    {
        public $ID_Status ;
        public $Name_Status;
        
        public function __construct($ID_Status ,$Name_Status)
        {
            $this->ID_Status =$ID_Status ;
            $this->Name_Status=$Name_Status;
        }

        public static function getByStatusID($ID_Status)
    {
         require("connection_connect.php");
        $statusList = [];
        $sql = "select * from status where ID_Status =" . $ID_Status;
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID_Status = $my_row['ID_Status'];
            $Name_Status = $my_row['Name_Status'];
            $statusList[] = new status($ID_Status,$Name_Status);
        }
        require("connection_close.php");
        return $statusList;
    }
}
    
?>