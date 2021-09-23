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
                        <form id="form-tambah-perawatan">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Nama Pasien</h6>
                                            </label>
                                            <select class="form-control select2" id="perawatan-nama" name="nama">
                                            </select>
                                            <p id="invalid-perawatan-nama" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label>
                                                <h6>Alasan Perawatan</h6>
                                            </label>
                                            <textarea class="form-control" required="" placeholder="Pesan ..." id="perawatan-alasan" name="alasan"></textarea>
                                            <p id="invalid-perawatan-alasan" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Jenis Perawatan</h6>
                                            </label>
                                            <select class="form-control" id="perawatan-jenis-perawatan" name="jenis_perawatan">
                                                <option value="0">Mandiri</option>
                                                <option value="1">Rujuk</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Status Rujuk Balik</h6>
                                                    </label>
                                                    <select class="form-control" id="perawatan-status-rujuk" name="status_rujuk">
                                                        <option value="0">Non Rujukan</option>
                                                        <option value="1">Rujukan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h6>Status Kemandirian</h6>
                                                    </label>
                                                    <select class="form-control" id="perawatan-status-mandiri" name="status_kemandirian">
                                                        <option value="0">Mandiri</option>
                                                        <option value="1">Non - Mandiri</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#" class="btn btn-primary btn-block puskesmas-form-submit" id="btn-perawatan-submit-form" onclick="submitFormPerawatan()">
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