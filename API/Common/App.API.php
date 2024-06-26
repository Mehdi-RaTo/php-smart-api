<?php

/**
 * @author  Mehdi_RaTo (https://t.me/Mehdi_RaTo)
 */
function CheckRequiredParameters($params, $requireParams)
{
    foreach ($requireParams as $key) {
        if (!isset($params[$key])) {
            if (IS_DEBUG) {
                throw new Exception("Bad Request (Parameter '$key' Required.)", 400);
            } else {
                throw new Exception("Bad Request", 400);
            }
        }
    }
}

/**
 * @author  Mehdi_RaTo (https://t.me/Mehdi_RaTo)
 */
class Response
{
    public $StatusCode;
    public $Message;
    public $Result;

    public function __construct($Result = [], $Message = "OK", $StatusCode = 200)
    {
        $this->Result = $Result;
        $this->Message = $Message;
        $this->StatusCode = $StatusCode;
    }
}

/**
 * @author  Mehdi_RaTo (https://t.me/Mehdi_RaTo)
 */
class APIService
{
    protected $params = [];
    protected $requireParams = [];

    public function __construct($params = [])
    {
        CheckRequiredParameters($params, $this->requireParams);

        if (!method_exists($this, "Run")) {
            throw new Exception("Service Runner Not Found", 404);
        }

        $this->params = $params;
    }
}

/**
 * @author  Mehdi_RaTo (https://t.me/Mehdi_RaTo)
 */
class APIController
{
    public static function Parameters($requireParams = [])
    {
        $params = json_decode(file_get_contents("php://input"), true);
        CheckRequiredParameters($params, $requireParams);
        return $params;
    }

    public static function Response($Result = [], $Message = "OK", $StatusCode = 200)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=utf-8");

        if ($Result instanceof Exception) {
            echo json_encode([
                "IsSuccess" => false,
                "StatusCode" => $Result->getCode(),
                "Message" => $Result->getMessage(),
                "Result" => []
            ]);
        } else {
            if ($Result instanceof Response) {
                echo json_encode([
                    "IsSuccess" => true,
                    "StatusCode" => $Result->StatusCode,
                    "Message" => $Result->Message,
                    "Result" => $Result->Result
                ]);
            } else {
                echo json_encode([
                    "IsSuccess" => true,
                    "StatusCode" => $StatusCode,
                    "Message" => $Message,
                    "Result" => $Result
                ]);
            }
        }
    }
}
