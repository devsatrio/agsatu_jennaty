<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Submenu</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="edit" action="<?php echo base_url('/admin/kategori/edit_kategori')?>" method="post">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" id="nama" required>
                        <input type="hidden" name="id_kategori" id="kode"/>
                    </div>
                    <div class="form-group">
                        <label>Ditampilkan Pada</label>
                        <select class="form-control" name="website" id="website">
                            <option value="0">Website Haji</option>
                            <option value="1">Website Travel</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Kategori</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="tambah" action="<?php echo base_url('/admin/kategori/do_tambah_kategori')?>"
                    method="post">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" required>
                    </div>
                    <div class="form-group">
                        <label>Ditampilkan Pada</label>
                        <select class="form-control" name="website">
                            <option value="0">Website Haji</option>
                            <option value="1">Website Travel</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Kategori
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
                <a class="btn btn-success" data-toggle="modal" href="#tambah" style="margin-bottom:20px;">Tambah
                    Kategori</a>
                <div class="adv-table">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th class="text-center">Tampil Pada</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$no=1;
                            foreach($kategori as $kat){?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $kat->nama_kategori?></td>
                                <td class="text-center"><?= ($kat->website==0) ? "Website Haji":"Website Travel";?>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning tombol-edit"
                                    data-kode="<?php echo $kat->id_kategori;?>"
                                    data-nama="<?php echo $kat->nama_kategori;?>"
                                    data-website="<?php echo $kat->website;?>">Edit</button>
                                    <a href="<?php echo base_url('/admin/kategori/hapus/'.$kat->id_kategori)?>" class="btn btn-danger" onclick="return confirm('Hapus data ?');">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
</section>
<script src="<?php echo base_url('tpl_admin/customjs/kategori.js');?>"></script>