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
                <div class="breadcrumb-item active">Rekam Medis</div>
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
                                        <h3>Daftar Rekam Medis</h3>
                                        <div style="margin-left:auto">
                                            <a href="<?= base_url() ?>puskesmas/rekam-medis/rekam-medis-form" class="btn btn-lg btn-primary"><i class="fas fa-plus"></i> Tambahkan Data Rekam Medis</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-puskesmas-rekam-medis">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-center">Nama Pasien</th>
                                                        <th class="text-center">Nama Dokter</th>
                                                        <th class="text-center">Diagnosis</th>
                                                        <th class="text-center">Tanggal Berobat</th>
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

<div class="modal fade" id="modal-detail-rekam-medis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Detail Data Rekam Medis</h3>
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
                                    <div id="detail-rekam-medis-pasien"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Nama Dokter</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-rekam-medis-dokter"></div>
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
                                    <h5>Daftar Obat</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-rekam-medis-obat"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Diagnosis</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-rekam-medis-diagnosis"></div>
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

<div class="modal fade" id="modal-edit-rekam-medis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Edit Data Rekam Medis</h3>
                <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-rekam-medis">
                <div class="modal-body mt-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <input style="display: none" type="text" class="form-control" name="id" id="edit-id-rekam-medis">
                                <div class="form-group">
                                    <label>
                                        <h6>Nama pasien</h6>
                                    </label>
                                    <select class="form-control selectric" name="id_pasien" id="edit-rekam-medis-pasien">
                                    </select>
                                    <p id="invalid-edit-pasien-nama" style="color:red;display:none">*mohon diisi</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <h6>Nama Dokter</h6>
                                    </label>
                                    <select class="form-control selectric" name="id_dokter" id="edit-rekam-medis-dokter">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-11 ml-3 mr-3">
                            <div class="form-group">
                                <label>
                                    <h6>Diagnosis Perawatan</h6>
                                </label>
                                <textarea class="form-control" placeholder="Pesan ..." name="diagnosis" id="edit-rekam-medis-diagnosis"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 ml-3">
                            <div class="row" id="edit-form-obat">
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <a href="#" class="btn btn-success btn-block puskesmas-tambah-obat" id="button-edit-tambah-obat">
                                        <i class="fas fa-plus-square"></i>
                                        <span>Tambahkan Form Obat</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="#edit-pasien-submit-form" onclick="submitEditFormRekamMedis();">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('puskesmas/footer'); ?>