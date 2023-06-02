<?php

class SertifikasiModel {

    private $table = "sertifikasi";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllSertifikasi() {
        $this->db->query("SELECT sertifikasi.*, lembaga.nama_lembaga FROM " . $this->table . " JOIN lembaga ON lembaga.nama_lembaga = sertifikasi.lembaga_sertifikasi");
        return $this->db->resultSet();
    }

    public function tambahSertifikasi($data) {
        $this->db->query("INSERT INTO sertifikasi (nama_sertifikasi, tingkat_sertifikasi, nomor_sertifikasi, tanggal_sertifikasi, lembaga_sertifikasi) 
            VALUES (:nama_sertifikasi, :tingkat_sertifikasi, :nomor_sertifikasi, :tanggal_sertifikasi, :lembaga_sertifikasi)");
        $this->db->bind('nama_sertifikasi', $data['nama_sertifikasi']);
        $this->db->bind('tingkat_sertifikasi', $data['tingkat_sertifikasi']);
        $this->db->bind('nomor_sertifikasi', $data['nomor_sertifikasi']);
        $this->db->bind('tanggal_sertifikasi', $data['tanggal_sertifikasi']);
        $this->db->bind('lembaga_sertifikasi', $data['lembaga_sertifikasi']);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function getSertifikasiById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    

    public function updateDataSertifikasi($data) {
        $this->db->query("UPDATE sertifikasi SET nama_sertifikasi=:nama_sertifikasi, `tingkat_sertifikasi`=:tingkat_sertifikasi, nomor_sertifikasi=:nomor_sertifikasi, tanggal_sertifikasi=:tanggal_sertifikasi, lembaga_sertifikasi=:lembaga_sertifikasi WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_sertifikasi', $data['nama_sertifikasi']);
        $this->db->bind('tingkat_sertifikasi', $data['tingkat_sertifikasi']);
        $this->db->bind('nomor_sertifikasi', $data['nomor_sertifikasi']);
        $this->db->bind('tanggal_sertifikasi', $data['tanggal_sertifikasi']);
        $this->db->bind('lembaga_sertifikasi', $data['lembaga_sertifikasi']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    public function cariSertifikasi() {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_sertifikasi LIKE :key 
                          OR tingkat_sertifikasi LIKE :key 
                          OR nomor_sertifikasi LIKE :key 
                          OR tanggal_sertifikasi LIKE :key 
                          OR lembaga_sertifikasi LIKE :key");
        $this->db->bind(':key', "%$key%", PDO::PARAM_STR);
        return $this->db->resultSet();
    }
    

    public function deleteSertifikasi($id){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    
        return $this->db->rowCount();
    }


    
    



}



?>
