<section class="blog-list">
    <div class="container">
        <div class="text-center">
            <h4>
                Hasil Pencarian : <?php echo $pencarian;?>
            </h4>
        </div>
        <br>
        <div class="row">

            <div class="col-lg-8">
                <?php foreach($artikel as $row){ ?>
                <div class="blog-two__single blog-one__single">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="blog-one__image">
                                <img src="<?php echo base_url('gambar/post/'.$row->gambar)?>" alt="">
                                <a href="<?php echo base_url('artikel/detail/'.$row->id_post)?>"><i
                                        class="fa fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="blog-two__content my-auto">
                                <ul class="list-unstyled blog-one__meta">
                                    <li><i class="far fa-user-circle"></i> Admin</li>
                                    <li><i class="far fa-calendar"></i> <?php echo $row->tanggal;?></li>
                                </ul>
                                <h3><a
                                        href="<?php echo base_url('artikel/detail/'.$row->id_post)?>"><?php echo $row->judul;?></a>
                                </h3>
                                <?php echo substr($row->isi,0,100);?>
                                <a href="<?php echo base_url('artikel/detail/'.$row->id_post)?>"
                                    class="blog-two__link">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__search">
                        <form action="<?php echo base_url('artikel/cari')?>" method="post" class="sidebar__search-form">
                            <input type="search" name="cari" placeholder="Cari artikel" required>
                            <button type="submit"><i class="tripo-icon-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="sidebar__single sidebar__category">
                        <h3 class="sidebar__title">Kategori</h3>
                        <ul class="sidebar__category-list list-unstyled">
                            <?php foreach($kategori as $row){ ?>
                            <li><a
                                    href="<?php echo base_url('artikel/kategori/'.$row->id_kategori);?>"><?php echo $row->nama_kategori?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Artikel Terbaru</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            <?php foreach($newartikel as $row){ ?>
                            <a href="<?php echo base_url('artikel/detail/'.$row->id_post)?>">
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="<?php echo base_url('gambar/post/'.$row->gambar)?>" alt="img-post">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3><?php echo $row->judul;?></h3>
                                        <p><i class="far fa-calendar"></i> <?php echo $row->tanggal;?></p>
                                    </div>
                                </li>
                            </a>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>