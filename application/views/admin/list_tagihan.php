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
                    <a type="button" href="<?php echo base_url(); ?>admin/C_tagihan/add" href="<?php echo base_url(); ?>admin/C_tagihan/add" class="btn btn-md btn-primary">Tambah Data Tagihan</a>
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
                                            $aksi = "";
                                        } else if ($lt->status == 1) {
                                            $status = "Sedang Diproses";
                                            $aksi = "<a type='button' href='" . base_url() . "admin/C_tagihan/verifikasi/$lt->idTagihan' class='btn btn-md btn-success text-white'>Verifikasi</a>";
                                        } else if ($lt->status == 2) {
                                            $status = "Sudah Lunas";
                                            $aksi = "";
                                        } else {
                                            $status = "Ditolak";
                                            $aksi = "";
                                        }
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
                                                    <a type='button' href='" . base_url() . "admin/C_tagihan/view/$lt->idTagihan' class='btn btn-md btn-primary'>Lihat</a>
                                                    <a type='button' href='" . base_url() . "admin/C_tagihan/edit/$lt->idTagihan' class='btn btn-md btn-warning text-white'>Ubah</a>
                                                    $aksi
                                                    <button type='button' class='btn btn-md btn-danger' onclick='deleteData($lt->idTagihan)'>Hapus</button>                                                    
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
    jenisTagihan = undefined;
</script>
<script src="<?php echo base_url('assets/js') ?>/admin_tagihan.js" type="text/javascript"></script>