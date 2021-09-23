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
                        <form id="form-tambah-pasien">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Nama pasien</h6>
                                            </label>
                                            <input type="text" class="form-control" id="pasien-nama" name="nama" required="">
                                            <p id="invalid-pasien-nama" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Tanggal Lahir</h6>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control datepicker" id="pasien-tanggal-lahir" name="tanggal-lahir">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Jenis Kelamin</h6>
                                                    </label>
                                                    <select class="form-control" id="pasien-jenis-kelamin" name="jenis-kelamin">
                                                        <option value="pria">Pria</option>
                                                        <option value="wanita">Wanita</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Status JKN</h6>
                                                    </label>
                                                    <select class="form-control" id="pasien-status-jkn" name="status_jkn">
                                                        <option value="0">Non JKN</option>
                                                        <option value="1">JKN</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Status Pengobatan</h6>
                                                    </label>
                                                    <select class="form-control" id="pasien-status-pengobatan" name="status-pengobatan">
                                                        <option value="1">Aktif Pengobatan</option>
                                                        <option value="0">Putus Obat</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <h6>Status Pasien</h6>
                                            </label>
                                            <select class="form-control" id="pasien-status-pasien" name="status-pasien">
                                                <option value="1">Sehat</option>
                                                <option value="0">Meninggal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Alamat</h6>
                                            </label>
                                            <input type="text" class="form-control" id="pasien-alamat" name="alamat" required="">
                                            <p id="invalid-pasien-alamat" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>RT</h6>
                                                    </label>
                                                    <input type="text" class="form-control" id="pasien-rt" name="rt" required="">
                                                    <p id="invalid-pasien-rt" style="color:red;display:none">*mohon diisi</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>RW</h6>
                                                    </label>
                                                    <input type="text" class="form-control" id="pasien-rw" name="rw" required="">
                                                    <p id="invalid-pasien-rw" style="color:red;display:none">*mohon diisi</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Provinsi</h6>
                                                    </label>
                                                    <select class="form-control" name="provinsi" id="pasien-provinsi">
                                                    </select>
                                                    <p id="invalid-pasien-provinsi" style="color:red;display:none">*mohon diisi</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Kota</h6>
                                                    </label>
                                                    <select class="form-control" name="kota" id="pasien-kota" disabled>
                                                    </select>
                                                    <p id="invalid-pasien-kota" style="color:red;display:none">*mohon diisi</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Kecamatan</h6>
                                                    </label>
                                                    <select class="form-control" name="kecamatan" id="pasien-kecamatan" disabled>
                                                    </select>
                                                    <p id="invalid-pasien-kecamatan" style="color:red;display:none">*mohon diisi</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Desa</h6>
                                                    </label>
                                                    <select class="form-control" name="desa" id="pasien-desa" disabled>
                                                    </select>
                                                    <p id="invalid-pasien-desa" style="color:red;display:none">*mohon diisi</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--close row-->
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#" class="btn btn-primary btn-block puskesmas-form-submit" id="btn-pasien-submit-form" onclick="submitFormPasien()">
                                            <h5>Submit</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--close card-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('puskesmas/footer'); ?>