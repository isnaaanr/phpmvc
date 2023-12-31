<?php

class Siswa extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Siswa';
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }
    public function detail($id)
    {
        $data['judul'] = 'Detail Siswa'; //keluar di tab tombol detail
        $data['siswa'] = $this->model('Siswa_model')->getSiswaById($id);
        $this->view('templates/header', $data);
        $this->view('siswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() //tidak bisa diakses di url karena berbetuk modal
    {
        if( $this->model('Siswa_model')->tambahDataSiswa($_POST) > 0 ){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('location: ' . BASEURL . '/siswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . '/siswa');
            exit;
        }
    }

    public function hapus($id) //tidak bisa diakses di url karena berbetuk modal
    {
        if( $this->model('Siswa_model')->hapusDataSiswa($id) > 0 ){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . '/siswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('location: ' . BASEURL . '/siswa');
            exit;
        }
    }

    public function getubah() //memanggil id 
    {
        echo json_encode($this->model('Siswa_model')->getSiswaById($_POST['id']));
    }

    public function ubah() //tidak bisa diakses di url karena berbetuk modal
    {
        if( $this->model('Siswa_model')->ubahDataSiswa($_POST) > 0 ){
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('location: ' . BASEURL . '/siswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('location: ' . BASEURL . '/siswa');
            exit;
        }
    }

    public function cari() //menampilkan eror karena view
    {
        $data['judul'] = 'Daftar Siswa';
        $data['siswa'] = $this->model('Siswa_model')->cariDataSiswa();
        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }
}