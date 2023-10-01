<?php

class Kelas_model
{
    private $table = 'kelas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKelas()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getKelasById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahKelas($data)
    {
        $query = "INSERT INTO kelas 
        VALUES ('', :kelas)";

        $this->db->query($query);
        $this->db->bind('kelas', $data['kelas']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusKelas($id)
    {
        $query = "DELETE FROM kelas WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahKelas($data)
    {
        $query = "UPDATE kelas SET 
        kelas = :kelas
        WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('id', $data['id']);

        try {
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function cariKelas()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM kelas WHERE kelas LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}