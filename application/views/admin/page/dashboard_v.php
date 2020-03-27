<?php
$sesi =$this->session->userdata('login');
?>
<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Dashboard
            </header>
            <div class="panel-body">
                <div class="bio-graph-heading">
                    Selamat Datang <?= $sesi['level']?> <?= $sesi['user']?>
                </div>
            </div>
            </div>
        </section>
    </section>
</section>