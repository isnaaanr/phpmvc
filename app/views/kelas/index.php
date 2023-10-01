<div class="container mt-4">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash_kelas(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataKelas" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah kelas
            </button>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/kelas/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari kelas..." name="keyword" id="keyword" aria-describedby="button-addon" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <br><br>
    <h1>Daftar Kelas</h1>
    <ul class="list-group" style="margin-right: 570px !important;">
        <?php foreach ($data['kelas'] as $kelas) : ?>
            <li class="list-group-item d-flex flex-row justify-content-between">
                <?= $kelas['kelas']; ?>
                <div class="d-flex gap-2">
                    <a href="<?= BASEURL; ?>/kelas/detail/<?= $kelas['id'] ?>" class="badge text-bg-primary text-decoration-none float-right">detail</a>
                    <a href="<?= BASEURL; ?>/kelas/ubah/<?= $kelas['id'] ?>" class="badge text-bg-success text-decoration-none float-right tampilModalUbahKelas" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $kelas['id']; ?>">ubah</a>
                    <a href="<?= BASEURL; ?>/kelas/hapus/<?= $kelas['id'] ?>" class="badge text-bg-danger text-decoration-none float-right" onclick="return confirm('yakin?')">hapus</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabelKelas" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabelKelas">Tambah Data Kelas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/kelas/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Kelas </label>
                        <input type="text" class="form-control" id="kelas" name="kelas">
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Kelas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
    $('.tombolTambahDataKelas').on('click', function() {
        $('#formModalLabelKelas').html('Tambah Data Kelas');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#kelas').val('');
    });

    $('.tampilModalUbahKelas').on('click', function() {
        $('#formModalLabelKelas').html('Ubah Data Kelas');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/PHPMVC/public/kelas/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/PHPMVC/public/kelas/getubah',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#kelas').val(data.kelas);
                $('#id').val(data.id);
            },
        });
    });
});
</script>
