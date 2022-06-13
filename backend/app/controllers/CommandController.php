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
        if ($this->isPostRequest()) {
            $data = $this->getBody();
            // print_r($data);
            $result = $this->commandModel->add_commands($data);


            // die($result);
            if (gettype($result) !== 'string') {
                // die("ana mora result");
                // http://localhost/filrouge/backend/CommandController/add_commands
                return $this->json(["message" => "success Commande added"]);
            } else {
                return $this->json(["message" => "error not created"]);
            }
        }
    }

    public function getCommandsByFacture($facture)
    {
        //affichier data bilk7al comme laravel
        // $this->dd($facture); 
        $commandes = $this->commandModel->fetchManyByFactureId($facture);
        $this->json($commandes);
    }
}
