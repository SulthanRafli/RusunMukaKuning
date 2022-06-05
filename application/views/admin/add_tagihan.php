<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Tagihan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/C_tagihan">List Data Tagihan</a></li>
                        <li class="breadcrumb-item active">Tambah Data Tagihan</li>
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
                                    <select class="form-control select2" style="width: 100%;" data-placeholder="Nama Penyewa" name="penyewa" required>
                                        <option value="">Nama Penyewa</option>
                                        <?php foreach ($list_penyewa as $lp) {
                                            echo "<option value='$lp->idPenyewa'>$lp->nama</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Tagihan</label>
                                    <select class="form-control select2" style="width: 100%;" data-placeholder="Jenis Tagihan" name="jenis_tagihan[]" id="jenis_tagihan" onchange="changeJenisTagihan()" multiple required>
                                        <option value="">Jenis Tagihan</option>
                                        <?php foreach ($list_jenis_tagihan as $ljk) {
                                            echo "<option value='$ljk->idJenisTagihan'>$ljk->nama (".number_format($ljk->harga).")</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Tagihan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" class="form-control" value="0" name="jumlah_tagihan" id="jumlah_tagihan" required readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Jatuh Tempo</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal_berlaku" required />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>admin/C_tagihan">Kembali</a>
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
    idPenyewa = undefined;    
    jenisTagihan = undefined;
</script>
<script src="<?php echo base_url('assets/js') ?>/admin_tagihan.js" type="text/javascript"></script>