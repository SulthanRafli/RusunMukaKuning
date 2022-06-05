<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Data Maintenance</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>C_dashboard">Home</a></li>
                        <li class="breadcrumb-item active">List Data Maintenance</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a type="button" href="<?php echo base_url(); ?>admin/C_maintenance/add" href="<?php echo base_url(); ?>admin/C_maintenance/add" class="btn btn-md btn-primary">Tambah Data Maintenance</a>
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
                                        <th class="text-center">Penyewa</th>
                                        <th class="text-center">Jenis Kerusakan</th>
                                        <th class="text-center">Lokasi Kerusakan</th>
                                        <th class="text-center">Detail Kerusakan</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $no = 1;
                                    foreach ($list_maintenance as $lm) {
                                        $lm->status == 0 ? $status = "Belum Diperbaiki" : $status = "Sudah Diperbaiki";
                                        echo "
                                        <tr>
                                            <td>$no</td>
                                            <td>$lm->penyewa</td>
                                            <td>$lm->jenisKerusakan</td>
                                            <td>$lm->lokasi</td>
                                            <td>$lm->detail</td>
                                            <td>$lm->keterangan</td>
                                            <td>$status</td>                                            
                                            <td>
                                                <div class='btn-group-vertical'>
                                                    <a type='button' href='" . base_url() . "admin/C_maintenance/view/$lm->idMaintenance' class='btn btn-md btn-primary'>Lihat</a>
                                                    <a type='button' href='" . base_url() . "admin/C_maintenance/edit/$lm->idMaintenance' class='btn btn-md btn-warning text-white'>Ubah</a>
                                                    <button type='button' class='btn btn-md btn-danger' onclick='deleteData($lm->idMaintenance)'>Hapus</button>
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
    idPenyewa = undefined;    
    jenisKerusakan = undefined;
</script>
<script src="<?php echo base_url('assets/js') ?>/admin_maintenance.js" type="text/javascript"></script>