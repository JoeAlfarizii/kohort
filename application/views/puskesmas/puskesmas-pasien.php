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
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Daftar Pasien</h3>
                                        <div style="margin-left:auto">
                                            <a href="<?= base_url() ?>puskesmas/pasien/pasien-form" class="btn btn-lg btn-primary"><i class="fas fa-plus"></i> Tambahkan Data Pasien</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-puskesmas-pasien">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th>Nama Pasien</th>
                                                        <th>Tempat Dirawat</th>
                                                        <th>Alamat Pasien</th>
                                                        <th>Status JKN</th>
                                                        <th>Status Pasien</th>
                                                        <th class="text-center">Aksi</th>
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

<div class="modal fade" id="modal-detail-pasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Detail Data Pasien</h3>
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
                                    <div id="detail-pasien-nama"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Tempat Dirawat</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasien-puskesmas"></div>
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
                                    <h5>Jenis Kelamin</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasien-jenis-kelamin"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Tanggal Lahir</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasien-tanggal-lahir"></div>
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
                                    <h5>Alamat</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasien-alamat"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Kota</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasien-kota"></div>
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
                                    <h5>RT</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasien-rt"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>RW</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasien-rw"></div>
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
                                    <h5>Kecamatan</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasien-kecamatan"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Desa</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasien-desa"></div>
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
                                    <h5>Provinsi</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasien-provinsi"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Status JKN</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasien-status-jkn"></div>
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
                                    <h5>Status Pengobatan</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-pasien-status-pengobatan"></div>
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

<div class="modal fade" id="modal-edit-pasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Edit Data Pasien</h3>
                <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <input style="display: none" type="text" class="form-control" id="edit-id-pasien">
                            <div class="form-group">
                                <label>
                                    <h6>Nama pasien</h6>
                                </label>
                                <input type="text" class="form-control" id="edit-pasien-nama" name="nama" required="">
                                <p id="invalid-edit-pasien-nama" style="color:red;display:none">*mohon diisi</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <h6>Alamat</h6>
                                </label>
                                <input type="text" class="form-control" id="edit-pasien-alamat" name="alamat" required="">
                                <p id="invalid-edit-pasien-alamat" style="color:red;display:none">*mohon diisi</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
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
                                    <input type="text" class="form-control datepicker" id="edit-pasien-tanggal-lahir" name="tanggal-lahir">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    <h6>Jenis Kelamin</h6>
                                </label>
                                <select class="form-control selectric" id="edit-pasien-jenis-kelamin" name="jenis-kelamin">
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    <h6>RT</h6>
                                </label>
                                <input type="text" class="form-control" id="edit-pasien-rt" name="rt" required="">
                                <p id="invalid-edit-pasien-rt" style="color:red;display:none">*mohon diisi</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    <h6>RW</h6>
                                </label>
                                <input type="text" class="form-control" id="edit-pasien-rw" name="rw" required="">
                                <p id="invalid-edit-pasien-rw" style="color:red;display:none">*mohon diisi</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <h6>Status JKN</h6>
                                </label>
                                <select class="form-control selectric" id="edit-pasien-status-jkn" name="status_jkn">
                                    <option value="0">Non JKN</option>
                                    <option value="1">JKN</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    <h6>Provinsi</h6>
                                </label>
                                <select class="form-control selectric" name="provinsi" id="edit-pasien-provinsi">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    <h6>Kota</h6>
                                </label>
                                <select class="form-control selectric" name="kota" id="edit-pasien-kota">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <h6>Status Pengobatan</h6>
                                </label>
                                <select class="form-control selectric" id="edit-pasien-status-pengobatan" name="status-pengobatan">
                                    <option value="1">Aktif Pengobatan</option>
                                    <option value="0">Putus Obat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <h6>Kecamatan</h6>
                                </label>
                                <select class="form-control selectric" name="kecamatan" id="edit-pasien-kecamatan">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <h6>Status Pasien</h6>
                                </label>
                                <select class="form-control selectric" id="edit-pasien-status-pasien" name="status-pasien">
                                    <option value="1">Sehat</option>
                                    <option value="0">Meninggal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <h6>Desa</h6>
                                </label>
                                <select class="form-control selectric" name="desa" id="edit-pasien-desa">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="#edit-pasien-submit-form" onclick="submitEditFormPasien();">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('puskesmas/footer'); ?>