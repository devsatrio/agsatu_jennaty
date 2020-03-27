
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Tambah Slider
            </header>
            <div class="panel-body">
                <form method="post" action="<?= base_url("admin/slider/do_tambah")?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" type="text" name="judul" required>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="6"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input placeholder="Masukkan Alamat Link" class="form-control" type="text" name="link">
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar" required accept="image/*" />
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-success"> Tambah</button>
                            <button type="button" onclick="history.go(-1)" class="btn btn-warning">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>