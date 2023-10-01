<div class="container mt-3">
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
    <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Data Siswa
      </button>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
    <form action="<?= BASEURL; ?>/siswa/cari" method="post">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Cari siswa..." name="keyword" id="keyword" autocomplete="off">
      <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
    </div>
    </form>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <h3>Daftar siswa</h3>
      <ul class="list-group">
        <?php foreach ($data['siswa'] as $siswa) : ?>
          <li class="list-group-item d-flex flex-row justify-content-between">
            <?= $siswa['nama']; ?>
            <div class="d-flex gap-2">
              <a href="<?= BASEURL; ?>/siswa/detail/<?= $siswa['id'] ?>" class="badge text-bg-primary text-decoration-none float-right">detail</a>

              <a href="<?= BASEURL; ?>/siswa/edit/<?= $siswa['id'] ?>" class="badge text-bg-success text-decoration-none float-right tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $siswa['id']; ?>">edit</a>

              <a href="<?= BASEURL; ?>/siswa/hapus/<?= $siswa['id'] ?>" class="badge text-bg-danger text-decoration-none float-right" onclick="return confirm('yakin?');">hapus</a>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">Tambah data siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/siswa/tambah" method="post">
        <input type="hidden" name="id" id="id">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="mb-3">
            <label for="absen" class="form-label">Absen</label>
            <input type="number" class="form-control" id="absen" name="absen">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan">
              <option value="RPL">RPL</option>
              <option value="DKV">DKV</option>
              <option value="MP">MP</option>
              <option value="PM">PM</option>
              <option value="AKL">AKL</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah data siswa</button>
        </form>
      </div>
    </div>
  </div>
</div>