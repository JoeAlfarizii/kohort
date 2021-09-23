<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('puskesmas/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active">Puskesmas</div>
              <div class="breadcrumb-item"><a href="#"><?= $title; ?></a></div>
            </div>
          </div>

          <div class="section-body">
              <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form id="form-tambah-pasung">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label><h6>Nama Pasien</h6></label>
                                            <select class="form-control select2" id="pasung-pasien" name="nama">
                                            </select>
                                            <p id="invalid-pasung-pasien" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                        <div class="form-group">
                                            <label><h6>Tanggal Penindakan</h6></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </div>
                                                </div>
                                                <input type="text" class="form-control datepicker" id="pasung-tanggal-penindakan" name="tanggal_tindakan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label><h6>Jenis Tindakan</h6></label>
                                            <select class="form-control" id="pasung-jenis-tindakan" name="jenis_tindakan">
                                                <option value="0">Pelepasan Pasung</option>
                                                <option value="1">Pemasangan Pasung</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label><h6>Alasan Penindakan</h6></label>
                                            <textarea class="form-control" required="" placeholder="Alasan ..." id="pasung-alasan"  name="alasan"></textarea>
                                            <p id="invalid-pasung-alasan" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#" class="btn btn-primary btn-block puskesmas-form-submit" id="btn-pasung-submit-form" onclick="submitFormPasung();">
                                            <h5>Submit</h5>
                                        </a>
                                    </div>
                                </div>
                                <!--close row-->
                            </div>
                        </form>
                    </div>
                </div>
              </div>
          </div>
        </section>
      </div>
<?php $this->load->view('puskesmas/footer'); ?>