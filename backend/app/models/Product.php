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

                $this->db->query("INSERT INTO `produit`( `ref_prdt`, `designation`, `unite`, `id_categorie`,`prix_unitaire`) VALUES (:ref_prdt,:designation,:unite,:id_categorie,:prix_unitaire)");
                $this->db->bind(':ref_prdt', $data['ref_prdt']);
                $this->db->bind(':designation', $data['designation']);
                $this->db->bind(':unite', $data['unite']);
                $this->db->bind(':id_categorie', $data['id_categorie']);
                $this->db->bind(':prix_unitaire', $data['prix_unitaire']);


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

                $this->db->query('SELECT produit.id as idpro,produit.*,categorie.* FROM produit 
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
                    var_dump($e->getMessage());
                    return $e->getMessage();
                }
            }
            public function update_product($data)
            {
                // $data['id']=42;
                print_r($data);

                $this->db->query("UPDATE produit SET  designation = :designation,prix_unitaire = :prix_unitaire, unite =:unite  WHERE id= :id");
                $this->db->bind(':id', $data['idpro']);
                $this->db->bind(':designation', $data['designation']);
                $this->db->bind(':unite', $data['unite']);
                $this->db->bind(':prix_unitaire', $data['prix_unitaire']);


                try {

                    return $this->db->execute();
                } catch (PDOException $e) {
                    die($e->getMessage());
                    return $e->getMessage();
                }
            }
            public function delete_product($data)
            {

                // var_dump($id);
                $id = $data['id'];
                $this->db->query('DELETE  FROM produit WHERE id = :id');
                $this->db->bind(":id", $id);

                try {
                    return $this->db->execute();
                } catch (PDOException $e) {
                    die($e->getMessage());
                    return $e->getMessage();
                }
            }
        }
