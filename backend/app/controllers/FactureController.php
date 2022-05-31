                <?php
                class FactureController extends Controller
                {

                    private $factureModel;
                    private $commandModel;

                    public function __construct()
                    {
                        $this->factureModel = $this->model('facture');
                        $this->commandModel = $this->model('Command');
                    }

                    // public function add_facteur()
                    // {

                    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    //         $data = json_decode(file_get_contents("php://input"), true);
                    //         // print_r($data);
                    //         $result = $this->factureModel->add_facteur($data);

                    //         if ($result) {
                    //             return $this->json(["message" => "success", "data" => $result]);
                    //         } else {
                    //             return $this->json(["message" => "error not created"]);
                    //         }
                    //     }
                    // }


                    public function create()
                    {
                        if ($this->isPostRequest()) {
                            $data = $this->getBody();
                            // 1 - insert fatcure into facture table
                            $this->factureModel->create(["customer_id" => $data["customer_id"]]);

                            $factureId = $this->factureModel->lastId();
                            $commands = [];
                            foreach ($data["list"] as  $command) {
                                $commands[] = ["facture_id" => $factureId, "product_id" => $command["product_id"], "quantity" => $command["quantity"]];
                            }

                            $created = $this->commandModel->createMany($commands);
                            if(!$created) return $this->json(["message" => "cannot create facture"]);

                            return $this->json(["message" => "success", "factureId" => $factureId]);

                        }
                    }
                }
