<?php 




class ProductController extends Controller{



    private $productModel ;
    public function __construct()
    {
        $this->productModel = $this->model('Product');
    }
    
    public function add_product(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"),true);
    
            $result = $this->productModel->add_product($data);
            if($result){
                echo json_encode(["message" => "success"]);
            }else{
                echo json_encode(["message" => "error not created"]);
            }
        }
    }

}