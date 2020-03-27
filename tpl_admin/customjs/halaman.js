$(document).ready(function() {
    $('#example').dataTable();
    $('.tombol-edit').click(function() {
        var id = $(this).data('kode');
        var nama = $(this).data('nama');
        var bentuk = $(this).data('bentuk');
        $('#nama_halaman').val(nama);
        $('#id_halaman').val(id);
        $('#bentuk').val(bentuk);
        $('#edit').modal('show');
    });
});