<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- JS Untuk Puskesmas SIM ODGJ -->
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script> -->
  <!-- <script src="<?php echo base_url(); ?>assets/modules/popper.js"></script> -->
  <!-- <script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
<?php
if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "dashboard") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <?php
}elseif ($this->uri->segment(1) == "puskesmas") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <!-- <script src="assets/js/page/forms-advanced-forms.js"></script> -->
<?php
}elseif ($this->uri->segment(1) == "puskesmas") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<?php
} ?>

  <!-- Page Specific JS File -->
<?php
if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "dashboard") { ?>
  <script src="<?php echo base_url(); ?>assets/js/admin/dashboard.js"></script>
<?php
}?>

  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>


  <!-- Custom Untuk Page Tertentu -->
  <?php
if($this->uri->segment(2) == "puskesmas"){ ?>
  <script src="<?php echo base_url(); ?>assets/js/puskesmas/puskesmas-custom.js"></script>
<?php } elseif ($this->uri->segment(2) == "dashboard"){?>
  <script src="<?php echo base_url(); ?>assets/js/puskesmas/dashboard-puskesmas.js"></script>
<?php } elseif ($this->uri->segment(2) == "pasien"){?>
  <script src="<?php echo base_url(); ?>assets/js/puskesmas/pasien-custom.js"></script>
<?php } elseif ($this->uri->segment(2) == "perawatan"){?>
  <script src="<?php echo base_url(); ?>assets/js/puskesmas/perawatan-custom.js"></script>
<?php } elseif ($this->uri->segment(2) == "rekam-medis"){?>
  <script src="<?php echo base_url(); ?>assets/js/puskesmas/rekam-medis-custom.js"></script>
<?php } elseif ($this->uri->segment(2) == "dokter"){?>
  <script src="<?php echo base_url(); ?>assets/js/puskesmas/dokter-custom.js"></script>
<?php } elseif ($this->uri->segment(2) == "pasung"){?>
  <script src="<?php echo base_url(); ?>assets/js/puskesmas/pasung-custom.js"></script>
<?php } elseif ($this->uri->segment(2) == "obat"){?>
  <script src="<?php echo base_url(); ?>assets/js/puskesmas/obat-custom.js"></script>
  <?php } elseif ($this->uri->segment(2) == "setting"){?>
  <script src="<?php echo base_url(); ?>assets/js/puskesmas/account-custom.js"></script>
<?php } ?>
</body>
</html>