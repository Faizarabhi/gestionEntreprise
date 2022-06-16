                <?php
                class FactureController extends Controller
                {
                    
                    private $factureModel;
                    private $commandModel;
                    private $productModel;
                    private $customerModel;


                    public function __construct()
                    {
                        $this->factureModel = $this->model('facture');
                        $this->commandModel = $this->model('Command');
                        $this->productModel = $this->model('product');
                        $this->customerModel = $this->model('customer');
                    }




                    public function create()
                    {
                        if ($this->isPostRequest()) {
                            $data = $this->getBody();
                            // 1 - insert fatcure into facture table
                            $customerId = $data["customer_id"];
                            $this->factureModel->create(["customer_id" => $customerId]);

                            $factureId = $this->factureModel->lastId();
                            

                            $commands = [];
                            $productsMapById = [];
                            foreach ($data["list"] as  $command) {
                                $productsMapById[$command["product_id"]] = true;
                                $commands[] = ["facture_id" => $factureId, "product_id" => $command["product_id"], "quantity" => $command["quantity"]];
                            }

                            $created = $this->commandModel->createMany($commands);
                            if (!$created) return $this->json(["message" => "cannot create facture"]);

                            $facture = ["id" => $factureId, "customer" => $this->customerModel->getCustomerById($customerId)];
                            $products = $this->productModel->getManyByIds(array_keys($productsMapById));
                            foreach ($products as $product) {
                                $productsMapById[$product->id] = $product;
                            }
                            foreach ($commands as $index => $command) {
                                $product = $productsMapById[$command["product_id"]];
                                $commands[$index] = [...$command, "product" => $product];
                            }
                            $facture["commands"] = $commands;
                            return $this->json(["message" => "success", "facture" => $facture]);
                            // get products and add them to each command
                            // return $this->json(["message" => "success", "factureId" => $factureId, "product_id" => $command["product_id"], "quantity" => $command["quantity"]]);
                        }
                    }

                    public function getAllfacture()
                    {
                        $result = $this->factureModel->getAllfacture();


                        if ($result) {
                            return $this->json($result);
                        } else {
                            return $this->json(["message" => "error not found"]);
                        }
                    }
                    // where last id
                    public function getfacture()
                    {
                        // $data = $this->getBody();
                        $factureId = $this->factureModel->lastId();
                        // dd($factureId);
                        $result = $this->commandModel->fetchManyByFactureId($factureId);


                        if ($result) {
                            return $this->json($result);
                        } else {
                            return $this->json(["message" => "error not found"]);
                        }
                    }
                    public function getMontan(){
                        $result = $this->commandModel->getMontan();
                        if ($result) {
                            return $this->json($result);
                        } else {
                            return $this->json(["message" => "error not found"]);
                        }
                    }
                    public function getProduct(){
                        $result = $this->commandModel->getProduct();
                        if($result){
                            return $this->json($result);
                        }
                        else{
                            return $this->json(["message" => "error not found"]);
                        }
                    }
                    public function getAllCommande()
                    {
                        $result = $this->commandModel->getAllCommande();
                        if ($result) {
                            return $this->json($result);
                        } else {
                            return $this->json(["message" => "error not find"]);
                        }
                    }
                    public function getfactures()
                    {
                        $result = $this->factureModel->getfactures();

                        if ($result) {
                            return $this->json($result);
                        } else {
                            return $this->json(["message" => "aucune"]);
                        }
                    }
                }
