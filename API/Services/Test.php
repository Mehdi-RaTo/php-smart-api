<?php

class Test extends APIService
{
    protected $requireParams = ["Page"];

    function Run()
    {
        $dbCon = new Database();

        $Page = 1;
        if (intval($this->params["Page"]) > 1) {
            $Page = intval($this->params["Page"]);
        }
        $Limit = 10;

        $RowFrom = ($Page - 1) * $Limit;

        $TotalRowCount = $dbCon->Query(
            "SELECT COUNT(*) AS COUNT FROM `products`"
        )[0]["COUNT"];

        $Rows = $dbCon->Query(
            "SELECT * FROM `products` LIMIT ?, ?",
            [$RowFrom, $Limit]
        );

        $result = [
            "Page" => $Page,
            "Limit" => $Limit,
            "TotalRowCount" => $TotalRowCount,
            "Rows" => $Rows
        ];

        return $result;
    }
}
