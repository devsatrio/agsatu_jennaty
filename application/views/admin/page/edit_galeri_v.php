<link rel="stylesheet" type="text/css"
    href="<?= base_url("tpl_admin")?>/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<script type="text/javascript" src="<?= base_url("tpl_admin")?>/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?= base_url("tpl_admin")?>/assets/bootstrap-fileupload/bootstrap-fileupload.js">
</script>
<script src="<?= base_url("tpl_admin")?>/js/advanced-form-components.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Edit Galeri
            </header>
            <div class="panel-body">
                <form method="post" action="<?= base_url("admin/galeri/update")?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" value="<?php echo $data->judul?>"/>
                        <input type="hidden" name="kode" value="<?php echo $data->id_galeri?>">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="6"><?php echo $data->keterangan?></textarea>
                    </div>
                    <div class="form-group">
                        <label>*Gambar baru</label><br>
                        <img src="<?php echo base_url('/gambar/galeri/'.$data->gambar)?>" alt="gambar-galeri" width="20%">
                        <br><br>
                        <input type="file" class="form-control" name="gambar" accept="image/*" />
                        <input type="hidden" name="gambar_lama" value="<?php echo $data->gambar;?>">
                    </div>
                    <div class="form-group">
                        <label>Ditampilkan Pada</label>
                        <select class="form-control" name="website">
                            <option value="0" <?php if($data->website==0){ echo "selected"; }?>>Website Haji</option>
                            <option value="1" <?php if($data->website==1){ echo "selected"; }?>>Website Travel</option>
                        </select>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-success"> Update</button>
                            <button type="button" onclick="history.go(-1)" class="btn btn-warning">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </section>
</section>