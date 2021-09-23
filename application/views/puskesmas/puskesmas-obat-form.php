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
                        <form id="form-tambah-obat">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label><h6>Nama Obat</h6></label>
                                            <input type="text" class="form-control" id="obat-nama" required="" name="nama_obat">
                                            <p id="invalid-obat-nama" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                        <div class="form-group">
                                            <label><h6>Komposisi Obat</h6></label>
                                            <input type="text" class="form-control" id="obat-komposisi" required="" name="komposisi">
                                            <p id="invalid-obat-komposisi" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label><h6>Kategori Obat</h6></label>
                                            <select class="form-control" id="obat-kategori" name="kategori">
                                                <option value="0">Kategori A</option>
                                                <option value="1">Kategori B</option>
                                                <option value="2">Kategori C</option>
                                                <option value="3">Kategori D</option>
                                                <option value="4">Kategori X</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label><h6>Deskripsi Umum Obat</h6></label>
                                            <textarea class="form-control" id="obat-deskripsi" required="" placeholder="Deskripsi ..." name="deskripsi"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#" class="btn btn-primary btn-block puskesmas-form-submit" id="btn-obat-submit-form" onclick="submitFormObat();">
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