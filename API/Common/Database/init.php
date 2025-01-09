<?php

// ===== Init

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    "driver"    => "mysql",
    "host"      => APP_DATABASE_HOST,
    "database"  => APP_DATABASE_NAME,
    "username"  => APP_DATABASE_USERNAME,
    "password"  => APP_DATABASE_PASSWORD,
    "charset"   => "utf8mb4",
    "collation" => "utf8mb4_unicode_ci",
    "prefix"    => ""
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// ===== Models

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    protected $primaryKey = "ID";
    public $incrementing = true;
    public $timestamps = true;
    const CREATED_AT = "CreateDate";
    const UPDATED_AT = "ChangeDate";
}

$pathModels = __DIR__ . "/Models";
$files = glob($pathModels . "/*.php");
foreach ($files as $file) {
    require_once $file;
}
