<?php
    class noti_app
    {
        public $ID_Noti_App;
        public $Status_App;
        public $Descriptiom;
        public $Date_NotiApp;
        public $Time_NotiApp;
        public $ID_User ;

        public function __construct($ID_Noti_App,$Status_App,$Descriptiom,$Date_NotiApp,$Time_NotiApp,$ID_User)
        {
            $this->ID_Noti_App=$ID_Noti_App;
            $this->Status_App=$Status_App;
            $this->Descriptiom=$Descriptiom;
            $this->Date_NotiApp=$Date_NotiApp;
            $this->Time_NotiApp=$Time_NotiApp;
            $this->ID_User =$ID_User ;
        }
        
        
    }
?>