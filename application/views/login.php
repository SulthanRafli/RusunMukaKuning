<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apartemen Trilogi</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="icon" href="<?php echo base_url('assets/template/backend/dist') ?>/img/AdminLTELogo.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template/backend/dist') ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/sc-2.0.3/datatables.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>

<body class="hold-transition login-page" style="background-image: url(<?php echo base_url('assets/images/bg-login.jpeg') ?>); background-size: cover;">
    <?php if ($this->session->userdata('status') === true) {
        if ($this->session->userdata('kategoriLogin') == 2) {
            redirect(base_url('penyewa/C_tagihan'));
        } else if ($this->session->userdata('kategoriLogin') == 3) {
            redirect(base_url('maintenance/C_maintenance'));
        } else {
            redirect(base_url('C_dashboard'));
        }
    } ?>
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <p class="h2" style="margin: 0;"><b>Rusun Muka Kuning</b></p>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form id="basic">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-circle"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="button-submit" class="btn btn-primary btn-block" onclick="login()">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        baseUrl = "<?php echo base_url(); ?>";
    </script>
    <script src="<?php echo base_url('assets/js') ?>/login.js" type="text/javascript"></script>
    <?php $this->load->view('template/js') ?>
</body>

</html>