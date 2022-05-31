<?php 

class facture
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    // public function add_facture($data)
    // {   
    //             // http://localhost/filrouge/backend/public/FacteurController/add_facteur
    //             // print_r($data);
    //             $this->db->query("INSERT INTO `facteur`(`id`, `customer_id`) VALUES (:id,:customer_id)");
    //             $this->db->bind(':id', $data['id']);
    //             $this->db->bind(':customer_id', $data['customer_id']);
                
    //             try {
    //                 return $this->db->execute() ? $data : false;
    //             } catch (PDOException $e) {
    //                 return $e->getMessage();
    //             }
    //         }
            public function create($data){
                $this->db->query("INSERT INTO `facteur`( `customer_id`) VALUES (:customer_id)");
                $this->db->bind(':customer_id', $data['customer_id']);
                try {
                    return $this->db->execute() ? $data : false;
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }
            public function lastID(){
                $this->db->query("SELECT LAST_INSERT_ID() INTO @facteur");
                try {
                    return $this->db->single();
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }


}