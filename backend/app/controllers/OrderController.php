<?php
class OrderController extends Controller
{
    private $orderModel;
    public function __construct()
    {
        $this->orderModel = $this->model('Order');
    }
    public function check_order()
    {
        if ($this->isPostRequest()) {
            $data = $this->getBody();

            $result = $this->orderModel->check_order($data);
            if ($result) {
                echo json_encode(["message" => "success", "data" => $result]);
            } else {
                echo json_encode(["message" => "error not created"]);
            }
        }
    }
    public function getAll_order()
    {
        $result = $this->orderModel->getAll_order();
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(["message" => "error not select"]);
        }
    }
    public function get_order()
    {
        $id = $this->getBody();
        $result = $this->orderModel->get_order($id);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(["message" => "error not select"]);
        }
    }
    public function add_order()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->getBody();

            // $result = $this->userModel->newClient([...$data, "id" => $id]);
            $result = $this->orderModel->add_order($data);
            // die($result);
            if ($result) {
                echo json_encode(["message" => "success", "data" => $result]);
            } else {
                echo json_encode(["message" => "error not created"]);
            }
        }
    }
    public function update_order()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->getBody();

            // print_r($data);


            if ($this->orderModel->update_order($data)) {
                echo json_encode(array(
                    "message" => "done"
                ));
            } else {
                echo json_encode(["message" => "error"]);
            }
        }
    }
    public function delete_order()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $this->getBody();
            $result = $this->orderModel->delete_order($id);
            if ($result) {
                echo json_encode(["message" => "success", "data" => $id]);
            } else {
                echo json_encode(["message" => "failed"]);
            }
        }
    }
}
