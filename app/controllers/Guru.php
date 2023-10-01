<?php

class Guru extends Controller
{
    public function index()
    {
        $data['judul'] = 'guru';
        $data['guru'] = $this->model('Guru_model')->getAllGuru();
        $this->view('templates/header', $data);
        $this->view('guru/index', $data);
        $this->view('templates/footer');
    }
    public function detail($id)
    {
        $data['judul'] = 'Detail guru'; //keluar di tab tombol detail
        $data['guru'] = $this->model('Guru_model')->getGuruById($id);
        $this->view('templates/header', $data);
        $this->view('guru/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() //tidak bisa diakses di url karena berbetuk modal
    {
        if ($this->model('Guru_model')->tambahDataGuru($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('location: ' . BASEURL . '/guru');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . '/guru');
            exit;
        }
    }

    public function hapus($id) //tidak bisa diakses di url karena berbetuk modal
    {
        if ($this->model('Guru_model')->hapusDataGuru($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . '/guru');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('location: ' . BASEURL . '/guru');
            exit;
        }
    }

    public function getubah() //memanggil id 
    {
        echo json_encode($this->model('Guru_model')->getGuruById($_POST['id']));
    }

    public function ubah() //tidak bisa diakses di url karena berbetuk modal
    {
        if ($this->model('Guru_model')->ubahDataGuru($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('location: ' . BASEURL . '/guru');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('location: ' . BASEURL . '/guru');
            exit;
        }
    }

    public function cari() //menampilkan eror karena view
    {
        $data['judul'] = 'Daftar guru';
        $data['guru'] = $this->model('Guru_model')->cariDataguru();
        $this->view('templates/header', $data);
        $this->view('guru/index', $data);
        $this->view('templates/footer');
    }
}
