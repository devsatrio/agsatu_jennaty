$(document).ready(function() {
    $('#example').dataTable();
    $('.tombol-edit').click(function() {
        var id = $(this).data('kode');
        var nama = $(this).data('nama');
        var menu = $(this).data('menu');
        var halaman = $(this).data('halaman');
        var website = $(this).data('website');
        $('#nama').val(nama);
        $('#kode').val(id);
        $('#menu').val(menu);
        $('#halaman').val(halaman);
        $('#website').val(website);
        $('#edit').modal('show');
    });
});