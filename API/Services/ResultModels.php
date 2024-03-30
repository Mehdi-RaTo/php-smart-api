<?php

class ResultModels extends APIService
{
    function Run()
    {
        switch (intval($this->params["Model"])) {
            case 1:
                return "Result!";
                break;

            case 2:
                return new Response("Custom Result!", "Good", 1000);
                break;

            default:
                throw new Exception("Parameter 'Model' Required! (Allowed: 1 or 2)", -1001);
                break;
        }
    }
}
