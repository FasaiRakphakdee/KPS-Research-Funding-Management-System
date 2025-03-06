<?php
    class noti_req
    {
        public $ID_Noti_Req;
        public $Status_Req;
        public $Description_Req;
        public $Date_NotiReq;
        public $Time_NotiReq;
        public $ID_User ;

        public function __construct($ID_Noti_Req,$Status_Req,$Description_Req,$Date_NotiReq,$Time_NotiReq,$ID_User)
        {
            $this->ID_Noti_Req=$ID_Noti_Req;
            $this->Status_Req=$Status_Req;
            $this->Description_Req=$Description_Req;
            $this->Date_NotiReq=$Date_NotiReq;
            $this->Time_NotiReq=$Time_NotiReq;
            $this->ID_User =$ID_User ;
        }
        
        
    }
?>