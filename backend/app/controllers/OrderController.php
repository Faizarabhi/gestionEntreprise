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
                return $this->json(["message" => "success", "data" => $result]);
            } else {
                return $this->json(["message" => "error not created"]);
            }
        }
    }
    public function getAll_order()
    {
        $result = $this->orderModel->getAll_order();
        if ($result) {
            return $this->json($result);
        } else {
            return $this->json(["message" => "error not select"]);
        }
    }
    public function get_order()
    {
        $id = $this->getBody();
        $result = $this->orderModel->get_order($id);
        if ($result) {
            return $this->json($result);
        } else {
            return $this->json(["message" => "error not select"]);
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
                return $this->json(["message" => "success", "data" => $result]);
            } else {
                return $this->json(["message" => "error not created"]);
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
                return $this->json(["message" => "error"]);
            }
        }
    }
    public function delete_order()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $this->getBody();
            $result = $this->orderModel->delete_order($id);
            if ($result) {
                return $this->json(["message" => "success", "data" => $id]);
            } else {
                return $this->json(["message" => "failed"]);
            }
        }
    }
}
