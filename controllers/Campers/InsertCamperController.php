<?php
namespace Controllers\Campers;
final class InsertCamperController extends \Models\CamperModel{
    public function __construct(){
        $params =  func_get_args();
        $this->insertCamper($params);
    }
    public function response():string{
        return json_encode([
            "status"=>200,
            "message"=>"ok" 
        ]);

    }
}