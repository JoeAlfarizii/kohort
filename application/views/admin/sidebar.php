<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">SIM &mdash; ODGJ</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dist/index">ODGJ</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Main Menu</li>
            <li class="<?php echo $this->uri->segment(2) == 'user' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/user/user-puskesmas"><i class="fas fa-user-friends"></i> <span>User</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'puskesmas' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/puskesmas"><i class="fas fa-hospital"></i> <span>Puskesmas</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'pasien' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/pasien"><i class="fas fa-user-injured"></i> <span>Identitas ODGJ</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'perawatan' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/perawatan"><i class="fas fa-heartbeat"></i> <span>Perawatan</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'rekam-medis' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/rekam-medis"><i class="fas fa-clipboard"></i> <span>Rekam Medis</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'dokter' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/dokter"><i class="fas fa-user-md"></i> <span>Dokter</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'pasung' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/pasung"><i class="fas fa-toolbox"></i> <span>Pasung</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'obat' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/obat"><i class="fas fa-capsules"></i> <span>Obat</span></a></li>
          </ul>
        </aside>
      </div>
