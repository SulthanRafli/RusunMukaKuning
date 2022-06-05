<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Penyewa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/C_penyewa">List Data Penyewa</a></li>
                        <li class="breadcrumb-item active">Tambah Data Penyewa</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form id="basic">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" value="<?php echo $data_penyewa->nama ?>" name="nama" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor KTP</label>
                                    <input type="text" class="form-control" value="<?php echo $data_penyewa->noKtp ?>" name="no_ktp" placeholder="Nomor KTP" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="text" class="form-control" value="<?php echo $data_penyewa->noTelepon ?>" name="no_telp" placeholder="Nomor Telepon" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Unit</label>
                                    <input type="text" class="form-control" value="<?php echo $data_penyewa->noUnit ?>" name="no_unit" placeholder="Nomor Unit" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Meteran Listrik</label>
                                    <input type="text" class="form-control" value="<?php echo $data_penyewa->noMeteranListrik ?>" name="no_meteran_listrik" placeholder="Nomor Meteran Listrik" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Meteran Air</label>
                                    <input type="text" class="form-control" value="<?php echo $data_penyewa->noMeteranAir ?>" name="no_meteran_air" placeholder="Nomor Meteran Air" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>admin/C_penyewa">Kembali</a>
                                <button type="button-submit" class="btn btn-primary" onclick="edit(<?php echo $data_penyewa->idPenyewa ?>)">Ubah</button>
                            </div>
                        </form>
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