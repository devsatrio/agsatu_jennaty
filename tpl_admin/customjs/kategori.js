$(document).ready(function() {
    $('#example').dataTable();
    $('.tombol-edit').click(function() {
        var id = $(this).data('kode');
        var nama = $(this).data('nama');
        var website = $(this).data('website');
        $('#nama').val(nama);
        $('#kode').val(id);
        $('#website').val(website);
        $('#edit').modal('show');
    });
});