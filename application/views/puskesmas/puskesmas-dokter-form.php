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
                        <form id="form-tambah-dokter">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label><h6>Nama Dokter</h6></label>
                                            <input type="text" class="form-control" id="dokter-nama" required="" name="nama">
                                            <p id="invalid-dokter-nama" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                            <label><h6>Jabatan</h6></label>
                                            <input type="text" class="form-control" id="dokter-jabatan" required="" name="jabatan">
                                            <p id="invalid-dokter-jabatan" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#" class="btn btn-primary btn-block puskesmas-form-submit" onclick="submitFormDokter()">
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