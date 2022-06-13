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
                return $this->json($result);
            } else {
                return $this->json(["message" => "error not select"]);
            }
        }
        public function add_personnel()
        {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = $this->getBody();
                $email = "PR-" . $data['email'];


                $result = $this->personnelModel->add_personnel([...$data, "email" => $email]);
                if ($result) {
                    return $this->json(["message" => "success", "data" => $result]);
                } else {
                    return $this->json(["message" => "error not created"]);
                }
            }
        }
        public function get_personnel()
        {

            $id = $this->getBody();
            $result = $this->personnelModel->get_personnel($id);
            if ($result) {
                return $this->json($result);
            } else {
                return $this->json(["message" => "error not select"]);
            }
        }
        public function update_personnel()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = $this->getBody();
                // print_r(json_decode(file_get_contents("php://input")));


                if ($this->personnelModel->update_personnel($data)) {
                    echo json_encode(array(
                        "message" => "done"
                    ));
                } else {
                    return $this->json(["message" => "error"]);
                }
            }
        }
        public function delete_personnel()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
                // die("hello");
                $id = $this->getBody();

                $result = $this->personnelModel->delete_personnel($id);
                if ($result) {
                    return $this->json(["message" => "success", "data" => $id]);
                } else {
                    return $this->json(["message" => "failed"]);
                }
            }
        }
    }
