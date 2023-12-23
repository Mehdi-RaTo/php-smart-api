<?php

class Test2 extends APIService
{
    protected $requireParams = ["FirstName", "LastName"]; // array of required params

    function Run()
    {
        $firstName = $this->params["FirstName"];        // required param
        $midName = $this->params["MidName"] ?? "";      // optional param
        $lastName = $this->params["LastName"];          // required param

        $result = "Your name is $firstName $midName $lastName";

        return $result;
    }
}
