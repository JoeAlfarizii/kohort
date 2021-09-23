<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item <?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
              <a href="<?= base_url()?>puskesmas/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <!-- <li class="nav-item <?php echo $this->uri->segment(2) == 'puskesmas' ? 'active' : ''; ?>">
              <a href="<?= base_url()?>puskesmas/puskesmas" class="nav-link"><i class="fas fa-hospital"></i><span>Puskesmas</span></a>
            </li> -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'pasien' ? 'active' : ''; ?>">
              <a href="<?= base_url()?>puskesmas/pasien" class="nav-link"><i class="fas fa-user-injured"></i><span>Pasien</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'perawatan' ? 'active' : ''; ?>">
              <a href="<?= base_url()?>puskesmas/perawatan" class="nav-link"><i class="fas fa-heartbeat"></i><span>Perawatan</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'rekam-medis' ? 'active' : ''; ?>">
              <a href="<?= base_url()?>puskesmas/rekam-medis" class="nav-link"><i class="fas fa-clipboard"></i><span>Rekam Medis</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'dokter' ? 'active' : ''; ?>">
              <a href="<?= base_url()?>puskesmas/dokter" class="nav-link"><i class="fas fa-user-md"></i><span>Dokter</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'pasung' ? 'active' : ''; ?>">
              <a href="<?= base_url()?>puskesmas/pasung" class="nav-link"><i class="fas fa-toolbox"></i><span>Pasung</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'obat' ? 'active' : ''; ?>">
              <a href="<?= base_url()?>puskesmas/obat" class="nav-link"><i class="fas fa-capsules"></i><span>Obat</span></a>
            </li>
          </ul>
        </div>
      </nav>
