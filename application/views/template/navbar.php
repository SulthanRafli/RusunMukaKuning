<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <?php if ($this->session->userdata('kategoriLogin') == 2) {
                $tagihan  = $this->M_tagihan->getTagihanJatuhTempo(); ?>
                <a class="nav-link" data-toggle="dropdown">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-danger navbar-badge"><?php echo count($tagihan) ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">Tagihan Jatuh Tempo</span>
                    <?php $no = 1;                    
                    foreach ($tagihan as $t) {                        
                        echo "
                        <div class='dropdown-divider'></div>
                            <a href='".base_url()."penyewa/C_tagihan/bayar/$t->idTagihan' class='dropdown-item'>
                                <i class='fas fa-coins mr-2'></i> Tagihan $no (".number_format($t->jumlahTagihan).")
                                <span class='float-right text-muted text-sm'>$t->tanggalBerlaku</span>
                            </a>
                        <div class='dropdown-divider'></div>
                        ";
                        $no++;
                    }
                    ?>
                </div>
            <?php } ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>C_login/logout" role="button">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>