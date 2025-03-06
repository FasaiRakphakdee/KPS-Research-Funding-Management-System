<?php
    class department
    {
        public $ID_Department;
        public $Name_Department;
        
        public function __construct($ID_Department,$Name_Department)
        {
            $this->ID_Department=$ID_Department;
            $this->Name_Department=$Name_Department;
        }
    }
?>