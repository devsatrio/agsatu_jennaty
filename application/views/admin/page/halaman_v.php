<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Halaman
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
                    Halaman</a>
                <div class="adv-table">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Halaman</th>
                                <th class="text-center">Bentuk Halaman</th>
                                <th class="text-center">Tampil Pada</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
						$no=1;
                        foreach($halaman as $hal){ ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $hal->nama_halaman?></td>
                                <td class="text-center"><?= ($hal->bentuk_halaman==1) ? "Tunggal":"Jamak";?></td>
                                <td class="text-center"><?= ($hal->website==0) ? "Website Haji":"Website Travel";?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning tombol-edit"
                                        data-kode="<?php echo $hal->id_halaman;?>"
                                        data-nama="<?php echo $hal->nama_halaman;?>"
                                        data-bentuk="<?php echo $hal->bentuk_halaman;?>"
                                        data-website="<?php echo $hal->website;?>">Edit</button>
                                    <a class="btn btn-primary"
                                        href="<?= $hal->bentuk_halaman==1 ? base_url("admin/halaman/edit_tunggal/".$hal->id_halaman) : base_url("admin/halaman/edit_jamak/".$hal->id_halaman)?>">Edit
                                        Artikel</a>
                                    <a class="btn btn-danger"
                                        href="<?php echo base_url('admin/halaman/hapus/'.$hal->id_halaman)?>"
                                        onclick="return confirm('Hapus Data ?')">Hapus</a>

                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Tambah Halaman</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" name="tambah" method="post"
                                action="<?php echo base_url('admin/halaman/do_tambah_halaman'); ?>">
                                <div class="form-group">
                                    <label>Nama Halaman</label>
                                    <input type="text" class="form-control" name="nama_halaman" required>
                                </div>
                                <div class="form-group">
                                    <label>Bentuk</label>
                                    <select class="form-control" name="bentuk">
                                        <option value="1">Tunggal</option>
                                        <option value="2">Jamak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ditampilkan Pada</label>
                                    <select class="form-control" name="website">
                                        <option value="0">Website Haji</option>
                                        <option value="1">Website Travel</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Edit Halaman</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" name="edit" method="post"
                                action="<?php echo base_url('admin/halaman/edit_halaman');?>">
                                <div class="form-group">
                                    <label>Nama Halaman</label>
                                    <input type="text" class="form-control" name="nama_halaman" id="nama_halaman"
                                        required>
                                    <input type="hidden" id="id_halaman" name="id_halaman" />
                                </div>
                                <div class="form-group">
                                    <label>Bentuk</label>
                                    <select class="form-control" name="bentuk" id="bentuk">
                                        <option value="1">Tunggal</option>
                                        <option value="2">Jamak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ditampilkan Pada</label>
                                    <select class="form-control" name="website" id="website">
                                        <option value="0">Website Haji</option>
                                        <option value="1">Website Travel</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</section>
<script src="<?php echo base_url('tpl_admin/customjs/halaman.js');?>"></script>