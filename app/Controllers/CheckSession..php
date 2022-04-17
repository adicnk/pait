<?php
class CheckSession
{
    public function __construct()
    {
        session_start();
    }
    public function check_session()
    {
        //Below last_visited should be updated everytime a page is accessed.
        $lastVisitTime = $this->session->userdata("last_visited");
        $fiveMinutesBefore = date("YmdHi", "-5 minutes");

        echo date("YmdHi", strtotime($lastVisitTime)) > $fiveMinutesBefore > 1;
    }
}
