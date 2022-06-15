<?php


class CustomerController extends Controller
{

    private $customerModel;

    public function __construct()
    {
        $this->customerModel = $this->model('Customer');
    }

    public function check_customer()
    {
        // die("error mn methode customer hna");
        if ($this->isPostRequest()) {
            $data = $this->getBody();

            $result = $this->customerModel->check_customer($data);
            if ($result) {
                return $this->json(["message" => "success", "data" => $result]);
            } else {
                return $this->json(["message" => "error not find"]);
            }
        }
    }

    public function getAll_customer()
    {


        $result = $this->customerModel->getAll_customer();
        if ($result) {
            return $this->json($result);
        } else {
            return $this->json(["message" => "error not select"]);
        }
        // http://localhost/filrouge/backend/public/CustomerController/getAll_customer
    }
    public function get_customerDate()
    {


        $result = $this->customerModel->get_customerDate();
        if ($result) {
            return $this->json($result);
        } else {
            return $this->json(["message" => "error not select"]);
        }
        // http://localhost/filrouge/backend/public/CustomerController/getAll_customer
    }

    public function get_customer()
    {

        $id = $this->getBody();
        $result = $this->customerModel->get_customer($id);
        if ($result) {
            return $this->json($result);
        } else {
            return $this->json(["message" => "error not select"]);
        }
        // http://localhost/filrouge/backend/public/CustomerController/get_customer
    }

    public function add_customer()
    {
        if ($this->isPostRequest()) {
            //            $data = $this->getBody();
            $data = $this->getBody();
            $email = "CL-" . $data['email'];
            $password = password_hash($data['password'], PASSWORD_DEFAULT);

            $result = $this->customerModel->add_customer([...$data, "email" => $email, "password" => $password]);
            if ($result) {
                return $this->json(["message" => "success", "data" => $result]);
            }
            return $this->json(["message" => "error not created"]);
        }
    }


    public function update_customer()
    {
        if ($this->isPostRequest()) {
            $data = $this->getBody();

            // print_r($data);
            // http://localhost/filrouge/backend/public/CustomerController/update_customer

            if ($this->customerModel->update_customer($data)) {
                echo json_encode(array(
                    "message" => "done"
                ));
            } else {
                return $this->json(["message" => "error"]);
            }
        }
    }

    public function delete_customer()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

            $id = $this->getBody();
            $result = $this->customerModel->delete_customer($id);
            if ($result) {
                return $this->json(["message" => "success Delete", "data" => $id]);
            } else {
                return $this->json(["message" => "failed"]);
            }
        }
        // http://localhost/filrouge/backend/public/CustomerController/delete_customer
    }
}
