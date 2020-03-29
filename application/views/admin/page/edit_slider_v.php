
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Edit Slider
            </header>
            <div class="panel-body">
                <form method="post" action="<?= base_url("admin/slider/update")?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" type="text" name="judul" value="<?php echo $data->judul?>" required>
                        <input type="hidden" name="kode" value="<?php echo $data->id?>">
                        <input type="hidden" name="gambar_lama" value="<?php echo $data->url_gambar?>">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="6"><?php echo $data->keterangan?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input placeholder="Masukkan Alamat Link" class="form-control" type="text" name="link" value="<?php echo $data->link?>">
                    </div>

                    <div class="form-group">
                        <label>*Gambar baru</label><br>
                        <img src="<?php echo base_url('/gambar/slider/'.$data->url_gambar)?>" alt="gambar-post" width="20%">
                        <input type="file" class="form-control" name="gambar" accept="image/*" />
                    </div>
                    <div class="form-group">
                        <label>Ditampilkan Pada</label>
                        <select class="form-control" name="website">
                            <option value="0" <?php if($data->website==0){ echo "selected";}?>>Website Haji</option>
                            <option value="1" <?php if($data->website==1){ echo "selected";}?>>Website Travel</option>
                        </select>
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