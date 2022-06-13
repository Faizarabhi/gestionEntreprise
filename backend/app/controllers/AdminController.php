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

    if ($this->isPostRequest()) {
      $data = $this->getBody();


      $result = $this->adminModel->checkAdmin($data);

      if ($result) {
        return $this->json(["message" => "success", "data" => $result]);
      } else {
        // die("error mn hna");
        return $this->json(["message" => "error not created"]);
      }
    }
  }
}
