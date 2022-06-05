<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Login</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/C_login">List Data Login</a></li>
                        <li class="breadcrumb-item active">Lihat Data Login</li>
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
                                    <label>Kategori User</label>
                                    <input type="text" class="form-control" value="<?php echo $data_login->kategoriLogin == 2 ? "Penyewa" : "Teknisi" ?>" placeholder="Kategori User" readonly>
                                </div>
                                <div class="form-group">
                                    <label>User</label>
                                    <input type="text" class="form-control" value="<?php echo $data_login->nama ?>" placeholder="User" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="<?php echo $data_login->username ?>" placeholder="Username" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" value="<?php echo $data_login->password ?>" placeholder="Password" readonly>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>admin/C_login">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>