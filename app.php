<?php
require_once("./vendor/autoload.php");
$conn = Config\Connection::getConnection("campuslands");
$method = $_SERVER['REQUEST_METHOD'];