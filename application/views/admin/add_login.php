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
                        <li class="breadcrumb-item active">Tambah Data Login</li>
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
                                    <label>Kategori User</label>
                                    <select class="form-control select2" style="width: 100%;" data-placeholder="Kategori" name="kategori" id="kategori" onchange="changeKategori()" required>
                                        <option value="">Kategori</option>
                                        <option value="2">Penyewa</option>
                                        <option value="3">Teknisi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>User</label>
                                    <select class="form-control select2" style="width: 100%;" data-placeholder="User" name="user" id="user" required disabled>
                                        <option value="">User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>admin/C_login">Kembali</a>
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
<script src="<?php echo base_url('assets/js') ?>/admin_login.js" type="text/javascript"></script>