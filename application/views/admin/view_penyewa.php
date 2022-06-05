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
                        <li class="breadcrumb-item active">Lihat Data Penyewa</li>
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
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" value="<?php echo $data_penyewa->nama ?>" placeholder="Nama Lengkap" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Nomor KTP</label>
                                    <input type="text" class="form-control" value="<?php echo $data_penyewa->noKtp ?>" placeholder="Nomor KTP" disabled>
                                </div>                                
                                <div class="form-group">
                                    <label>Nomor Unit</label>
                                    <input type="text" class="form-control" value="<?php echo $data_penyewa->noUnit ?>" placeholder="Nomor Unit" disabled>
                                </div>                                
                                <div class="form-group">
                                    <label>Nomor Meteran Listrik</label>
                                    <input type="text" class="form-control" value="<?php echo $data_penyewa->noMeteranListrik ?>" placeholder="Nomor Meteran Listrik" disabled>
                                </div>  
                                <div class="form-group">
                                    <label>Nomor Meteran Air</label>
                                    <input type="text" class="form-control" value="<?php echo $data_penyewa->noMeteranAir ?>" placeholder="Nomor Meteran Air" disabled>
                                </div>                                                                                          
                            </div>
                            <div class="card-footer text-right">
                                <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>admin/C_penyewa">Kembali</a>                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>