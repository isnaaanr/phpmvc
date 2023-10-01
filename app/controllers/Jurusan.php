<?php

class Jurusan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Jurusan';
        $data['jurusan'] = $this->model('Jurusan_model')->getAllJurusan();
        $this->view('templates/header', $data);
        $this->view('jurusan/index', $data);
        $this->view('templates/footer');
    }
    public function detail($id)
    {
        $data['judul'] = 'Detail Jurusan'; //keluar di tab tombol detail
        $data['jurusan'] = $this->model('Jurusan_model')->getJurusanById($id);
        $this->view('templates/header', $data);
        $this->view('jurusan/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() //tidak bisa diakses di url karena berbetuk modal
    {
        if ($this->model('Jurusan_model')->tambahDataJurusan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('location: ' . BASEURL . '/jurusan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . '/jurusan');
            exit;
        }
    }

    public function hapus($id) //tidak bisa diakses di url karena berbetuk modal
    {
        if ($this->model('Jurusan_model')->hapusDataJurusan($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . '/jurusan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('location: ' . BASEURL . '/jurusan');
            exit;
        }
    }

    public function getubah() //memanggil id 
    {
        echo json_encode($this->model('Jurusan_model')->getJurusanById($_POST['id']));
    }

    public function ubah() //tidak bisa diakses di url karena berbetuk modal
    {
        if ($this->model('Jurusan_model')->ubahDataJurusan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('location: ' . BASEURL . '/jurusan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('location: ' . BASEURL . '/jurusan');
            exit;
        }
    }

    public function cari() //menampilkan eror karena view
    {
        $data['judul'] = 'Daftar Jurusan';
        $data['jurusan'] = $this->model('Jurusan_model')->cariDataJurusan();
        $this->view('templates/header', $data);
        $this->view('jurusan/index', $data);
        $this->view('templates/footer');
    }
}
