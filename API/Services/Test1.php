<?php

class Test1 extends APIService
{
    function Run()
    {
        $UserID = $this->params["UserID"];
        $result = User::find($UserID);
        return $result;
    }
}
