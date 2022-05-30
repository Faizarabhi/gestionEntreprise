        <?php



        class Product
        {
            private $db;
            public function __construct()
            {
                $this->db = new Database;
                // die("hello from product model");
            }

            public function add_product($data)
            {

                $this->db->query("INSERT INTO `produit`( `ref_prdt`, `designation`, `unite`, `categorie`) VALUES (:ref_prdt,:designation,:unite,:categorie)");
                $this->db->bind(':ref_prdt', $data['ref_prdt']);
                $this->db->bind(':designation', $data['designation']);
                $this->db->bind(':unite', $data['unite']);
                $this->db->bind(':categorie', $data['categorie']);
                // $this->db->query("INSERT INTO `produit`( `ref_prdt`, `designation`, `unite`, `categorie`) VALUES (?,?,?,?)");
                // $this->db->bind(1, $data['ref_prdt']);
                // $this->db->bind(2, $data['designation']);
                // $this->db->bind(3, $data['unite']);
                // $this->db->bind(4, $data['categorie']);

                try {
                    // var_dump($data);
                    return $this->db->execute() ? $data : false;
                } catch (PDOException $e) {
                    // die($e->getMessage());
                    return $e->getMessage();
                }
            }
            public function getAll_product()
            {

                $this->db->query('SELECT *,categorie.* FROM produit 
                INNER JOIN categorie ON categorie.id = produit.id_categorie ');
                try {
                    return $this->db->resultSet();
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
                // http://localhost/filrouge/backend/public/CustomerController/getAll_customer
            }
            public function get_productBycategorie($data)
            {
                // print_r($data);
                // http://localhost/filrouge/backend/public/ProductController/get_productBycategorie
                $this->db->query('SELECT produit.* FROM produit  Where id_categorie = :id');
                $this->db->bind(':id', $data['id']);

                try {
                    return $this->db->resultSet();
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }
            public function get_product($data)
            {
                // http://localhost/filrouge/backend/public/ProductController/get_product
                $this->db->query('SELECT * FROM produit  Where id = :id');
                $this->db->bind(':id', $data['id']);
                // die($data);
                
                // print_r($data);
                try {
                    // die("heelo");
                    return $this->db->single();
                } catch (PDOException $e) {
                    var_dump($e->getMessage()) ;
                    return $e->getMessage();
                }
            }
            public function update_product($data)
            {   
                // $data['id']=42;
                
                $this->db->query("UPDATE produit SET ref_prdt = :ref_prdt, designation = :designation, unite =:unite, categorie = :categorie  WHERE id= :id");
                $this->db->bind(':id', $data['id']);
                $this->db->bind(':ref_prdt', $data['ref_prdt']);
                $this->db->bind(':designation', $data['designation']);
                $this->db->bind(':unite', $data['unite']);
                $this->db->bind(':categorie', $data['categorie']);


                try {
                    
                    return $this->db->execute();
                } catch (PDOException $e) {
                    die($e->getMessage());
                    return $e->getMessage();
                }
            }
            public function delete_product($data)
            {

                // die($data['id']);
                $this->db->query('DELETE  FROM produit WHERE id = :id');
                $this->db->bind(":id", $data['id']);
                
                try {
                    return $this->db->execute();
                } catch (PDOException $e) {
                    die($e->getMessage());
                    return $e->getMessage();
                }
            }
        }
