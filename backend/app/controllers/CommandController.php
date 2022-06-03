<?php
class CommandController extends Controller
{

    private $commandModel;
    public function __construct()
    {
        $this->commandModel = $this->model('Command');
    }

    public function add_commands()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            // print_r($data);
            $result = $this->commandModel->add_commands($data);


            // die($result);
            if (gettype($result) !== 'string') {
                // die("ana mora result");
                // http://localhost/filrouge/backend/CommandController/add_commands
                echo json_encode(["message" => "success Commande added"]);
            } else {
                echo json_encode(["message" => "error not created"]);
            }
        }
    }

    public function getCommandsByFacture($facture)
    {
        // $this->dd($facture); affichier data bilk7al comme laravel
        $commandes = $this->commandModel->fetchManyByFactureId($facture);
        $this->json($commandes);
    }
}
