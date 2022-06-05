        <?php

        class Command
        {



            private $db;
            public function __construct()
            {
                $this->db = new Database;
            }
            public function  add_commands($data)
            {
                // var_dump($data);
                // die("hello");
                $this->db->query("INSERT INTO `commande`(`qte`, `facteur_id`, `product_id`) VALUES (:id,:qte,:facteur_id,:product_id)");
                $this->db->bind(':qte', $data['qte']);
                $this->db->bind(':facteur_id', $data['facteur_id']);
                $this->db->bind(':product_id', $data['product_id']);

                try {

                    return $this->db->execute();
                } catch (PDOException $e) {
                    // die($e->getMessage());
                    return $e->getMessage();
                }
            }
            public function createMany($commands)
            {
                $placeholders = [];
                $values = [];
                $keys = array_keys($commands[0]);
                foreach ($commands as $command) {
                    $placeholders[] = "(" . implode(",", array_fill(0, count($command), "?")) . ")";
                    $values = [...$values, ...array_values($command)];
                }
                $query = "INSERT INTO commande (" . implode(",", $keys) . ") VALUES " . implode(", ", $placeholders);
                $this->db->query($query);
                return $this->db->execute($values);
            }
            public function getAllCommande()
            {
                $this->db->query("SELECT * FROM `commande`");

                try {
                    return $this->db->resultSet();
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }

            public function fetchManyByFactureId($facture)
            {
                $this->db->query("SELECT commande.*, commande.id as commande_id, produit.* FROM commande LEFT JOIN produit ON produit.id = commande.product_id WHERE commande.facture_id = :facture ");
                $this->db->bind(':facture', $facture);
                try {
                    return $this->db->resultSet();
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }
        }
