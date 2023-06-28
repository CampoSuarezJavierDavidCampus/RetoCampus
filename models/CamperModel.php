<?php
namespace Models;
class CamperModel{
    protected function insertCamper(){
        global $conn;
        $params = func_get_args();
        $SQL =  "INSERT INTO campers (numeroId_camper,nombre_camper,apellido_camper,fechaDeNacimiento_camper,region) VALUES (
            :NumeroDeIdentificacion,
            :Nombre,
            :Apellido,
            :FechaDeNacimiento,
            :Region
        );";
        $conn->setSQL($SQL);
        return $conn->execute($params);        
    }
    protected function serachCamper():array{
        global $conn;        
        $res = [];
        $SQL = "SELECT c.id_camper as id, c.numeroId_camper as cc, c.nombre_camper as nombre, c.apellido_camper as apellido, c.fechaDeNacimiento_camper as fechaNacimiento, c.id_region_camper as regionId, r.nombre_region AS region, p.nombre_pais AS pais FROM campers AS c INNER JOIN regiones r ON r.id_region = c.id_camper INNER JOIN departamentos as d ON r.id_departamento_region = d.id_departamento INNER JOIN paises as p ON p.id_pais = d.id_pais_departamento;";        
        $conn->setSQL($SQL);
        $res["campers"]= $conn->execute(null);         
        $SQL = "SELECT r.id_region as id, r.nombre_region as nombre,p.nombre_pais AS pais FROM regiones AS r INNER JOIN departamentos AS d ON d.id_departamento = r.id_departamento_region INNER JOIN paises AS p ON d.id_pais_departamento = p.id_pais;";
        $conn->setSQL($SQL);
        $res["regiones"]= $conn->execute(null);         
        return $res;
    }
    
}