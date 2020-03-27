<section class="blog-one blog-one__grid">
    <div class="container">
        <div class="text-center">
            <h1><?= $judul?></h1>
        </div>
        <br>
        <div class="row">
            <?php
                 foreach($data as $data){?>
            <?php $akor= $data->id_majemuk ?>
            <div class="col-lg-4 col-md-6">
                <div class="blog-one__single">
                    <div class="blog-one__image">
                        <img src="<?php echo base_url('gambar/jamak/'.$data->gambar);?>" alt="">
                        <a
                            href="<?php echo base_url('read/detail/'.$data->id_majemuk.'/'.strtolower(str_replace(' ','-',$data->judul)).'.html')?>"><i
                                class="fa fa-long-arrow-alt-right"></i></a>
                    </div>
                    <div class="blog-one__content">
                        <ul class="list-unstyled blog-one__meta">
                            <li><i class="far fa-user-circle"></i> Admin</li>
                            <li><i class="far fa-comments"></i> <?= $data->tanggal?></li>
                        </ul>
                        <h3><a
                                href="<?php echo base_url('read/detail/'.$data->id_majemuk.'/'.strtolower(str_replace(' ','-',$data->judul)).'.html')?>"><?= $data->judul?></a>
                        </h3>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</section>