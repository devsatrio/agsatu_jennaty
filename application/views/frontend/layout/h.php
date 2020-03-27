<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Travel Haji</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicons/site.webmanifest">

    <!-- plugin scripts -->


    <link
        href="https://fonts.googleapis.com/css?family=Barlow+Condensed:200,300,400,400i,500,600,700,800,900%7CSatisfy&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/animate.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/owl.theme.default.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/magnific-popup.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/fontawesome-all.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/swiper.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/bootstrap-select.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/tripo-icons.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/jquery.mCustomScrollbar.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/bootstrap-datepicker.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/vegas.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/nouislider.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/nouislider.pips.css');?>">

    <!-- template styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/source/css/responsive.css');?>">
</head>

<body>
    <div class="preloader">
        <img src="assets/images/loader.png" class="preloader__image" alt="">
    </div><!-- /.preloader -->
    <div class="page-wrapper">
        <div class="site-header__header-one-wrap">
            <div class="topbar-one">
                <div class="container-fluid">
                    <div class="topbar-one__left">
                        <a href="mailto:needhelp@tripo.com" style="color:white;">travelhaji@email.com</a>
                        <a href="tel:666-999-0000" style="color:white;">666 999 0000</a>
                        <a href="#" style="color:white;">Magersari gurah,kediri</a>
                    </div><!-- /.topbar-one__left -->
                    <div class="topbar-one__right">
                        <div class="topbar-one__social">
                            <a href="#" style="color:white;"><i class="fab fa-facebook-square"></i></a>
                            <a href="#" style="color:white;"><i class="fab fa-twitter"></i></a>
                            <a href="#" style="color:white;"><i class="fab fa-instagram"></i></a>
                            <a href="#" style="color:white;"><i class="fab fa-dribbble"></i></a>
                        </div><!-- /.topbar-one__social -->
                        <a href="#" class="topbar-one__guide-btn">Hubungi Kami</a>
                    </div><!-- /.topbar-one__right -->
                </div><!-- /.container-fluid -->
            </div><!-- /.topbar-one -->
            <header class="main-nav__header-one ">
                <nav class="header-navigation stricky">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="main-nav__logo-box">
                            <a href="index.html" class="main-nav__logo">
                                <img src="<?php echo base_url('assets/source/images/logo-dark.png')?>" class="main-logo" width="123"
                                    alt="Awesome Image" />
                            </a>
                            <a href="#" class="side-menu__toggler"><i class="fa fa-bars"></i></a>
                        </div>
                        <div class="main-nav__main-navigation">
                            <ul class=" main-nav__navigation-box">
                                <li>
                                    <a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <?php 
                                    $urut=1;
                                    $menu = $this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		
                                    foreach($menu as $menu){                    
                                        if($menu->id_halaman!=0)
                                            $link=base_url("read/".$menu->id_halaman."/".$menu->bentuk_halaman."/".str_replace(array("/"),"",strtolower(str_replace(' ','-',$menu->nama_halaman))).".html");
                                        else
                                            $link="#"; ?>
                                <li class="dropdown">
                                    <a href="<?= $link;?>"><?= $menu->nama_menu?></a>
                                    <?php 
                                        $jumsubmenu = $this->db->query("select count(*) as total from submenu where id_menu='$menu->id'")->row();
                                        if($jumsubmenu->total>0){
                                    ?>
                                    <ul>
                                        <?php
                                        
                                        foreach($this->master->get_submenu($menu->id) as $submenu){?>
                                        <li><a
                                                href="<?= base_url("read/".$submenu->id_halaman."/".$submenu->bentuk_halaman."/".strtolower(str_replace(' ','-',$submenu->nama_halaman)).".html");?>"><?= $submenu->nama_submenu?></a>
                                        </li>
                                        <?php } echo "</li>"; ?>
                                    </ul>
                                    <?php } ?>
                                </li>
                                <?php }?>
                                <li>
                                    <a href="<?php echo base_url('artikel');?>">Artikel</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('galeri');?>">Galeri</a>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                        <div class="main-nav__right">
                            <!-- <a href="#" class="main-nav__search search-popup__toggler"><i
                                    class="tripo-icon-magnifying-glass"></i></a> -->
                            <!-- <a href="#" class="main-nav__login"><i class="tripo-icon-avatar"></i></a> -->
                        </div><!-- /.main-nav__right -->
                    </div>
                    <!-- /.container -->
                </nav>
            </header><!-- /.site-header -->
        </div><!-- /.site-header__header-one-wrap -->