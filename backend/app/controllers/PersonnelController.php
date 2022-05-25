    <?php
    class PersonnelController extends Controller
    {
        private $personnelModel;
        public function __construct()
        {
            $this->personnelModel = $this->model('Personnel');
        }
        public function getAll_personnel()
        {
            $result = $this->personnelModel->getAll_personnel();
            if ($result) {
                echo json_encode($result);
            } else {
                echo json_encode(["message" => "error not select"]);
            }
        }
        public function add_personnel()
        {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = json_decode(file_get_contents("php://input"), true);
                $email = "PR-" . $data['email'];


                $result = $this->personnelModel->add_personnel([...$data, "email" => $email]);
                if ($result) {
                    echo json_encode(["message" => "success", "data" => $result]);
                } else {
                    echo json_encode(["message" => "error not created"]);
                }
            }
        }
        public function get_personnel()
        {

            $id = json_decode(file_get_contents("php://input"), true);
            $result = $this->personnelModel->get_personnel($id);
            if ($result) {
                echo json_encode($result);
            } else {
                echo json_encode(["message" => "error not select"]);
            }
        }
        public function update_personnel()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = json_decode(file_get_contents("php://input"), true);


                if ($this->personnelModel->update_personnel($data)) {
                    echo json_encode(array(
                        "message" => "done"
                    ));
                } else {
                    echo json_encode(["message" => "error"]);
                }
            }
        }
        public function delete_personnel()
        {

            if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

                $id = json_decode(file_get_contents("php://input"), true); 
        $result = $this->personnelModel->delete_personnel($id);
        if($result){
            echo json_encode(["message" => "success","data"=>$id]);
        }else{
            echo json_encode(["message" => "failed"]);
        }
            }
        }
    }
