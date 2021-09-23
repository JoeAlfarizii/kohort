<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Main Content -->
<div class="main-content" id="halaman-pasien">
  <section class="section">
    <div class="section-header">
      <h1>Halaman Pasien</h1>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total ODGJ Pria</h4>
            </div>
            <div class="card-body" id="pusat-pasien-total-odgj-pria">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total ODGJ Wanita</h4>
            </div>
            <div class="card-body" id="pusat-pasien-total-odgj-wanita">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total ODGJ Terdaftar</h4>
            </div>
            <div class="card-body" id="pusat-pasien-total-odgj-terdaftar">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Aktif Pengobatan</h4>
            </div>
            <div class="card-body" id="pusat-pasien-total-aktif-pengobatan">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Pasif Pengobatan</h4>
            </div>
            <div class="card-body" id="pusat-pasien-total-pasif-pengobatan">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Kematian</h4>
            </div>
            <div class="card-body" id="pusat-pasien-total-kematian">
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
            <input type="text" placeholder="select date ..." class="form-control picker-month" id="filter-pusat-tanggal-pasien">
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
          <label>
            Puskesmas
          </label>
          <select class="form-control select2" id="filter-pusat-puskesmas-pasien">
            <option value="0">Tidak Ada</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4 pt-4">
        <button class="btn btn-icon icon-left btn-primary" style="margin-top: 8px" onclick="cariDataPasienPusat();"><i class='fas fa-search'></i> Cari</button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3>Daftar Pasien</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-pusat-pasien">
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

<div class="modal fade" id="modal-detail-pusat-pasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <div id="detail-pasien-pusat-nama"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12 ml-3">
                  <h5>Tempat Dirawat</h5>
                </div>
                <div class="col-md-12 ml-5">
                  <div id="detail-pasien-pusat-puskesmas"></div>
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
                  <div id="detail-pasien-pusat-jenis-kelamin"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12 ml-3">
                  <h5>Tanggal Lahir</h5>
                </div>
                <div class="col-md-12 ml-5">
                  <div id="detail-pasien-pusat-tanggal-lahir"></div>
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
                  <div id="detail-pasien-pusat-alamat"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12 ml-3">
                  <h5>Kota</h5>
                </div>
                <div class="col-md-12 ml-5">
                  <div id="detail-pasien-pusat-kota"></div>
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
                  <div id="detail-pasien-pusat-rt"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12 ml-3">
                  <h5>RW</h5>
                </div>
                <div class="col-md-12 ml-5">
                  <div id="detail-pasien-pusat-rw"></div>
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
                  <div id="detail-pasien-pusat-kecamatan"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12 ml-3">
                  <h5>Desa</h5>
                </div>
                <div class="col-md-12 ml-5">
                  <div id="detail-pasien-pusat-desa"></div>
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
                  <div id="detail-pasien-pusat-provinsi"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12 ml-3">
                  <h5>Status JKN</h5>
                </div>
                <div class="col-md-12 ml-5">
                  <div id="detail-pasien-pusat-status-jkn"></div>
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
                  <div id="detail-pasien-pusat-status-pengobatan"></div>
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