<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-chart">
            <canvas id="test-chart" height="80"></canvas>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-user-injured"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah ODGJ Terdaftar</h4>
            </div>
            <div class="card-body" id="dashboard-pusat-jumlah-odgj">
              &mdash;
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-chart">
            <canvas id="balance-chart" height="80"></canvas>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-pills"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Konsumsi Obat</h4>
            </div>
            <div class="card-body" id="dashboard-pusat-jumlah-konsumsi-obat">
              &mdash;
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-chart">
            <canvas id="sales-chart" height="80"></canvas>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-procedures"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Tindakan Perawatan</h4>
            </div>
            <div class="card-body" id="dashboard-pusat-jumlah-perawatan">
              &mdash;
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-3">
        <div class="form-group">
          <label>Filter Tahun</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="far fa-calendar-alt"></i>
              </div>
            </div>
            <input type="text" placeholder="select date ..." class="form-control" id="filter-pusat-tanggal-dashboard">
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
          <label>
            Filter Puskesmas
          </label>
          <select class="form-control select2" id="filter-pusat-dashboard">
            <option value="0">Tidak Ada</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4 pt-4">
        <button class="btn btn-icon icon-left btn-primary" style="margin-top: 8px" onclick="cariDataDashboardPusat();"><i class='fas fa-search'></i> Cari</button>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Perbandingan Kondisi Pasien Sehat dan Meninggal Pada Tahun <span id="main-chart-kondisi-tahun"></span></h4>
          </div>
          <div class="card-body">
            <canvas id="myChart" height="158"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Recent Pasien ODGJ Terdaftar</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-pusat-dashboard-recent">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Pasien</th>
                    <th class="text-center">Puskesmas</th>
                    <th class="text-center">Status Pasung</th>
                    <th class="text-center">Tanggal Tindakan</th>
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
<?php $this->load->view('admin/footer'); ?>