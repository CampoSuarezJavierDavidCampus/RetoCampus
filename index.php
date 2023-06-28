<?php
require_once("./app.php");
$controller = new \Controllers\Campers\SerachCamperController();
$res = json_decode($controller->response());
var_dump($res);

echo <<<HTML
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="JS/main.js" type="module" defer></script>
</head>
<body>
    <h1>Campers</h1>
    <form id="RegisterCamper">
        <label>
            <span>Numero de Identificacion</span>
            <input type="text" id="NumeroDeIdentificacion" name="NumeroDeIdentificacion">
        </label>
        <label>
            <span>Nombre</span>
            <input type="text" id="Nombre" name="Nombre">
        </label>
        <label>
            <span>Apellido</span>
            <input type="text" id="Apellido" name="Apellido">
        </label>
        <label>
            <span>Fecha de Nacimiento</span>
            <input type="date" id="FechaDeNacimiento" name="FechaDeNacimiento">
        </label>
        <label>
            <select>
HTML;
foreach ($res["regiones"]["data"] as $regions) {    
    echo <<<HTML
        <option id="$regions->id">$regions->nombre - $regions->pais</option>
    HTML;
}
            
echo <<<HTML
        </select>
        </label>
                <button type="submit">Enviar</button>
            </form>
            <table id="ShowData">
                <thead>
                    <tr>
                        <th>Numero de Identificacion</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Region</th>
                        <th>Pais</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
            
        </body>
        </html>
HTML;