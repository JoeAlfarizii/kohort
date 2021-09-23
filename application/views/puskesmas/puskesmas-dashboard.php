<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('puskesmas/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <!-- <div class="section-header">
      <h1><?= $title; ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">Puskesmas</div>
        <div class="breadcrumb-item"><a href="#"><?= $title; ?></a></div>
      </div>
    </div> -->

    <div class="section-body">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('<?php echo base_url(); ?>assets/img/unsplash/andre-benz-1214056-unsplash.jpg');">
            <div class="hero-inner">
              <h2>Welcome, <?= $namalengkap?>!</h2>
              <p class="lead">Untuk memperbarui data anda, silahkan klik "Setup Account"</p>
              <div class="mt-4">
                <a href="<?= base_url() ?>puskesmas/setting" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card mt-4">
            <div class="card-header">
              <h4>Data SIM - ODGJ</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col mb-4 mb-lg-0 text-center">
                  <!-- <div class="browser browser-internet-explorer"></div> -->
                  <div class="dashboard-puskesmas-icon">
                    <i class="fas fa-user-injured"></i>
                  </div>
                  <div class="mt-2 font-weight-bold">Pasien</div>
                  <div class="text-medium" id="board-puskesmas-pasien"></div>
                </div>
                <div class="col mb-4 mb-lg-0 text-center">
                  <div class="dashboard-puskesmas-icon">
                  <i class="fas fa-heartbeat"></i>
                  </div>
                  <div class="mt-2 font-weight-bold">Perawatan</div>
                  <div class="text-medium" id="board-puskesmas-perawatan"></div>
                </div>
                <div class="col mb-4 mb-lg-0 text-center">
                  <div class="dashboard-puskesmas-icon">
                  <i class="fas fa-clipboard"></i>
                  </div>
                  <div class="mt-2 font-weight-bold">Rekam Medis</div>
                  <div class="text-medium" id="board-puskesmas-rekam-medis"></div>
                </div>
                <div class="col mb-4 mb-lg-0 text-center">
                  <div class="dashboard-puskesmas-icon">
                    <i class="fas fa-user-md"></i>
                  </div>
                  <div class="mt-2 font-weight-bold">Dokter</div>
                  <div class="text-medium" id="board-puskesmas-dokter"></div>
                </div>
                <div class="col mb-4 mb-lg-0 text-center">
                  <div class="dashboard-puskesmas-icon">
                    <i class="fas fa-toolbox"></i>
                  </div>
                  <div class="mt-2 font-weight-bold">Pasung</div>
                  <div class="text-medium" id="board-puskesmas-pasung"></div>
                </div>
                <div class="col mb-4 mb-lg-0 text-center">
                  <div class="dashboard-puskesmas-icon">
                    <i class="fas fa-capsules"></i>
                  </div>
                  <div class="mt-2 font-weight-bold">Obat</div>
                  <div class="text-medium" id="board-puskesmas-obat"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('puskesmas/footer'); ?>