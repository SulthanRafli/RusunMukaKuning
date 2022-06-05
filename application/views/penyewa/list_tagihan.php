<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Data Tagihan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>C_dashboard">Home</a></li>
                        <li class="breadcrumb-item active">List Data Tagihan</li>
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
                                        <th class="text-center">Jenis Tagihan</th>
                                        <th class="text-center">Jumlah Tagihan</th>
                                        <th class="text-center">Tanggal Jatuh Tempo</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $no = 1;
                                    foreach ($list_tagihan as $lt) {
                                        if ($lt->status == 0) {
                                            $status = "Belum Lunas";
                                        } else if ($lt->status == 1) {
                                            $status = "Sedang Diproses";
                                        } else if ($lt->status == 2) {
                                            $status = "Sudah Lunas";
                                        } else {
                                            $status = "Ditolak";
                                        }
                                        $lt->status == 0 ? $aksi = "<a type='button' href='" . base_url() . "penyewa/C_tagihan/bayar/$lt->idTagihan' class='btn btn-md btn-primary'>Bayar</a>" : $aksi = "<a type='button' href='" . base_url() . "assets/images/bukti_pembayaran/$lt->image' class='btn btn-md btn-warning text-white' download>Bukti Pembayaran</a>";
                                        echo "
                                        <tr>
                                            <td>$no</td>
                                            <td>$lt->penyewa</td>
                                            <td>$lt->jenisTagihan</td>
                                            <td>" . number_format($lt->jumlahTagihan) . "</td>                                            
                                            <td>$lt->tanggalBerlaku</td>    
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