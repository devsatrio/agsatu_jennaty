<section class="blog-list">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1>
                        <?= $data->nama_halaman?>
                    </h1>
                </div>
                <div class="blog-details__content">
                    <div style="max-width:100%">
                        <?= $data->isi?>
                    </div>
                    <hr>
                    <ul class="list-unstyled blog-one__meta">
                        <li><i class="far fa-user-circle"></i> Admin</li>
                        <li><i class="far fa-calendar"></i> <?= date_format(date_create($data->tanggal), 'd-m-Y') ?>
                        </li>
                    </ul>
                </div>
                <br>
                <div class="text-center">
                    <button type="button" onclick="history.go(-1)" class="thm-btn contact-one__btn">Kembali</button>
                </div>
            </div>
        </div>
    </div>
</section>