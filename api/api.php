<?php
require_once(__DIR__."/../app.php");

switch($method){
    case "POST":
        $controller = new \Controllers\Campers\InsertCamperController($_POST);
        $controller->response();
        break;    
    default:
        throw new \Exception("Undefined Method");
}

$conn = null;
