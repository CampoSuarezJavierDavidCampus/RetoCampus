<?php
use Config\Connection;
return function(Connection &$connection){
    $db = "campuslands";
    $connection->addDBConfig(
        "campuslands",        
    ["mysql:host=localhost;dbname=$db;","campus","campus2023"]);
};