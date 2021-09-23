<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Halaman Daftar Dokter</h1>
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
            <input type="text" placeholder="select date ..." class="form-control picker-month" id="filter-pusat-tanggal-dokter">
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
          <label>
            Puskesmas
          </label>
          <select class="form-control select2" id="filter-pusat-puskesmas-dokter">
            <option value="0">Tidak Ada</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4 pt-4">
        <button class="btn btn-icon icon-left btn-primary" style="margin-top: 8px" onclick="cariDataDokterPusat();"><i class='fas fa-search'></i> Cari</button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3>Daftar Dokter</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-pusat-dokter">
                <thead>
                  <tr>
                    <th class="text-center">
                      No
                    </th>
                    <th>Nama Dokter</th>
                    <th>Puskesmas</th>
                    <th>Jabatan</th>
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

<div class="modal fade" id="modal-detail-dokter-pusat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
                <h3 class="modal-title" id="exampleModalLabel">Detail Data Dokter</h3>
                <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Nama Dokter</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-dokter-pusat-nama"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Jabatan</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-dokter-pusat-jabatan"></div>
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