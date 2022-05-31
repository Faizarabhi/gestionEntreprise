                <?php
                class FactureController extends Controller
                {

                    private $factureModel;

                    public function __construct()
                    {
                        $this->factureModel = $this->model('facture');
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
                            
                            var_dump($this->session());
                            // http://localhost/filrouge/backend/FactureController/create

                            // 2 - fetch fatcure id with lastInsertedId function in model  SELECT LAST_INSERT_ID()

                            // 3 - loop over commands and assign facture id to all commands

                            // 4 - insert command into commands table
                            // done
                            // $result = $this->factureModel->create($data[0]);
                            // $lastID = $this->factureModel->lastID();

                            // foreach ($arr as $item) {
                            //     var_dump($item);
                            //   }

                        }
                    }
                }
