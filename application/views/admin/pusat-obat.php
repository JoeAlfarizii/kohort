<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Halaman Daftar Jenis Obat</h1>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-3">
        <div class="form-group">
          <label>Filter Data Obat</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="far fa-calendar-alt"></i>
              </div>
            </div>
            <input type="text" placeholder="select date ..." class="form-control picker-month" id="filter-pusat-tanggal-obat">
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
          <label>
           Kategori Obat
          </label>
          <select class="form-control selectric" name="kategori" id="filter-pusat-kategori-obat">
            <option value="">Tidak Ada</option>
            <option value="0">Kategori A</option>
            <option value="1">Kategori B</option>
            <option value="2">Kategori C</option>
            <option value="3">Kategori D</option>
            <option value="4">Kategori X</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4 pt-4">
        <button class="btn btn-icon icon-left btn-primary" style="margin-top: 8px" onclick="cariDataObatPusat();"><i class='fas fa-search'></i> Cari</button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Daftar Obat</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-pusat-obat">
                <thead>
                  <tr>
                    <th class="text-center">
                      No
                    </th>
                    <th class="text-center">Nama Obat</th>
                    <th class="text-center">Kategori Obat</th>
                    <th class="text-center">Komposisi Obat</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Aksi</th>
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

<div class="modal fade" id="modal-detail-obat-pusat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
        <h3 class="modal-title" id="exampleModalLabel">Detail Data Obat</h3>
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
                  <h5>Nama Obat</h5>
                </div>
                <div class="col-md-12 ml-5">
                  <div id="detail-obat-pusat-nama"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12 ml-3">
                  <h5>Kategori Obat</h5>
                </div>
                <div class="col-md-12 ml-5">
                  <div id="detail-obat-pusat-kategori"></div>
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
                  <h5>Komposisi</h5>
                </div>
                <div class="col-md-12 ml-5">
                  <div id="detail-obat-pusat-komposisi"></div>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="row">
                <div class="col-md-12 ml-3">
                  <h5>Deskripsi Obat</h5>
                </div>
                <div class="col-md-12 ml-5">
                  <div id="detail-obat-pusat-deskripsi"></div>
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