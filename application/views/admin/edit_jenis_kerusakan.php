<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Jenis Kerusakan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/C_jenis_kerusakan">List Data Jenis Kerusakan</a></li>
                        <li class="breadcrumb-item active">Ubah Data Jenis Kerusakan</li>
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
                                    <input type="text" class="form-control" placeholder="Nama" value="<?php echo $data_jenis_kerusakan->nama ?>" name="nama" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>admin/C_jenis_kerusakan">Kembali</a>
                                <button type="button-submit" class="btn btn-primary" onclick="edit(<?php echo $data_jenis_kerusakan->idJenisKerusakan ?>)">Ubah</button>
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
<script src="<?php echo base_url('assets/js') ?>/admin_jenis_kerusakan.js" type="text/javascript"></script>