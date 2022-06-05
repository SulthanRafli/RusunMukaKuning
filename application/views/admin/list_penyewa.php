<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Data Penyewa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>C_dashboard">Home</a></li>
                        <li class="breadcrumb-item active">List Data Penyewa</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a type="button" href="<?php echo base_url(); ?>admin/C_penyewa/add" href="<?php echo base_url(); ?>admin/C_penyewa/add" class="btn btn-md btn-primary">Tambah Data Penyewa</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10%">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">No KTP</th>
                                        <th class="text-center">No Telepon</th>
                                        <th class="text-center">No Unit</th>
                                        <th class="text-center">No Meteran Listrik</th>
                                        <th class="text-center">No Meteran Air</th>
                                        <th class="text-center" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $no = 1;
                                    foreach ($list_penyewa as $lp) {
                                        echo "
                                        <tr>
                                            <td>$no</td>
                                            <td>$lp->nama</td>
                                            <td>$lp->noKtp</td>
                                            <td>$lp->noTelepon</td>
                                            <td>$lp->noUnit</td>
                                            <td>$lp->noMeteranListrik</td>
                                            <td>$lp->noMeteranAir</td>                                            
                                            <td>
                                                <div class='btn-group-vertical'>
                                                    <a type='button' href='" . base_url() . "admin/C_penyewa/view/$lp->idPenyewa' class='btn btn-md btn-primary'>Lihat</a>
                                                    <a type='button' href='" . base_url() . "admin/C_penyewa/edit/$lp->idPenyewa' class='btn btn-md btn-warning text-white'>Ubah</a>
                                                    <button type='button' class='btn btn-md btn-danger' onclick='deleteData($lp->idPenyewa)'>Hapus</button>
                                                </div>
                                            </td>
                                        </tr>                                        
                                        ";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    baseUrl = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url('assets/js') ?>/admin_penyewa.js" type="text/javascript"></script>