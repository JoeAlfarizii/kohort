<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Daftar Puskesmas terdaftar</h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>Filter Bulan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                        </div>
                        <input type="text" placeholder="select date ..." class="form-control picker-month" id="filter-pusat-tanggal-puskesmas">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label>
                        Provinsi
                    </label>
                    <select class="form-control select2" id="filter-pusat-provinsi-puskesmas">
                        <option value="0">Tidak Ada</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 pt-4">
                <button class="btn btn-icon icon-left btn-primary" style="margin-top: 8px" onclick="cariDataPuskesmasPusat();"><i class='fas fa-search'></i> Cari</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Puskesmas</h4>
                        <div style="margin-left:auto">
                            <a href="<?=base_url()."admin/puskesmas/puskesmas-form"?>" class="btn btn-lg btn-primary"><i class="fas fa-plus"></i> Tambahkan Data Puskesmas</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-pusat-puskesmas">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th class="text-center">Nama Puskesmas</th>
                                        <th class="text-center">Provinsi</th>
                                        <th class="text-center">Kota</th>
                                        <th class="text-center">Kecamatan</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center" style="width:28%">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-detail-pusat-puskesmas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Detail Data Puskesmas</h3>
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
                                    <h5>Nama Puskesmas</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-puskesmas-pusat-nama"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Provinsi</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-puskesmas-pusat-provinsi"></div>
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
                                    <h5>Kota</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-puskesmas-pusat-kota"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Kecamatan</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-puskesmas-pusat-kecamatan"></div>
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
                                    <h5>Desa</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-puskesmas-pusat-desa"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Alamat</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-puskesmas-pusat-alamat"></div>
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

<div class="modal fade" id="modal-edit-pusat-puskesmas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Edit Data Puskesmas</h3>
                <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <input style="display: none" type="text" class="form-control" id="edit-id-pusat-puskesmas">
                            <div class="form-group">
                                <label>
                                    <h6>Nama Puskesmas</h6>
                                </label>
                                <input type="text" class="form-control" id="edit-pusat-puskesmas-nama" name="nama" required="">
                                <p id="invalid-edit-pusat-puskesmas-nama" style="color:red;display:none">*mohon diisi</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <h6>Provinsi</h6>
                                </label>
                                <select class="form-control selectric" name="puskesmas" id="edit-pusat-puskesmas-provinsi">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <h6>Kota</h6>
                                </label>
                                <select class="form-control selectric" name="puskesmas" id="edit-pusat-puskesmas-kota">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <h6>Kecamatan</h6>
                                </label>
                                <select class="form-control selectric" name="puskesmas" id="edit-pusat-puskesmas-kecamatan">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <h6>Desa</h6>
                                </label>
                                <select class="form-control selectric" name="puskesmas" id="edit-pusat-puskesmas-desa">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <h6>Alamat</h6>
                                </label>
                                <input type="text" class="form-control" id="edit-pusat-puskesmas-alamat" name="alamat" required="">
                                <p id="invalid-edit-pusat-puskesmas-alamat" style="color:red;display:none">*mohon diisi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="#edit-pusat-puskesmas-submit-form" onclick="submitEditFormPuskesmas();">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/footer'); ?>