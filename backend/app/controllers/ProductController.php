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
                    $data = $this->getBody();

                    $result = $this->productModel->add_product($data);
                    if ($result) {
                        return $this->json(["message" => "success"]);
                    } else {
                        return $this->json(["message" => "error not created"]);
                    }
                }
            }
            public function getAll_product()
            {
                $result = $this->productModel->getAll_product();
                if ($result) {
                    return $this->json($result);
                } else {
                    return $this->json(["message" => "error not select"]);
                }
            }


            public function get_product()
            {
                $id = $this->getBody();
                $result = $this->productModel->get_product($id);
                if ($result) {
                    return $this->json($result);
                } else {
                    return $this->json(["message" => "error not select from controller"]);
                }
            }
            public function get_productBycategorie()
            {

                $id = $this->getBody();
                $result = $this->productModel->get_productBycategorie($id);
                if ($result) {
                    return $this->json($result);
                } else {
                    return $this->json(["message" => "error not select"]);
                }
            }
            public function update_product()
            {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $data = $this->getBody();
                    // print_r($data);die();


                    if ($this->productModel->update_product($data)) {
                        return $this->json(["message" => "done"]);
                    } else {
                        return $this->json(["message" => "error"]);
                    }
                }
            }
            public function delete_product()
            {


                if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

                    $id = $this->getBody();
                    $result = $this->productModel->delete_product($id);
                    // var_dump($result);
                    if ($result) {
                        return $this->json(["message" => "success delete", "data" => $id]);
                    } else {
                        return $this->json(["message" => "failed"]);
                    }
                }
            }
        }
