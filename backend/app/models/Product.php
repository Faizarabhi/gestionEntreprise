<?php 



class Product 
    {
        private $db;
        public function __construct()
    {
        $this->db = new Database;
        // die("hello from product model");
    }

    public function add_product($data){
        $this->db->query("INSERT INTO `produit`( `ref_prdt`, `designation`, `unite`, `categorie`) VALUES (':ref_prdt',':designation',':unite',':categorie')");
        $this->db->bind(':ref_prdt', $data['ref_prdt']);
        $this->db->bind(':designation', $data['designation']);
        $this->db->bind(':unite', $data['unite']);
        $this->db->bind(':categorie', $data['categorie']);
        
        try {
            var_dump($data);
            // die("hello from hhh product model");
            return $this->db->execute() ? $data : false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    }