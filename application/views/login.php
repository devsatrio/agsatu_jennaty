<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url("tpl_admin")?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url("tpl_admin")?>/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?= base_url("tpl_admin")?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?= base_url("tpl_admin")?>/css/style.css" rel="stylesheet">
    <link href="<?= base_url("tpl_admin")?>/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

    <div class="container">

        <form class="form-signin" method="post" action="<?= base_url("login/do_login")?>">
            <h2 class="form-signin-heading">Silahkan Masuk</h2>
            <div class="login-wrap">
                <?php
                if ($this->session->flashdata('msg')=='e'){ ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Maaf, Username atau password salah
                </div>
                <?php } ?>
                <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
                <a class="btn btn-lg btn-danger btn-block" href="<?php echo base_url();?>" style="color:white">Home</a>
            </div>

        </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= base_url("tpl_admin")?>/js/jquery.js"></script>
    <script src="<?= base_url("tpl_admin")?>/js/bootstrap.min.js"></script>


</body>

</html>