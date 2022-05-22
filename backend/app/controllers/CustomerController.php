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
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $data = json_decode(file_get_contents("php://input"), true);

                        $result = $this->customerModel->check_customer($data);
                        if ($result) {
                            echo json_encode(["message" => "success", "data" => $result]);
                        } else {
                            echo json_encode(["message" => "error not created"]);
                        }
                    }
                }
                public function getAll_customer()
            {


                $result = $this->customerModel->getAll_customer();
                if ($result) {
                    echo json_encode($result);
                } else {
                    echo json_encode(["message" => "error not select"]);
                }
                    
            }
            public function get_customer()
            {

                $id = json_decode(file_get_contents("php://input"), true);
                $result = $this->customerModel->get_customer($id);
                if ($result) {
                    echo json_encode($result);
                } else {
                    echo json_encode(["message" => "error not select"]);
                }
                // http://localhost/filrouge/backend/public/CustomerController/get_customer
            }
                public function add_customer()
                {
                    // die("error mn methode customer hna");
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $data = json_decode(file_get_contents("php://input"), true);
                        $email = "CL-" . $data['email'];
                        // $result = $this->userModel->newClient([...$data, "id" => $id]);

                        $result = $this->customerModel->add_customer([...$data, "email" => $email]);
                        if ($result) {
                            echo json_encode(["message" => "success", "data" => $result]);
                        } else {
                            echo json_encode(["message" => "error not created"]);
                        }
                    }
                }

                public function update_customer()
                {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $data = json_decode(file_get_contents("php://input"), true);
    
                        // print_r($data);
                        // http://localhost/filrouge/backend/public/CustomerController/update_customer

                        if ($this->customerModel->update_customer($data)) {
                            echo json_encode(array(
                                "message" => "done"
                            ));
                        } else {
                            echo json_encode(["message" => "error"]);
                        }
                    }
                }
                public function delete_customer()
                {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        $id = json_decode(file_get_contents("php://input"), true);
                        $result = $this->customerModel->delete_customer($id);
                        if ($result) {
                            echo json_encode(["message" => "success", "data" => $id]);
                        } else {
                            echo json_encode(["message" => "failed"]);
                        }
                    }
                    // http://localhost/filrouge/backend/public/CustomerController/delete_customer
                }
            }
