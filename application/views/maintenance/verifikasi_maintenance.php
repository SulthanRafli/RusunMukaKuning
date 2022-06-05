<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Maintenance</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>maintenance/C_maintenance">List Data Maintenance</a></li>
                        <button type="submit" class="btn btn-primary">Verifikasi</button>
                        <li class="breadcrumb-item active">Lihat Data Maintenance</li>
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
                                    <label>Penyewa</label>
                                    <input type="text" class="form-control" value="<?php echo $data_maintenance->penyewa ?>" placeholder="Nama Penyewa" disabled>
                                    <input type="hidden" class="form-control" value="<?php echo $data_maintenance->idPenyewa ?>"  name="idPenyewa">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kerusakan</label>
                                    <input type="text" class="form-control" value="<?php echo $jenis_kerusakan ?>" placeholder="Jenis Kerusakan" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Kerusakan</label>
                                    <input type="text" class="form-control" value="<?php echo $data_maintenance->lokasi ?>" placeholder="Lokasi Kerusakan" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Detail Kerusakan</label>
                                    <textarea class="form-control" cols="5" rows="5" placeholder="Detail Kerusakan" disabled><?php echo $data_maintenance->detail ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" cols="5" rows="5" placeholder="Keterangan" name="keterangan"></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>maintenance/C_maintenance">Kembali</a>
                                <button type="button-submit" class="btn btn-primary" onclick="verifikasi(<?php echo $data_maintenance->idMaintenance ?>)">Verifikasi</button>
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
<script src="<?php echo base_url('assets/js') ?>/teknisi_maintenance.js" type="text/javascript"></script>