<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Data Login</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>C_dashboard">Home</a></li>
                        <li class="breadcrumb-item active">List Data Login</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a type="button" href="<?php echo base_url(); ?>admin/C_login/add" href="<?php echo base_url(); ?>admin/C_login/add" class="btn btn-md btn-primary">Tambah Data Login</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10%">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Kategori User</th>
                                        <th class="text-center" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $no = 1;
                                    foreach ($list_login as $ll) {
                                        $ll->kategoriLogin == 2 ? $kategori = "Penyewa" : $kategori = "Teknisi";
                                        echo "
                                        <tr>
                                            <td>$no</td>
                                            <td>$ll->nama</td>
                                            <td>$ll->username</td>
                                            <td>$ll->password</td>
                                            <td>$kategori</td>                                            
                                            <td>
                                                <div class='btn-group-vertical'>
                                                    <a type='button' href='" . base_url() . "admin/C_login/view/$ll->idLogin' class='btn btn-md btn-primary'>Lihat</a>
                                                    <a type='button' href='" . base_url() . "admin/C_login/edit/$ll->idLogin' class='btn btn-md btn-warning text-white'>Ubah</a>
                                                    <button type='button' class='btn btn-md btn-danger' onclick='deleteData($ll->idLogin)'>Hapus</button>
                                                </div>
                                            </td>
                                        </tr>                                        
                                        ";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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