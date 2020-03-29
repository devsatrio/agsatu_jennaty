<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Submenu</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="edit" action="<?php echo base_url('/admin/submenu/edit_menu')?>" method="post">
                    <div class="form-group">
                        <label>Nama Submenu</label>
                        <input type="text" class="form-control" name="nama_submenu" id="nama" required>
                        <input type="hidden" name="id_submenu" id="kode" />
                    </div>
                    <div class="form-group">
                        <label>Menu</label>
                        <select class="form-control" name="menu" id="menu">
                            <?php
							foreach($menu as $hal){?>
                            <option value="<?= $hal->id?>"><?= $hal->nama_menu?></option> <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Halaman</label>
                        <select class="form-control" name="halaman" id="halaman">
                            <?php
							foreach($halaman as $hal){?>
                            <option value="<?= $hal->id_halaman?>"><?= $hal->nama_halaman?></option> <?php }?>
                        </select>
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
                <h4 class="modal-title">Tambah Submenu</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="tambah" method="post"
                    action="<?php echo base_url('/admin/submenu/do_tambah_menu')?>">
                    <div class="form-group">
                        <label>Nama Submenu</label>
                        <input type="text" class="form-control" name="nama_submenu" required>
                    </div>
                    <div class="form-group">
                        <label>Menu</label>
                        <select class="form-control" name="menu">
                            <?php
							foreach($menu as $hal){?>
                            <option value="<?= $hal->id?>"><?= $hal->nama_menu?></option> <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Halaman</label>
                        <select class="form-control" name="halaman">
                            <?php
													  	foreach($halaman as $hal){?>
                            <option value="<?= $hal->id_halaman?>"><?= $hal->nama_halaman?></option> <?php }?>
                        </select>
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
                Submenu
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
                    Submenu</a>
                <div class="adv-table">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Submenu</th>
                                <th>Menu</th>
                                <th>Halaman</th>
                                <th class="text-center">Tampil Pada</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$no=1;
                            foreach($submenu as $menu){
                        ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $menu->nama_submenu?></td>
                                <td><?= $menu->nama_menu?></td>
                                <td><?= $menu->nama_halaman?></td>
                                <td class="text-center"><?= ($menu->menuwebsite==0) ? "Website Haji":"Website Travel";?>
                                <td class="text-center">
                                    <button class="btn btn-warning tombol-edit" type="button"
                                        data-kode="<?= $menu->id_submenu?>"
                                        data-nama="<?php echo $menu->nama_submenu;?>"
                                        data-menu="<?php echo $menu->id_menu;?>"
                                        data-halaman="<?php echo $menu->id_halaman;?>"
                                        data-website="<?php echo $menu->menuwebsite;?>">Edit</button>
                                    <a href="<?php echo base_url('/admin/submenu/hapus/'.$menu->id_submenu);?>"
                                        class="btn btn-danger" onclick="return confirm('hapus data ?')">Hapus</a>
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
<script src="<?php echo base_url('tpl_admin/customjs/submenu.js');?>"></script>