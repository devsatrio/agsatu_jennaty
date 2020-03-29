<?php
$sesi =$this->session->userdata('login');
?>
<section id="main-content">
    <section class="wrapper">
        <div class="bio-graph-heading">
            <h3>Selamat Datang <?= $sesi['level']?> <?= $sesi['user']?></h3>
        </div>
        <br>
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol blue">
                        <i class="icon-user"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count4"><?php echo $jumlah_user;?></h1>
                        <p>User</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol terques">
                        <i class="icon-desktop"></i>
                    </div>
                    <div class="value">
                        <h1 class="count"><?php echo $jumlah_halaman?></h1>
                        <p>Halaman</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol red">
                        <i class="icon-camera"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count2"><?php echo $jumlah_galeri?></h1>
                        <p>Gambar Galeri</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol yellow">
                        <i class="icon-pencil"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count3"><?php echo $jumlah_artikel?></h1>
                        <p>Artikel</p>
                    </div>
                </section>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6">
                <section class="panel">
                    <div class="panel-body">
                        <div class="task-thumb-details">
                            <h1><a href="#">Website Haji</a></h1>
                            <p>List Data Content</p>
                        </div>
                    </div>
                    <table class="table table-hover personal-task">
                        <tbody>
                            <tr>
                                <td>
                                    <i class=" icon-desktop"></i>
                                </td>
                                <td>Jumlah Halaman</td>
                                <td><?php echo $jumlah_halaman_haji?></td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="icon-pencil"></i>
                                </td>
                                <td>Jumlah Artikel</td>
                                <td><?php echo $jumlah_artikel_haji?></td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="icon-camera"></i>
                                </td>
                                <td>Gambar Galeri</td>
                                <td><?php echo $jumlah_galeri_haji?></td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </div>
            <div class="col-lg-6">
                <section class="panel">
                    <div class="panel-body">
                        <div class="task-thumb-details">
                            <h1><a href="#">Website Travel</a></h1>
                            <p>List Data Content</p>
                        </div>
                    </div>
                    <table class="table table-hover personal-task">
                        <tbody>
                            <tr>
                                <td>
                                    <i class=" icon-desktop"></i>
                                </td>
                                <td>Jumlah Halaman</td>
                                <td><?php echo $jumlah_halaman_travel?></td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="icon-pencil"></i>
                                </td>
                                <td>Jumlah Artikel</td>
                                <td><?php echo $jumlah_artikel_travel?></td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="icon-camera"></i>
                                </td>
                                <td>Gambar Galeri</td>
                                <td><?php echo $jumlah_galeri_travel?></td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <!--user info table end-->
            </div>
        </div>
    </section>
</section>