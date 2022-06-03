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
                    
                    public function getAllfacture(){
                        $result = $this->factureModel->getAllfacture();

                        
                        if($result){
                            echo json_encode($result);
                        }
                        else{
                            echo json_encode(["message"=>"error not found"]);
                        }
                    }
                    public function getAllCommande(){
                        $result = $this->commandModel->getAllCommande();
                        if($result){
                            echo json_encode($result);
                        }
                        else{
                            echo json_encode(["message"=>"error not find"]);
                        }
                    }

                }
