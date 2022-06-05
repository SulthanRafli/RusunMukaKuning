<style>
    .container {
        margin: auto;
        max-width: 800px;
        margin-top: 150px;
    }

    .text {
        padding: 50px;
        font-family: "Sans-Serif";
        color: #666;
    }

    .inputcontainer {
        position: relative;
    }

    input {
        width: 100%;
        font-size: 20px;
        box-sizing: border-box;
    }

    .icon-container {
        position: absolute;
        right: 10px;
        top: calc(50% - 10px);
    }

    .loader {
        position: relative;
        height: 20px;
        width: 20px;
        display: inline-block;
        animation: around 5.4s infinite;
    }

    @keyframes around {
        0% {
            transform: rotate(0deg)
        }

        100% {
            transform: rotate(360deg)
        }
    }

    .loader::after,
    .loader::before {
        content: "";
        background: white;
        position: absolute;
        display: inline-block;
        width: 100%;
        height: 100%;
        border-width: 2px;
        border-color: #333 #333 transparent transparent;
        border-style: solid;
        border-radius: 20px;
        box-sizing: border-box;
        top: 0;
        left: 0;
        animation: around 0.7s ease-in-out infinite;
    }

    .loader::after {
        animation: around 0.7s ease-in-out 0.1s infinite;
        background: transparent;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>C_dashboard">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/images/profile_picture') ?>/<?php echo $this->session->photoProfile ?>" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $data_penyewa->nama ?></h3>
                            <p class="text-muted text-center"><?php echo $data_penyewa->noUnit ?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item text-center">
                                    <b>Jumlah Tagihan (Dibayar)</b>
                                </li>
                                <li class="list-group-item text-center text-success">
                                    <a><?php echo $total_paid->jumlahTagihan == NULL ? 0 : number_format($total_paid->jumlahTagihan) ?></a>
                                </li>
                                <li class="list-group-item text-center">
                                    <b>Jumlah Tagihan (Belum Dibayar)</b>
                                </li>
                                <li class="list-group-item text-center text-danger">
                                    <a><?php echo $total_unpaid->jumlahTagihan  == NULL ? 0 : number_format($total_unpaid->jumlahTagihan) ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fas fa-address-card mr-1"></i> No KTP</strong>
                            <p class="text-muted">
                                <?php echo $data_penyewa->noKtp ?>
                            </p>
                            <hr>
                            <strong><i class="fas fa-phone-alt mr-1"></i> No Handphone</strong>
                            <p class="text-muted"><?php echo $data_penyewa->noTelepon ?></p>
                            <hr>
                            <strong><i class="fas fa-bolt mr-1"></i> No Meteran Listrik</strong>
                            <p class="text-muted"><?php echo $data_penyewa->noMeteranListrik ?></p>
                            <hr>
                            <strong><i class="fa fa-tint mr-1"></i> No Meteran Air</strong>
                            <p class="text-muted"><?php echo $data_penyewa->noMeteranAir ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Aktivitas</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Ganti Password</a></li>
                                <li class="nav-item"><a class="nav-link" href="#profile_picture" data-toggle="tab">Ganti Foto Profile</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="timeline">
                                    <div class="timeline timeline-inverse">
                                        <?php foreach ($list_log as $ll) {
                                            echo '
                                            <div class="time-label">
                                                <span class="bg-danger">
                                                    ' . $ll["tanggal"] . '
                                                </span>
                                            </div>
                                            ';
                                            foreach ($ll["value"] as $ll) {
                                                $icon = "";
                                                if($ll->type == 1){
                                                    $icon = "fa fa-user-edit bg-warning text-white";
                                                }else if($ll->type == 2){
                                                    $icon = "fa fa-key bg-info";
                                                }else if($ll->type == 3){
                                                    $icon = "fa fa-plus-circle bg-primary";
                                                }else if($ll->type == 4){
                                                    $icon = "fa fa-edit bg-success";
                                                }else if($ll->type == 5){
                                                    $icon = "fa fa-coins bg-warning text-white";
                                                }else if($ll->type == 6){
                                                    $icon = "fa fa-screwdriver bg-info";
                                                }
                                                echo "
                                                <div>
                                                    <i class='$icon'></i>
                                                    <div class='timeline-item'>
                                                        <span class='time'><i class='far fa-clock'></i> $ll->waktu</span>
                                                        <h3 class='timeline-header border-0'>$ll->keterangan</h3>
                                                    </div>
                                                </div> ";
                                            }
                                        } ?>
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings">
                                    <form id="basic" class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Password Lama</label>
                                            <div class="col-sm-10">
                                                <div class="inputcontainer">
                                                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password" required>
                                                    <div class="icon-container" style="display: none;">
                                                        <i class="loader"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Password Baru</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm New Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-12">
                                                <button type="submit" class="btn btn-success">Ganti Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="profile_picture">
                                    <form id="basic-one" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Foto Profile</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file_name" id="file_name">
                                                        <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-12">
                                                <button type="button-submit" class="btn btn-success" onclick="edit()">Ganti Foto Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    baseUrl = "<?php echo base_url(); ?>";
    idLogin = "<?php echo $this->session->userdata('idLogin') ?>";
</script>
<script src="<?php echo base_url('assets/plugins') ?>/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/jquery-validation/additional-methods.min.js"></script>
<script src="<?php echo base_url('assets/js') ?>/penyewa_profile.js" type="text/javascript"></script>