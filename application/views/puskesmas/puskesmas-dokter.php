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
                <div class="breadcrumb-item active">Dokter</div>
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
                                        <h3>Daftar Dokter</h3>
                                        <div style="margin-left:auto">
                                            <a href="<?= base_url() ?>puskesmas/dokter/dokter-form" class="btn btn-lg btn-primary"><i class="fas fa-plus"></i> Tambahkan Data Dokter</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-puskesmas-dokter">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th>Nama Dokter</th>
                                                        <th>Jabatan</th>
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

<div class="modal fade" id="modal-detail-dokter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Detail Data Dokter</h3>
                <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Nama Dokter</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-dokter-nama"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Jabatan</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-dokter-jabatan"></div>
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

<div class="modal fade" id="modal-edit-dokter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Edit Data Dokter</h3>
                <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <input style="display: none" type="text" class="form-control" id="edit-id-dokter">
                            <div class="form-group">
                                <label>
                                    <h6>Nama Dokter</h6>
                                </label>
                                <input type="text" class="form-control" id="edit-dokter-nama" required="" name="nama">
                                <p id="invalid-edit-dokter-nama" style="color:red;display:none">*mohon diisi</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>
                                <h6>Jabatan</h6>
                            </label>
                            <input type="text" class="form-control" id="edit-dokter-jabatan" required="" name="jabatan">
                            <p id="invalid-edit-dokter-jabatan" style="color:red;display:none">*mohon diisi</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="#edit-dokter-submit-form" onclick="submitEditFormDokter();">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('puskesmas/footer'); ?>