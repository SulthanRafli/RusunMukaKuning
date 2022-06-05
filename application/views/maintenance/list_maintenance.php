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
                                        $lm->status == 0 ? $aksi = "<a type='button' href='" . base_url() . "maintenance/C_maintenance/verifikasi/$lm->idMaintenance' class='btn btn-md btn-primary'>Verifikasi</a>" : $aksi = "";
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
                                                $aksi                                              
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