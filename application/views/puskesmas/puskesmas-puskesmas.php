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
                                    <h3>Daftar Puskesmas</h3>
                                        <div style="margin-left:auto">
                                            <a href="<?= base_url()?>puskesmas/puskesmas/puskesmas-form" class="btn btn-lg btn-primary"><i class="fas fa-plus"></i> Tambahkan Data Puskesmas</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-puskesmas-puskesmas">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th>Nama Puskesmas</th>
                                                        <th>Provinsi</th>
                                                        <th>Kota</th>
                                                        <th>Kecamatan</th>
                                                        <th>Desa</th>
                                                        <th>Alamat</th>
                                                        <th>Aksi</th>
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
<?php $this->load->view('puskesmas/footer'); ?>