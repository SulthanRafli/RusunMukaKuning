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
                        <li class="breadcrumb-item active">Verifikasi Data Tagihan</li>
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
                                    <input type="text" class="form-control" data-placeholder="Nama Penyewa" value="<?php echo $data_tagihan->penyewa ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Tagihan</label>
                                    <input type="text" class="form-control" data-placeholder="Jenis Tagihan" value="<?php echo $jenis_tagihan ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Tagihan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" class="form-control" value="<?php echo $data_tagihan->jumlahTagihan ?>" disabled>
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Jatuh Tempo</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?php echo $data_tagihan->tanggalBerlaku ?>" disabled>
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Bukti Transfer</label>
                                    <div class="input-group">                                   
                                        <input type="text" class="form-control" value="<?php echo $data_tagihan->image ?>" disabled>
                                        <div class="input-group-append">
                                            <a type="button" class="btn btn-info" href="<?php echo base_url("assets/images/bukti_pembayaran/$data_tagihan->image")?>" download>Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>admin/C_tagihan">Kembali</a>
                                <button type="button" class="btn btn-warning text-white" onclick="tolak(<?php echo $data_tagihan->idTagihan ?>)">Tolak</button>
                                <button type="button" class="btn btn-primary" onclick="verifikasi(<?php echo $data_tagihan->idTagihan ?>)">Verifikasi</button>
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
<script src="<?php echo base_url('assets/js') ?>/admin_tagihan.js" type="text/javascript"></script>