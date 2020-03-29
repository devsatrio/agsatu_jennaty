<link rel="stylesheet" type="text/css"
    href="<?= base_url("tpl_admin")?>/assets/bootstrap-datepicker/css/datepicker.css" />
<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Edit Post
            </header>
            <div class="panel-body">
                <form method="post" action="<?= base_url("admin/post/do_edit")?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class=" col-lg-6">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="judul" value="<?= $data->judul?>" />
                            <input type="hidden" name="id_post" value="<?= $data->id_post?>" />
                        </div>
                        <div class=" col-lg-6">
                            <label>Tanggal</label>
                            <input type="text" class="form-control default-date-picker" name="tanggal"
                                value="<?= $this->master->get_date($data->tanggal)?>" readonly />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori">
                                <?php
								foreach($kategori as $kat){?>
                                <option value="<?= $kat->id_kategori?>-<?= $kat->website?>"
                                    <?= ($data->id_kategori==$kat->id_kategori) ? "selected":""?>>
                                    <?= $kat->nama_kategori?> - <?= ($kat->website==0) ? "Pada Website Haji":"Pada Website Travel";?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class=" col-lg-6">
                            <label>Gambar</label>
                            <input type="file" class="form-control" name="gambar" accept="image/*" />
                            <span class="text-muted">*kosongi bila tak ingin mengganti gambar</span>
                            <input type="hidden" name="gambar_lama" value="<?php echo $data->gambar; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Isi</label>
                        <textarea class="form-control ckeditor" name="isi" rows="8"><?= $data->isi?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar lama</label><br>
                        <img src="<?php echo base_url('gambar/post/'.$data->gambar)?>" width="20%">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"> Edit</button> <a
                            href="<?= base_url("admin/post")?>" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<script src="<?= base_url()?>tpl_admin/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>tpl_admin/tinymce/tinymce.dev.js"></script>
<script type="text/javascript" src="<?= base_url()?>tpl_admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js">
</script>
<script src="<?= base_url()?>tpl_admin/customjs/formpost.js"></script>