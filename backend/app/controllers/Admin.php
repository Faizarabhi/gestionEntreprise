<?php

class Admin extends Controller
{
  // public $data = [];
  private $adminModel;
  
  public function __construct()
  {
    $this->adminModel = $this->model('Admin');
  }
  public function check_admin()
  {
    die("hello from admin controller");
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->adminModel->checkAdmin($data);
            

            if($result){
                echo json_encode(["message" => "success", "data" => $result]);
            }else{
                echo json_encode(["message" => "error not created"]);
            }
        }
    }
  }