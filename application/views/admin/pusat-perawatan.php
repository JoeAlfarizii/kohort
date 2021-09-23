<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Main Content -->
<div class="main-content" id="halaman-perawatan">
  <section class="section">
    <div class="section-header">
      <h1>Halaman Perawatan</h1>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Perawatan</h4>
            </div>
            <div class="card-body" id="pusat-perawatan-total">
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Perawatan Mandiri</h4>
            </div>
            <div class="card-body" id="pusat-perawatan-total-mandiri">
             
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Perawatan di Rujuk</h4>
            </div>
            <div class="card-body" id="pusat-perawatan-total-rujuk">
              
            </div>
          </div>
        </div>
      </div>
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
            <input type="text" placeholder="select date ..." class="form-control picker-month" id="filter-pusat-tanggal-perawatan">
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
          <label>
            Puskesmas
          </label>
          <select class="form-control select2" id="filter-pusat-puskesmas-perawatan">
            <option value="0">Tidak Ada</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4 pt-4">
        <button class="btn btn-icon icon-left btn-primary" style="margin-top: 8px" onclick="cariDataPerawatanPusat();"><i class='fas fa-search'></i> Cari</button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3>Daftar Perawatan</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-pusat-perawatan">
                <thead>
                  <tr>
                    <th class="text-center">
                      No
                    </th>
                    <th>Nama Pasien</th>
                    <th>Jenis Perawatan</th>
                    <th>Alasan Perawatan</th>
                    <th>Status Rujuk Balik</th>
                    <th>Status Kemandirian</th>
                    <th>Aksi</th>
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

<div class="modal fade" id="modal-detail-perawatan-pusat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <div id="detail-perawatan-pusat-nama"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>jenis Perawatan</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-perawatan-pusat-jenis"></div>
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
                                    <div id="detail-perawatan-pusat-status-kemandirian"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Status Rujuk Balik</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-perawatan-pusat-status-rujuk"></div>
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
                                    <div id="detail-perawatan-pusat-alasan"></div>
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
<?php $this->load->view('admin/footer'); ?>