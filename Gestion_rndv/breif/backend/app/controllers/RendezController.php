<?php
// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

class RendezController extends Controller
{
    private $RendezModel;

    public $data = [];

    public function __construct()
    {
        $this->RendezModel = $this->model('Rendez');
    }


    public function add_rendev(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->RendezModel->addRendez($data);
            
            if($result){
                echo json_encode(["message" => "success", "data" => $result]);
            }else{
                echo json_encode(["message" => "error"]);
            }
        }

    }
    public function getAllRendez(){

            $result = $this->RendezModel->getRendez(); 

            if($result){
                echo json_encode($result);
            }else{
                echo json_encode(["message" => "error"]);
            }
    }

    public function check_rdv(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->RendezModel->Check_Rendez($data);
            
            $date=[];
            $date[0] = "10h à 10:30h";
            $date[1] = "11 h à 11:30h";
            $date[2] = "14 h à 14:30h";
            $date[3] = "15 h à 15:30h";
            $date[4] = "16 h à 16:30h";
            foreach($result as $res){
                if ($res['creneau'] == "10h à 10:30h") {
                    unset($date[0]);
                }
                if ($res['creneau'] == "11 h à 11:30h") {
                    unset($date[1]);
                }
                if ($res['creneau'] == "14 h à 14:30h") {
                    unset($date[2]);
                  }
              
                if ($res['creneau'] == "15 h à 15:30h") {
                    unset($date[3]);
                  }
                if ($res['creneau'] == "16 h à 16:30h") {
                    unset($date[4]);
                  }
            }
                echo json_encode($date);
    }
    }
    public function updateRdv(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"),true);

            if($this->RendezModel->updateRndv($data)){
                echo json_encode(array(
                    "message"=>"done"
                ));
            }else{
                echo json_encode(["message" => "error"]);
            }

        }
    }
    public function delete_rdv(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $id = json_decode(file_get_contents("php://input"), true); 
            $result = $this->RendezModel->delet_rendev($id);
            if($result){
                echo json_encode(["message" => "success","data"=>$id]);
            }else{
                echo json_encode(["message" => "failed"]);
            }
        } 
    }
    

}