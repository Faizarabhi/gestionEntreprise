<?php 
class CategorieController extends Controller {
    private $categoriecontroller ;
    public function __construct()
    {
        $this->categoriecontroller = $this->model('Categorie');
    }
    public function getAll_categorie(){
        $result =$this->categoriecontroller->getAll_categorie();
        
                if ($result) {
                    echo json_encode($result);
                } else {
                    echo json_encode(["message" => "error not select"]);
                }
    }
}