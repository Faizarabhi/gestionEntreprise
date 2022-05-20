<?php 



class CustomerController extends Controller {

private $customerModel;

public function __construct()
{
    $this->customerModel = $this->model('Customer');
}
public function check_customer(){
    // die("error mn methode customer hna");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = json_decode(file_get_contents("php://input"),true);

        $result = $this->customerModel->check_customer($data);
        if($result){
            echo json_encode(["message" => "success", "data" => $result]);
        }else{
            echo json_encode(["message" => "error not created"]);
        }
    }
}
    public function add_customer()
    {
        // die("error mn methode customer hna");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $email ="CL-".$data['email'];
            // $result = $this->userModel->newClient([...$data, "id" => $id]);

            $result = $this->customerModel->add_customer([...$data, "email" => $email]);
            if ($result) {
                echo json_encode(["message" => "success", "data" => $result]);
            } else {
                echo json_encode(["message" => "error not created"]);
            }

}







    }









}