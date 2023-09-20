$(function () {

    $('.tombolTambahData').on('click', function(){
        $('#formModalLabel').html('Tambah data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah data');
    })

    $('.tampilModalUbah').on('click', function(){
        $('#formModalLabel').html('Ubah data Siswa');
        $('.modal-footer button[type=submit]').html('Ubah data');
        $('.modal-body form').attr('action', 'http://localhost/PHPMVC/public/siswa/ubah');

        const id = $(this).data('id');
        
        $.ajax({
            url:'http://localhost/PHPMVC/public/siswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#absen').val(data.absen);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        })
    })

    

});