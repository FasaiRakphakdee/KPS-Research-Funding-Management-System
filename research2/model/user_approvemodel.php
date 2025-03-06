<?php
    class user_approve
    {
        public $ID_UserApp;
        public $ID_user;
        public $Level_App;

        public function __construct($ID_UserApp,$ID_user,$Level_App)
        {
            $this->ID_UserApp=$ID_UserApp;
            $this->ID_user=$ID_user;
            $this->Level_App=$Level_App;
        }
    }
?>