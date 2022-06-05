<?php if($this->session->userdata('status') !== true){    
    redirect(base_url());
} ?>
<?php $this->load->view('template/meta') ?>
<div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?php echo base_url('assets/template/backend/dist') ?>/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php $this->load->view('template/navbar') ?>

    <?php $this->load->view('template/sidebar') ?>

    <?php $this->load->view($page) ?>

    <?php $this->load->view('template/footer') ?>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
<?php $this->load->view('template/js') ?>
</body>
</html>