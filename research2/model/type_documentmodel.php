<?php
    class type_document
    {
        public $ID_Type_Doc ;
        public $Name_Type_Doc;
        
        public function __construct($ID_Type_Doc,$Name_Type_Doc)
        {
            $this->ID_Type_Doc=$ID_Type_Doc;
            $this->Name_Type_Doc=$Name_Type_Doc;
        }
    }
?>