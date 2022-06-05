<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Maintenance</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>penyewa/C_maintenance">List Data Maintenance</a></li>
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
                                    <label>Penyewa</label>
                                    <input type="text" class="form-control" placeholder="Penyewa" name="penyewa" value="<?php echo $this->session->userdata('nama') ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kerusakan</label>
                                    <select class="form-control select2" style="width: 100%;" data-placeholder="Jenis Kerusakan" name="jenis_kerusakan[]" multiple required>
                                        <option value="">Jenis Kerusakan</option>
                                        <?php foreach ($list_jenis_kerusakan as $ljk) {
                                            echo "<option value='$ljk->idJenisKerusakan'>$ljk->nama</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Kerusakan</label>
                                    <input type="text" class="form-control" placeholder="Lokasi Kerusakan" name="lokasi" required>
                                </div>
                                <div class="form-group">
                                    <label>Detail Kerusakan</label>
                                    <textarea class="form-control" cols="5" rows="5" placeholder="Detail Kerusakan" name="detail" required></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>penyewa/C_maintenance">Kembali</a>
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
    jenisKerusakan = undefined;
</script>
<script src="<?php echo base_url('assets/js') ?>/penyewa_maintenance.js" type="text/javascript"></script>