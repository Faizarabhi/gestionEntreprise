<?php 

class facture
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    } 
            public function create($data){
                $this->db->query("INSERT INTO `facteur`( `customer_id`) VALUES (:customer_id)");
                $this->db->bind(':customer_id', $data['customer_id']);
                try {
                    return $this->db->execute() ? $data : false;
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }

            public function lastId()
            {
                return $this->db->lastInsertedId("facteur");
            }

}