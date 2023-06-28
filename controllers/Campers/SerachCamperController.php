<?php
namespace Controllers\Campers;
final class SerachCamperController extends \Models\CamperModel{
    private array $res ;
    public function __construct(){        
        $this->res = $this->SerachCamper();
    }
    public function response():string{
        return json_encode([
            "status"=>200,
            "data" => $this->res,
            "message"=>"ok" 
        ]);

    }
}