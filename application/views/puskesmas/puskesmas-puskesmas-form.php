<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
                        <form id="form-tambah-puskesmas">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Nama puskesmas</h6>
                                            </label>
                                            <input type="text" class="form-control" required="" name="nama" id="puskesmas-nama">
                                            <p id="invalid-puskesmas-nama" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <h6>Provinsi</h6>
                                            </label>
                                            <select class="form-control" name="provinsi" id="puskesmas-provinsi">
                                            </select>
                                            <p id="invalid-puskesmas-provinsi" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Kota</h6>
                                            </label>
                                            <select class="form-control" name="kota" id="puskesmas-kota" disabled>
                                            </select>
                                            <p id="invalid-puskesmas-kota" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <h6>Kecamatan</h6>
                                            </label>
                                            <select class="form-control" name="puskesmas-kecamatan" id="puskesmas-kecamatan" disabled>
                                            </select>
                                            <p id="invalid-puskesmas-kecamatan" style="color:red;display:none">*mohon diisi</p>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Desa</h6>
                                            </label>
                                            <select class="form-control" name="puskesmas-desa" id="puskesmas-desa" disabled>
                                            </select>
                                            <p id="invalid-puskesmas-desa" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Alamat</h6>
                                            </label>
                                            <textarea class="form-control" required="" placeholder="Masukkan alamat ..." name="alamat" id="puskesmas-alamat"></textarea>
                                            <p id="invalid-puskesmas-alamat" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#" id="btn-puskesmas-submit" class="btn btn-primary btn-block puskesmas-form-submit" onclick="submitFormPuskesmas();">
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