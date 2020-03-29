<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Galeri
            </header>
            <div class="panel-body">
                <?php
                if ($this->session->flashdata('msg')=='h'){ ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Data Berhasil Dihapus.
                </div>
                <?php }else if($this->session->flashdata('msg')=='i'){ ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Data Berhasil Disimpan.
                </div>
                <?php }else if($this->session->flashdata('msg')=='e'){ ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Data Berhasil Diperbarui.
                </div>
                <?php } ?>
                <a class="btn btn-success" href="<?= base_url("admin/galeri/tambah")?>">Tambah Gambar</a>
                <br>
                <div class="adv-table">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Tampil Pada</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $no=1;
						foreach($data as $data){ ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->judul?></td>
                                <td><?= substr($data->keterangan,0,50)?></td>
                                <td class="text-center">
                                    <img src="<?php echo base_url('/gambar/galeri/'.$data->gambar)?>"
                                        alt="gambar-galeri" width="10%">
                                </td>
                                <td class="text-center"><?= ($data->website==0) ? "Website Haji":"Website Travel";?>
                                <td class="text-center">
                                    <a href="<?php echo base_url('admin/galeri/edit/'.$data->id_galeri)?>"
                                        class="btn btn-success btn-xs">Edit</a>
                                    <a href="<?php echo base_url('admin/galeri/hapus/'.$data->id_galeri)?>"
                                        onclick="return confirm('Hapus Data ?')" class="btn btn-danger btn-xs">hapus</a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
</section>
<script>
$(document).ready(function() {
    $('#example').dataTable();
});
</script>