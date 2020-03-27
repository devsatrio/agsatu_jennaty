<?php foreach($slider as $row){ ?>
<section class="banner-one" style="background-image: url(gambar/slider/<?php echo $row->url_gambar?>);">
    <div class="container">
        <h2><?php echo $row->judul?></h2>
        <p><?php echo $row->keterangan?></p>
        <a href="<?php echo $row->link?>" class="thm-btn">Click Me</a>
    </div><!-- /.container -->
</section><!-- /.banner-one -->
<?php }?>
<section class="features-one__title">
    <div class="container">
        <div class="block-title text-center">
            <p>Kenapa Kami ?</p>
            <h3>Kelebihan pelayanan kami</h3>
        </div><!-- /.block-title -->
    </div><!-- /.container -->
</section><!-- /.features-one__title -->

<section class="features-one__content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="000ms">
                <div class="features-one__single">
                    <i class=" tripo-icon-tour-guide"></i>
                    <h3>8000+ pelanggan puas</h3>
                </div><!-- /.features-one__single -->
            </div><!-- /.col-lg-3 col-md-6 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                <div class="features-one__single">
                    <i class=" tripo-icon-reliability"></i>
                    <h3>100% Agency terpercaya</h3>
                </div><!-- /.features-one__single -->
            </div><!-- /.col-lg-3 col-md-6 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                <div class="features-one__single">
                    <i class=" tripo-icon-user-experience"></i>
                    <h3>28+ Tahun pengalaman</h3>
                </div><!-- /.features-one__single -->
            </div><!-- /.col-lg-3 col-md-6 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="300ms">
                <div class="features-one__single">
                    <i class=" tripo-icon-feedback"></i>
                    <h3>99% Perjalan kami sukses</h3>
                </div><!-- /.features-one__single -->
            </div><!-- /.col-lg-3 col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
<section class="blog-one">
    <div class="container">
        <div class="block-title text-center">
            <p>Artikel</p>
            <h3>Artikel Terbaru Kami</h3>
        </div><!-- /.block-title -->
        <div class="row">
            <?php foreach($newartikel as $row){ ?>
            <div class="col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="000ms">
                <div class="blog-one__single">
                    <div class="blog-one__image">
                        <img src="<?php echo base_url('gambar/post/'.$row->gambar)?>" alt="">
                        <a href="<?php echo base_url('artikel/detail/'.$row->id_post)?>"><i
                                class="fa fa-long-arrow-alt-right"></i></a>
                    </div><!-- /.blog-one__image -->
                    <div class="blog-one__content">
                        <ul class="list-unstyled blog-one__meta">
                            <li><i class="far fa-user-circle"></i> Admin</li>
                            <li><i class="far fa-calendar"></i> <?php echo $row->tanggal;?></li>
                        </ul>
                        <h3><a
                                href="<?php echo base_url('artikel/detail/'.$row->id_post)?>"><?php echo $row->judul;?></a>
                        </h3>
                    </div><!-- /.blog-one__content -->
                </div><!-- /.blog-one__single -->
            </div>
            <?php }?>
        </div><!-- /.row -->
    </div>
</section>
<section class="blog-one">
    <div class="container">
        <div class="block-title text-center">
            <p>Galeri</p>
            <h3>Gambar Terbaru Kami</h3>
        </div><!-- /.block-title -->
        <div class="row">
            <?php foreach($newgambar as $row){?>
            <div class="col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="000ms">
                <div class="blog-one__single">
                    <div class="blog-one__image">
                        <img src="<?php echo base_url('gambar/galeri/'.$row->gambar);?>" alt="">
                    </div>
                </div><!-- /.blog-one__single -->
            </div>
            <?php } ?>
        </div><!-- /.row -->
    </div>
</section>


<!-- /.blog-one -->