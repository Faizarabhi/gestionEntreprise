<?php 
 
class Command {



    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function  add_commands($data){
        // var_dump($data);
        // die("hello");
        $this->db->query("INSERT INTO `commande`(`id`, `qte`, `facteur_id`, `product_id`) VALUES (:id,:qte,:facteur_id,:product_id)");
                $this->db->bind(':id', $data['id']);
                $this->db->bind(':qte', $data['qte']);
                $this->db->bind(':facteur_id', $data['facteur_id']);
                $this->db->bind(':product_id', $data['product_id']);
                
        try{

            return $this->db->execute();
        }
        catch(PDOException $e){
            // die($e->getMessage());
            return $e->getMessage();
        }
    }
    

}