<?php
// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

class AdminController extends Controller
{
    // public $data = [];
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }
    public function check_admin()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->adminModel->checkAdminByID(strtoupper($data["id"]));
            

            if($result){
                echo json_encode(["message" => "success", "data" => $result]);
            }else{
                echo json_encode(["message" => "error not created"]);
            }
        }
    }
    public function updateinfo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"),true);

            if($this->adminModel->updateInfo($data)){
                echo json_encode(array(
                    "message"=>"done"
                ));
            }else{
                echo json_encode(["message" => "error"]);
            }

        }
    }

    
}
