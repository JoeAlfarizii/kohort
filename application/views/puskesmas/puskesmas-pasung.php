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
                <div class="breadcrumb-item active">Pasung</div>
                <div class="breadcrumb-item"><a href="#"><?= $title; ?></a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Daftar Pasung</h3>
                                        <div style="margin-left:auto">
                                            <a href="<?= base_url() ?>puskesmas/pasung/pasung-form" class="btn btn-lg btn-primary"><i class="fas fa-plus"></i> Tambahkan Data pasung</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-puskesmas-pasung">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th>Nama Pasien</th>
                                                        <th>Jenis Tindakan</th>
                                                        <th>Tanggal Penindakan</th>
                                                        <th>Alasan Penindakan</th>
                                                        <th class="text-center" style="width:25%">Aksi</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-detail-pasung" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Detail Data Pasung</h3>
                <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-1">
                            &nbsp;
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Nama Pasien</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasung-nama"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Jenis Tindakan</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasung-jenis-tindakan"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            &nbsp;
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Tanggal Penindakan</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasung-tanggal-penindakan"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Alasan Pemasungan</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasung-alasan"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-pasung" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Edit Data Pasung</h3>
                <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <input style="display: none" type="text" class="form-control" id="edit-id-pasung">
                            <div class="form-group">
                                <label>
                                    <h6>Nama pasien</h6>
                                </label>
                                <select class="form-control selectric" id="edit-pasung-nama">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>
                                <h6>Jenis Tindakan</h6>
                            </label>
                            <select class="form-control selectric" id="edit-pasung-jenis-tindakan">
                                <option value="0">Pelepasan Pasung</option>
                                <option value="1">Pemasangan Pasung</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label>
                                    <h6>Tanggal Penindakan</h6>
                                </label>
                                <input type="text" class="form-control datepicker" id="edit-pasung-tanggal-penindakan" name="tanggal_tindakan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label>
                                    <h6>Alasan Penindakan</h6>
                                </label>
                                <textarea class="form-control" required="" placeholder="Alasan ..." id="edit-pasung-alasan" name="alasan"></textarea>
                                <p id="invalid-edit-pasung-alasan" style="color:red;display:none">*mohon diisi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="#edit-pasung-submit-form" onclick="submitEditFormPasung();">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('puskesmas/footer'); ?>