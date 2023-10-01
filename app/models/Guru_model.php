<?php
class Guru_model
{
    private $table = 'guru';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllGuru()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getGuruById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataGuru($data)
    {
        $query = "INSERT INTO guru 
        VALUES
        ('', :nama, :mapel)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('mapel', $data['mapel']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataguru($id)
    {
        $query = "DELETE FROM guru WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataguru($data)
    {
        $query = "UPDATE guru SET
                    nama = :nama,
                    mapel = :mapel
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('mapel', $data['mapel']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataguru()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM guru WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
