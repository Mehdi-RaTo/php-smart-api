<?php

require_once __DIR__ . "/Common/App.Init.php";

try {
    $params = APIController::Parameters(["ServiceName"]);

    $ServiceName = $params["ServiceName"];
    $Parameters = $params["Parameters"] ?? [];

    $ServicePath = __DIR__ . "/Services/" . $ServiceName . ".php";

    if (!file_exists($ServicePath)) {
        throw new Exception("Service Not Found", 404);
    }

    require_once $ServicePath;

    if (!class_exists($ServiceName)) {
        throw new Exception("Service Provider Not Found", 404);
    }

    $ServiceInstance = new $ServiceName($Parameters);
    $result = $ServiceInstance->Run();

    APIController::Response($result);
} catch (Exception $ex) {
    APIController::Response($ex);
}
