<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url(); ?>C_dashboard" class="brand-link">
        <img src="<?php echo base_url('assets/template/backend/dist') ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Rusun Muka Kuning</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('assets/images/profile_picture') ?>/<?php echo $this->session->photoProfile ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <p class="text-white" style="margin: 0;"><?php echo $this->session->userdata('nama') ?></p>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php if($this->session->userdata('kategoriLogin') == 1) {?>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>C_dashboard" 
                        <?php if ($classAktif == 'dashboard') {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>               
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/C_penyewa" 
                        <?php if ($classAktif == 'penyewa') {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data Penyewa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/C_teknisi" 
                        <?php if ($classAktif == 'teknisi') {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data Teknisi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/C_login" 
                        <?php if ($classAktif == 'login') {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data Login</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/C_tagihan" 
                        <?php if ($classAktif == 'tagihan') {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>Data Tagihan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/C_maintenance" 
                        <?php if ($classAktif == 'maintenance') {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Data Maintenance</p>
                    </a>
                </li>
                <li class="nav-header">Master Data</li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/C_jenis_tagihan" 
                        <?php if ($classAktif == 'jenis_tagihan') {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                        <i class="nav-icon fas fa-archive"></i>
                        <p>Data Jenis Tagihan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/C_jenis_kerusakan" 
                        <?php if ($classAktif == 'jenis_kerusakan') {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                        <i class="nav-icon fas fa-archive"></i>
                        <p>Data Jenis Kerusakan</p>
                    </a>
                </li>
                <?php } ?>
                <?php if($this->session->userdata('kategoriLogin') == 2) {?>           
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>penyewa/C_tagihan" 
                        <?php if ($classAktif == 'tagihan') {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>Data Tagihan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>penyewa/C_maintenance" 
                        <?php if ($classAktif == 'maintenance') {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Data Maintenance</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>penyewa/C_profile" 
                        <?php if ($classAktif == 'profile') {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <?php } ?>
                <?php if($this->session->userdata('kategoriLogin') == 3) {?>                  
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>maintenance/C_maintenance" 
                        <?php if ($classAktif == 'maintenance') {
                            echo 'class="nav-link active"';
                        } else {
                            echo 'class="nav-link"';
                        } ?>>
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Data Maintenance</p>
                    </a>
                </li>    
                <?php } ?>
            </ul>
        </nav>
    </div>
</aside>