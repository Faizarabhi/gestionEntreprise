        <?php
        class Personnel
        {
            private $db;
            public function __construct()
            {
                $this->db = new Database;
            }
            public function getAll_personnel()
            {
                $this->db->query("SELECT * from personnel ");
                try {
                    return $this->db->resultSet();
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }
            public function add_personnel($data)
            {
                
                $this->db->query("INSERT INTO `personnel`( `name`, `email`, `password`, `tel`, `photo`, `metier`) VALUES (:name,:email,:password,:tel,:photo,:metier)");
                $this->db->bind(':name', $data['name']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':password', $data['password']);
                $this->db->bind(':tel', $data['tel']);
                $this->db->bind(':photo', $data['photo']);
                $this->db->bind(':metier', $data['metier']);
                try {
                    return $this->db->execute() ? $data : false;
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }





            public function get_personnel($data)
            {
                // print_r($id);
                // http://localhost/filrouge/backend/public/personnelController/get_personnel
                $this->db->query('SELECT * FROM personnel  Where id = :id');
                $this->db->bind(':id', $data['id']);

                try {
                    return $this->db->single();
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }
            public function update_personnel($data)
            {   
                // print_r($data);
                
                $this->db->query("UPDATE personnel SET name = :name, email = :email, password =:password, tel = :tel , photo = :photo , metier = :metier , materiel_id= :materiel_id WHERE id= :id");
                $this->db->bind(':id', $data['id']);
                $this->db->bind(':name', $data['name']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':password', $data['password']);
                $this->db->bind(':tel', $data['tel']);
                $this->db->bind(':photo', $data['photo']);
                $this->db->bind(':metier', $data['metier']);
                $this->db->bind(':materiel_id', $data['materiel_id']);

                try {
                    
                    return $this->db->execute();
                } catch (PDOException $e) {
                    die($e->getMessage());
                    return $e->getMessage();
                }
            }
            public function delete_personnel($data)
            {

                // die($data);
                // print_r($data);
                $id = $data['id'];
                
                $this->db->query('DELETE  FROM personnel WHERE id = :id');
                $this->db->bind(":id", $id);
                try {
                    // die($data);
                    return $this->db->execute();
                } catch (PDOException $e) {
                    // die($e->getMessage());
                    return $e->getMessage();
                }
            }
        }
