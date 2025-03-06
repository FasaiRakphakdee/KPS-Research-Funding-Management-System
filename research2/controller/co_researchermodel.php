<?php
    class Co_researcher
    {
        public $ID_Co;
        public $ID_User;
        
        public function __construct($ID_Co,$ID_User)
        {
            $this->ID_Co=$ID_Co;
            $this->ID_User=$ID_User;
        }
    
        public static function getAll($ID_User)
    {
        $co_list = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM co_researcher NATURAL join user WHERE ID_User !=".$ID_User;
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $ID_Co = $my_row["ID_Co"];
            $ID_User = $my_row["ID_User"];
            $co_list[] = new Co_researcher($ID_Co,$ID_User);
        }
        require("connection_close.php");
        return $co_list;
    }
    }
?>