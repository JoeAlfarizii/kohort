<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Halaman Daftar User</h1>
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
            <input type="text" placeholder="select date ..." class="form-control picker-month" id="filter-pusat-tanggal-user-puskesmas">
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
          <label>
            Puskesmas
          </label>
          <select class="form-control select2" id="filter-pusat-puskesmas-user-puskesmas">
            <option value="0">Tidak Ada</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4 pt-4">
        <button class="btn btn-icon icon-left btn-primary" style="margin-top: 8px" onclick="cariDataUserPuskesmas();"><i class='fas fa-search'></i> Cari</button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3>Daftar User Puskesmas</h3>
            <div style="margin-left:auto">
              <a href="<?=base_url()."admin/user/user-puskesmas/user-form"?>" class="btn btn-lg btn-primary"><i class="fas fa-plus"></i> Tambahkan User Puskesmas</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-pusat-user-puskesmas">
                <thead>
                  <tr>
                    <th class="text-center">
                      No
                    </th>
                    <th class="text-center">Nama Lengkap</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Puskesmas</th>
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

<div class="modal fade" id="modal-detail-user-puskesmas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
        <h3 class="modal-title" id="exampleModalLabel">Detail User Puskesmas</h3>
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
                  <h5>Nama Lengkap</h5>
                </div>
                <div class="col-md-12 ml-5">
                  <div id="detail-user-puskesmas-nama"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12 ml-3">
                  <h5>Username</h5>
                </div>
                <div class="col-md-12 ml-5">
                  <div id="detail-user-puskesmas-username"></div>
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
                  <h5>Puskesmas</h5>
                </div>
                <div class="col-md-12 ml-5">
                  <div id="detail-user-puskesmas-puskesmas"></div>
                </div>
              </div>
            </div>
            <!-- <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 ml-3">
                                    <h5>Deskripsi Obat</h5>
                                </div>
                                <div class="col-md-12 ml-5">
                                    <div id="detail-obat-pusat-deskripsi"></div>
                                </div>
                            </div>
                        </div> -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-edit-user-puskesmas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:royalblue; color:#ebedf0; border-radius: 0px 0px 20px 20px;">
        <h3 class="modal-title" id="exampleModalLabel">Edit User Puskesmas</h3>
        <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-4">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <input style="display: none" type="text" class="form-control" id="edit-id-user-puskesmas">
              <div class="form-group">
                <label>
                  <h6>Username</h6>
                </label>
                <input type="text" class="form-control" id="edit-user-puskesmas-username" required="" name="nama">
                <p id="invalid-edit-user-puskesmas-username" style="color:red;display:none">*mohon diisi</p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>
                  <h6>password</h6>
                </label>
                <input type="password" class="form-control" id="edit-user-puskesmas-password" required="" name="jabatan">
                <p id="invalid-edit-user-puskesmas-password" style="color:red;display:none">*mohon diisi</p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>
                  <h6>Nama lengkap</h6>
                </label>
                <input type="text" class="form-control" id="edit-user-puskesmas-nama" required="" name="jabatan">
                <p id="invalid-edit-user-puskesmas-nama" style="color:red;display:none">*mohon diisi</p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>
                  <h6>Puskesmas</h6>
                </label>
                <select class="form-control selectric" id="edit-user-puskesmas-puskesmas" name="jenis-kelamin">
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="#edit-dokter-submit-form" onclick="submitEditUserPuskesmas();">Simpan</button>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/footer'); ?>