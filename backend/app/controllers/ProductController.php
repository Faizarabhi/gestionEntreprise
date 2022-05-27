        <?php




        class ProductController extends Controller
        {



            private $productModel;
            public function __construct()
            {
                $this->productModel = $this->model('Product');
            }

            public function add_product()
            {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $data = json_decode(file_get_contents("php://input"), true);

                    $result = $this->productModel->add_product($data);
                    if ($result) {
                        echo json_encode(["message" => "success"]);
                    } else {
                        echo json_encode(["message" => "error not created"]);
                    }
                }
            }
            public function getAll_product()
            {
                $result = $this->productModel->getAll_product();
                if ($result) {
                    echo json_encode($result);
                } else {
                    echo json_encode(["message" => "error not select"]);
                }
            }
            
            
            public function get_product()
            {
                $id = json_decode(file_get_contents("php://input"), true);
                $result = $this->productModel->get_product($id);
                if ($result) {
                    echo json_encode($result);
                } else {
                    echo json_encode(["message" => "error not select from controller"]);
                }
            }
            public function get_productBycategorie()
            {

                $id = json_decode(file_get_contents("php://input"), true);
                $result = $this->productModel->get_productBycategorie($id);
                if ($result) {
                    echo json_encode($result);
                } else {
                    echo json_encode(["message" => "error not select"]);
                }
            }
            public function update_product()
            {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $data = json_decode(file_get_contents("php://input"), true);
                    // var_dump($data);die;

                    if ($this->productModel->update_product($data)) {
                        echo json_encode(array(
                            "message" => "done"
                        ));
                    } else {
                        echo json_encode(["message" => "error"]);
                    }
                }
            }
            public function delete_product()
            {

            if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $id = json_decode(file_get_contents("php://input"), true); 
            $result = $this->productModel->delete_product($id);
            if($result){
                echo json_encode(["message" => "success","data"=>$id]);
            }else{
                echo json_encode(["message" => "failed"]);
            }
                }
            }
        }
