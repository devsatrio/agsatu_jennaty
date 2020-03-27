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
                Tambah Galeri
            </header>
            <div class="panel-body">
                <form method="post" action="<?= base_url("admin/galeri/do_tambah")?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" />
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar" required accept="image/*"/>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-success"> Tambah</button>
                            <button type="button" onclick="history.go(-1)" class="btn btn-warning">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </section>
</section>