<?php
class CategorieController extends Controller
{
    private $categorieModel;
    public function __construct()
    {
        $this->categorieModel = $this->model('Categorie');
    }
    public function getAll_categorie()
    {
        $result = $this->categorieModel->getAll_categorie();

        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(["message" => "error not select"]);
        }
    }
}
