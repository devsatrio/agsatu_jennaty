<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Slider
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
                <a class="btn btn-success" href="<?= base_url("admin/slider/tambah")?>">Tambah Slider</a>
                <br><br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						$no=1;
						foreach($data as $data){ ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->keterangan?></td>
                            <td><?= $data->url_gambar?></td>
                            <td>
                                <a href="<?php echo base_url('admin/slider/hapus/'.$data->id)?>"
                                    onclick="return confirm('Hapus Data ?');" class="btn btn-danger btn-xs">hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </section>
</section>