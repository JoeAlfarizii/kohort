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
                <div class="breadcrumb-item active">Obat</div>
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
                                        <h3>Daftar Obat</h3>
                                        <div style="margin-left:auto">
                                            <a href="<?= base_url() ?>puskesmas/obat/obat-form" class="btn btn-lg btn-primary"><i class="fas fa-plus"></i> Tambahkan Data obat</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-puskesmas-obat">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th>Nama Obat</th>
                                                        <th>Kategori Obat</th>
                                                        <th>Komposisi Obat</th>
                                                        <th>Deskripsi</th>
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

<div class="modal fade" id="modal-detail-obat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Detail Data Obat</h3>
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
                                    <h5>Nama Obat</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-obat-nama"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Kategori Obat</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-obat-kategori"></div>
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
                                    <h5>Komposisi</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-obat-komposisi"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Deskripsi Obat</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-obat-deskripsi"></div>
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

<div class="modal fade" id="modal-edit-obat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Edit Data Obat</h3>
                <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <input style="display: none" type="text" class="form-control" id="edit-id-obat">
                            <div class="form-group">
                                <label>
                                    <h6>Nama Obat</h6>
                                </label>
                                <input type="text" class="form-control" id="edit-obat-nama" required="" name="nama_obat">
                                <p id="invalid-edit-obat-nama" style="color:red;display:none">*mohon diisi</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>
                                <h6>Kategori Obat</h6>
                            </label>
                            <select class="form-control selectric" id="edit-obat-kategori" name="kategori">
                                <option value="0">Kategori A</option>
                                <option value="1">Kategori B</option>
                                <option value="2">Kategori C</option>
                                <option value="3">Kategori D</option>
                                <option value="4">Kategori X</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label>
                                    <h6>Komposisi Obat</h6>
                                </label>
                                <input type="text" class="form-control" id="edit-obat-komposisi" required="" name="komposisi">
                                <p id="invalid-edit-obat-komposisi" style="color:red;display:none">*mohon diisi</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label>
                                    <h6>Deskripsi Umum Obat</h6>
                                </label>
                                <textarea class="form-control" id="edit-obat-deskripsi" required="" placeholder="Deskripsi ..." name="deskripsi"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="#edit-obat-submit-form" onclick="submitEditFormObat();">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('puskesmas/footer'); ?>