<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Puskesmas</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form id="form-tambah-puskesmas">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Nama puskesmas</h6>
                                            </label>
                                            <input type="text" class="form-control" required="" name="nama" id="pusat-add-puskesmas-nama">
                                            <p id="invalid-pusat-add-puskesmas-nama" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <h6>Provinsi</h6>
                                            </label>
                                            <select class="form-control" name="provinsi" id="pusat-add-puskesmas-provinsi">
                                            </select>
                                            <p id="invalid-pusat-add-puskesmas-provinsi" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Kota</h6>
                                            </label>
                                            <select class="form-control" name="kota" id="pusat-add-puskesmas-kota" disabled>
                                            </select>
                                            <p id="invalid-pusat-add-puskesmas-kota" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <h6>Kecamatan</h6>
                                            </label>
                                            <select class="form-control" name="puskesmas-kecamatan" id="pusat-add-puskesmas-kecamatan" disabled>
                                            </select>
                                            <p id="invalid-pusat-add-puskesmas-kecamatan" style="color:red;display:none">*mohon diisi</p>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Desa</h6>
                                            </label>
                                            <select class="form-control" name="puskesmas-desa" id="pusat-add-puskesmas-desa" disabled>
                                            </select>
                                            <p id="invalid-pusat-add-puskesmas-desa" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>
                                                <h6>Alamat</h6>
                                            </label>
                                            <textarea class="form-control" required="" placeholder="Masukkan alamat ..." name="alamat" id="pusat-add-puskesmas-alamat"></textarea>
                                            <p id="invalid-pusat-add-puskesmas-alamat" style="color:red;display:none">*mohon diisi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-auto mr-auto">
                                        <a href="#" id="btn-puskesmas-submit" class="btn btn-primary btn-block pt-3" onclick="submitAddFormPuskesmas();">
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

<?php $this->load->view('admin/footer'); ?>