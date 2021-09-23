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
                <div class="breadcrumb-item active">Perawatan</div>
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
                                        <h3>Daftar Perawatan</h3>
                                        <div style="margin-left:auto">
                                            <a href="<?= base_url() ?>puskesmas/perawatan/perawatan-form" class="btn btn-lg btn-primary"><i class="fas fa-plus"></i> Tambahkan Data Perawatan</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-puskesmas-perawatan">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th>Nama Pasien</th>
                                                        <th>Jenis Perawatan</th>
                                                        <th class="text-center">Alasan Perawatan</th>
                                                        <th>Status Rujuk Balik</th>
                                                        <th>Status Kemandirian</th>
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

<div class="modal fade" id="modal-detail-perawatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Detail Data Perawatan</h3>
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
                                    <div id="detail-perawatan-nama"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>jenis Perawatan</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-perawatan-jenis"></div>
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
                                    <h5>Status Kemandirian</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-perawatan-status-kemandirian"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Status Rujuk Balik</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-perawatan-status-rujuk"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            &nbsp;
                        </div>
                        <div class="col-md-11">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Alasan Perawatan</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-perawatan-alasan"></div>
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

<div class="modal fade" id="modal-edit-perawatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Edit Data Perawatan</h3>
                <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <input style="display: none" type="text" class="form-control" id="edit-id-perawatan">
                            <div class="form-group">
                                <label>
                                    <h6>Nama pasien</h6>
                                </label>
                                <select class="form-control selectric" id="edit-perawatan-nama">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>
                                <h6>Jenis Perawatan</h6>
                            </label>
                            <select class="form-control selectric" id="edit-perawatan-jenis" name="jenis_perawatan">
                                <option value="0">Mandiri</option>
                                <option value="1">Rujuk</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label>
                                    <h6>Alasan Perawatan</h6>
                                </label>
                                <textarea class="form-control" required="" placeholder="Pesan ..." id="edit-perawatan-alasan" name="alasan"></textarea>
                                <p id="invalid-edit-perawatan-alasan" style="color:red;display:none">*mohon diisi</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    <h6>Status Rujuk Balik</h6>
                                </label>
                                <select class="form-control selectric" id="edit-perawatan-status-rujuk" name="status_rujuk">
                                    <option value="0">Non Rujukan</option>
                                    <option value="1">Rujukan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    <h6>Status Kemandirian</h6>
                                </label>
                                <select class="form-control selectric" id="edit-perawatan-status-mandiri" name="status_kemandirian">
                                    <option value="0">Mandiri</option>
                                    <option value="1">Non - Mandiri</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="#edit-perawatan-submit-form" onclick="submitEditFormPerawatan();">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('puskesmas/footer'); ?>