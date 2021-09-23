<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <!-- <h1>Tambah Data User Puskesmas</h1> -->
            <span>&nbsp;</span>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mt-4">
                                            <div class="col-12 col-lg-8 offset-lg-2">
                                                <div class="wizard-steps">
                                                    <div class="wizard-step wizard-step-active">
                                                        <div class="wizard-step-icon">
                                                            <i class="far fa-user"></i>
                                                        </div>
                                                        <div class="wizard-step-label">
                                                            Form Tambah User Puskesmas
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-pane">
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-4 text-md-right text-left">Puskesmas</label>
                                                <div class="col-lg-4 col-md-6">
                                                    <select class="form-control select2" id="pusat-user-puskesmas-puskesmas">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-4 text-md-right text-left">Nama Lengkap</label>
                                                <div class="col-lg-4 col-md-6">
                                                    <input type="text" name="name" id="pusat-user-puskesmas-nama" class="form-control" placeholder="Masukkan Nama Lengkap" autocomplete="off">
                                                    <p id="invalid-pusat-add-user-puskesmas-nama" style="color:red;display:none">*mohon diisi</p>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-4 text-md-right text-left">Username</label>
                                                <div class="col-lg-4 col-md-6">
                                                    <input type="text" name="username" id="pusat-user-puskesmas-username" class="form-control" placeholder="Masukkan Username" autocomplete="off">
                                                    <p id="invalid-pusat-add-user-puskesmas-username" style="color:red;display:none">*mohon diisi</p>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-4 text-md-right text-left">password</label>
                                                <div class="col-lg-4 col-md-6">
                                                    <input type="password" name="password" id="pusat-user-puskesmas-password" class="form-control" placeholder="Masukkan Password">
                                                    <p id="invalid-pusat-add-user-puskesmas-password" style="color:red;display:none">*mohon diisi</p>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4"></div>
                                                <div class="col-lg-4 col-md-6 text-right">
                                                    <a href="#" class="btn btn-icon icon-right btn-primary" onclick="submitAddUserPuskesmas();"><i class="fas fa-plus-circle mr-1"></i> Submit </a>
                                                </div>
                                            </div>
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

<?php $this->load->view('admin/footer'); ?>