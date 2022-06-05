<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-6">
          <div class="small-box bg-info" style="height: 150px;">
            <div class="inner">
              <h3><?php echo $total1->total ? $total1->total : 0 ?></h3>
              <p>Total Data Penyewa</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-friends"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <div class="small-box bg-success" style="height: 150px;">
            <div class="inner">
              <h3><?php echo $total2->total ? $total2->total : 0 ?></h3>
              <p>Total Data Teknisi</p>
            </div>
            <div class="icon">
              <i class="fa fa-users-cog"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <div class="small-box bg-warning" style="height: 150px;">
            <div class="inner">
              <h3 class="text-white"><?php echo $total3->total ? number_format($total3->total) : 0 ?></h3>
              <p class="text-white">Total Jumlah Tagihan</p>
            </div>
            <div class="icon">
              <i class="fa fa-coins"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form id="basic">
            <div class="input-group">
              <input type="search" class="form-control form-control-lg" placeholder="Cari nama penyewa" id="searchType">
              <div class="input-group-append">
                <button type="button-submit" class="btn btn-lg btn-default" onclick="search()">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12">
          <div class="list-group" id="data-item">                    
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
    baseUrl = "<?php echo base_url(); ?>";  
    baseUrlImage = "<?php echo base_url("assets/images/profile_picture"); ?>";    
</script>
<script src="<?php echo base_url('assets/js') ?>/dashboard.js" type="text/javascript"></script>