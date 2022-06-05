<?php

class AdminController extends Controller
{
  // public $data = [];
  private $adminModel;
  
  public function __construct()
  {
    // die("hello from admin controller");
    $this->adminModel = $this->model('Admin');
  }
  public function check_admin()
  {       
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $data = json_decode(file_get_contents("php://input"), true);
          
          
            $result = $this->adminModel->checkAdmin($data);
            
            if($result){
                echo json_encode(["message" => "success", "data" => $result]);
            }else{
              // die("error mn hna");
                echo json_encode(["message" => "error not created"]);
            }
        }
    }
  }