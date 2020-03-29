<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Menu</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="edit" action="<?php echo base_url('/admin/menu/edit_menu')?>" method="post">
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" class="form-control" name="nama_menu" id="nama" required>
                        <input type="hidden" name="id_menu" id="kode"/>
                    </div>
                    <div class="form-group">
                        <label>Halaman</label>
                        <select class="form-control" name="halaman" id="halaman">
                            <option value="0">--Pilih Halaman Yang Dimasukkan--</option>
                            <?php
													  	foreach($halaman as $hal){?>
                            <option value="<?= $hal->id_halaman?>"><?= $hal->nama_halaman?></option> <?php }?>
                        </select>
                        * Boleh Tidak Diisi
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
                <h4 class="modal-title">Tambah Menu</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="tambah" action="<?php echo base_url('/admin/menu/do_tambah_menu')?>"
                    method="post">
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" class="form-control" name="nama_menu" required>
                    </div>
                    <div class="form-group">
                        <label>Halaman</label>
                        <select class="form-control" name="halaman">
                            <option value="0">--Pilih Halaman Yang Dimasukkan--</option>
                            <?php
							foreach($halaman as $hal){?>
                            <option value="<?= $hal->id_halaman?>"><?= $hal->nama_halaman?></option>
                            <?php }?>
                        </select>
                        <span class="help-text">* Boleh Tidak Diisi</span>
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
                Menu
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
                    Menu</a>
                <div class="adv-table">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th class="text-center">Halaman</th>
                                <th class="text-center">Tampil Pada</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
								$no=1;
                                foreach($menu as $menu){?>
                            <tr>
                                <td><?= $no?></td>
                                <td><?= $menu->nama_menu?></td>
                                <td class="text-center"><?= $this->master->get_halaman($menu->id_halaman);?></td>
                                <td class="text-center"><?= ($menu->website==0) ? "Website Haji":"Website Travel";?>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-warning tombol-edit" 
                                    data-kode="<?php echo $menu->id;?>" 
                                    data-nama="<?php echo $menu->nama_menu;?>"
                                    data-halaman="<?php echo $menu->id_halaman;?>"
                                    data-website="<?php echo $menu->website;?>">Edit</button>
                                    <a href="<?php echo base_url('/admin/menu/hapus/'.$menu->id)?>" class="btn btn-danger" onclick="return confirm('hapus data ?')">Hapus</a>
                                </td>
                            </tr>
                            <?php $no++; }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
</section>
<script src="<?php echo base_url('tpl_admin/customjs/menu.js');?>"></script>