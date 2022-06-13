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
            return $this->json($result);
        } else {
            return $this->json(["message" => "error not select"]);
        }
    }
}
