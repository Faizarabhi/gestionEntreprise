<?php
class Order
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
 

    // id_produit
    public function check_order($data)
    {
        $this->db->query("SELECT * from orderclient  WHERE id = :id");
        $this->db->bind(":id", $data["id"]);
        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getAll_order()
    {
        $this->db->query('SELECT *,customer.*,produit.* FROM orderclient
            INNER JOIN customer ON Orderclient.id_customer	= customer.id 
            INNER JOIN produit ON Orderclient.id_produit	= produit.id');
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }






public function add_order($data)
            {
                
                $this->db->query("INSERT INTO `orderclient`(`qte`, `type_mouvement`, `id_customer`, `id_produit`) VALUES (:qte,:type_mouvement,:id_customer,:id_produit)");
                $this->db->bind(':qte', $data['qte']);
                $this->db->bind(':type_mouvement', $data['type_mouvement']);
                $this->db->bind(':id_customer', $data['id_customer']);
                $this->db->bind(':id_produit', $data['id_produit']);
               
                try {
                    return $this->db->execute() ? $data : false;
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }





            public function update_order($data)
            {   
                // $data['id']=42;
                
                $this->db->query("UPDATE orderclient SET qte = :qte, type_mouvement = :type_mouvement, id_customer =:id_customer, id_produit = :id_produit  WHERE id= :id");
                $this->db->bind(':id', $data['id']);
                $this->db->bind(':qte', $data['qte']);
                $this->db->bind(':type_mouvement', $data['type_mouvement']);
                $this->db->bind(':id_customer', $data['id_customer']);
                $this->db->bind(':id_produit', $data['id_produit']);

                try {
                    
                    return $this->db->execute();
                } catch (PDOException $e) {
                    die($e->getMessage());
                    return $e->getMessage();
                }
            }



    public function delete_order($data)
    {

        // die($data);
        // print_r($data);
        // die($id);
        $id = $data['id'];
        $this->db->query('DELETE  FROM orderclient WHERE id = :id');
        $this->db->bind(":id", $id);
        try {
            // die($id);
            return $this->db->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
            return $e->getMessage();
        }
    }
}
