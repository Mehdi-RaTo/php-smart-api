<?php

class Test1 extends APIService
{
    protected $requireParams = ["Page"];

    function Run()
    {
        $dbCon = new Database();

        $Page = intval($this->params["Page"]);
        if ($Page < 1) {
            throw new Exception("Page must be greater than 0", 1001);
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
