<?php
class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function checkAdminByID($id)
    {
        $this->db->query("SELECT * FROM admin WHERE id = :id");
        $this->db->bind(':id',$id);
        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function updateInfo($data)
    {
        $this->db->query("UPDATE client SET 

        name=:name,
        date_nais = :date_nais,
        CIN =:CIN,
        profession = :profession WHERE id=:id");
        // Bind value
        // 

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':date_nais', $data['date_nais']);
        $this->db->bind(':CIN', $data['CIN']);
        $this->db->bind(':profession', $data['profession']);
        $this->db->bind(':id', $data['id']);

        try{
            return $this->db->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
}