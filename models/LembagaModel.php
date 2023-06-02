<?php

class LembagaModel {

    private $table = "lembaga";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllLembaga() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahLembaga($data){
        $this->db->query("INSERT INTO lembaga (nama_lembaga) VALUES(:nama_lembaga)");
        $this->db->bind('nama_lembaga',$data['nama_lembaga']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getLembagaById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    

    public function updateLembaga($data){
        $this->db->query("UPDATE lembaga SET nama_lembaga=:nama_lembaga WHERE id=:id");
        $this->db->bind('id',$data['id']);
        $this->db->bind('nama_lembaga',$data['nama_lembaga']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariLembaga(){
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_lembaga LIKE :key");
        $this->db->bind(':key', "%$key%", PDO::PARAM_STR);
        return $this->db->resultSet();
    }

    public function deleteLembaga($id){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    
        return $this->db->rowCount();
    }


    
    



}



?>
