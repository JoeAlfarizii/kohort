<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('puskesmas/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <!-- <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#"><?= $title; ?></a></div>
            </div>
        </div> -->

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
                                                            User Account
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-pane">
                                        <div class="form-group row align-items-center">
                                                <label class="col-md-4 text-md-right text-left">Puskesmas</label>
                                                <div class="col-lg-4 col-md-6">
                                                    <input type="text" name="puskesmas" class="form-control" id="puskesmas-setting-puskesmas" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-4 text-md-right text-left">Nama Lengkap</label>
                                                <div class="col-lg-4 col-md-6">
                                                    <input type="text" name="name" id="puskesmas-setting-nama" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-4 text-md-right text-left">Username</label>
                                                <div class="col-lg-4 col-md-6">
                                                    <input type="text" name="username" id="puskesmas-setting-username" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-4 text-md-right text-left">password</label>
                                                <div class="col-lg-4 col-md-6">
                                                    <input type="password" name="password" id="puskesmas-setting-password" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-md-4"></div>
                                                <div class="col-lg-4 col-md-6 text-right">
                                                    <a href="#" class="btn btn-icon icon-right btn-primary" onclick="submitDataAccount();"> Simpan </a>
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

<?php $this->load->view('puskesmas/footer'); ?>