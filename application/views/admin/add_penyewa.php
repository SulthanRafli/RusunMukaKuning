<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Maintenance</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/C_penyewa">List Data Maintenance</a></li>
                        <li class="breadcrumb-item active">Tambah Data Maintenance</li>
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
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor KTP</label>
                                    <input type="text" class="form-control" placeholder="Nomor KTP" name="no_ktp" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="text" class="form-control" placeholder="Nomor Telepon" name="no_telp" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Unit</label>
                                    <input type="text" class="form-control" placeholder="Nomor Unit" name="no_unit" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Meteran Listrik</label>
                                    <input type="text" class="form-control" placeholder="Nomor Meteran Listrik" name="no_meteran_listrik" required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Meteran Air</label>
                                    <input type="text" class="form-control" placeholder="Nomor Meteran Air" name="no_meteran_air" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>admin/C_penyewa">Kembali</a>
                                <button type="button-submit" class="btn btn-primary" onclick="save()">Simpan</button>
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