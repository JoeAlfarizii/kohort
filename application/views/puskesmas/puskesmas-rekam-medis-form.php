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
                        <form id="form-add-rekam-medis">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Nama Pasien</h6>
                                            </label>
                                            <select class="form-control select2" name="id_pasien" id="rekam-medis-pasien">
                                            </select>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label>
                                                <h6>Diagnosis Perawatan</h6>
                                            </label>
                                            <textarea class="form-control" placeholder="Pesan ..." name="diagnosis" id="rekam-medis-diagnosis"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Nama Dokter</h6>
                                            </label>
                                            <select class="form-control select2" name="id_dokter" id="rekam-medis-dokter">
                                            </select>
                                        </div>
                                        <div class="row" id="form-obat">
                                            <!-- <div class="col-7 col-md-7 col-lg-7">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Jenis Obat</h6>
                                                    </label>
                                                    <select class="form-control select2" id="medis-daftar-obat" name="id_obat[]">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3 col-md-3 col-lg-3">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Jumlah Obat</h6>
                                                    </label>
                                                    <input type="number" class="form-control" name="jumlah[]" value="0">
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <a href="#" class="btn btn-success btn-block puskesmas-tambah-obat" id="button-tambah-obat">
                                                    <i class="fas fa-plus-square"></i>
                                                    <span>Tambahkan Form Obat</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#" class="btn btn-primary btn-block puskesmas-form-submit" onclick="submitFormRekamMedis();">
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