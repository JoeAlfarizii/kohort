<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'AuthController/Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'AuthController/login';
$route['auth'] = 'AuthController/login_process';
$route['logout'] = 'AuthController/logout';
//Admin Routes
$route['admin/dashboard'] = 'AdminController/lihatAdminPusat';
$route['admin/dashboard/data-manajemen'] = 'AdminController/dataManajemenDashboard';
$route['admin/dashboard/main-chart'] = 'AdminController/dataMainChart';
$route['admin/dashboard/data-recent-pasung'] = 'AdminController/dataPasungRecent';

$route['admin/user/user-puskesmas'] = 'AdminController/lihatMenuUserPuskesmas';
$route['admin/user/user-puskesmas/datatable'] = 'AdminController/datatableUserPuskesmas';
$route['admin/user/user-puskesmas/user-form'] = 'AdminController/lihatFormUserPuskesmas';
$route['admin/user/user-puskesmas/detail'] = 'AdminController/detailDataUserPuskesmas';
$route['admin/user/user-puskesmas/input'] = 'AdminController/InputDataUserPuskesmas';
$route['admin/user/user-puskesmas/edit'] = 'AdminController/editDataUserPuskesmas';
$route['admin/user/user-puskesmas/hapus'] = 'AdminController/deleteDataUserPuskesmas';

$route['admin/user/user-pusat'] = 'AdminController/lihatMenuUserPusat';
$route['admin/user/user-pusat/datatable'] = 'AdminController/datatableUserPusat';
$route['admin/user/user-pusat/detail'] = 'AdminController/detailDataUserPusat';
$route['admin/user/user-pusat/user-form'] = 'AdminController/lihatFormUserPusat';
$route['admin/user/user-pusat/input'] = 'AdminController/InputDataUserPusat';
$route['admin/user/user-pusat/edit'] = 'AdminController/editDataUserPusat';
$route['admin/user/user-pusat/hapus'] = 'AdminController/deleteDataUserPusat';

$route['admin/puskesmas'] = 'PuskesmasController/index';
$route['admin/puskesmas/datatable'] = 'PuskesmasController/datatablePuskesmas';
$route['admin/puskesmas/puskesmas-form'] = 'PuskesmasController/lihatFormPuskesmasPusat';
$route['admin/puskesmas/puskesmas-input'] = 'PuskesmasController/inputDataPuskesmas';
$route['admin/puskesmas/detail-puskesmas'] = 'PuskesmasController/detailDataPuskesmas';
$route['admin/puskesmas/detail-edit-puskesmas'] = 'PuskesmasController/detailEditDataPuskesmas';
$route['admin/puskesmas/edit-puskesmas'] = 'PuskesmasController/editDataPuskesmas';
$route['admin/puskesmas/hapus-puskesmas'] = 'PuskesmasController/deleteDataPuskesmas';

$route['admin/pasien'] = 'PasienController/index';
$route['admin/pasien/datatable'] = 'PasienController/datatableAdminPasien';
$route['admin/pasien/data-manajemen-pasien'] = 'PasienController/dataManajemenPasien';
$route['admin/pasien/detail-pasien'] = 'PasienController/detailDataPasien';

$route['admin/perawatan'] = 'PerawatanController/index';
$route['admin/perawatan/datatable'] = 'PerawatanController/datatableAdminPerawatan';
$route['admin/perawatan/data-manajemen-perawatan'] = 'PerawatanController/dataManajemenPerawatan';
$route['admin/perawatan/detail-perawatan'] = 'PerawatanController/detailDataPerawatan';

$route['admin/rekam-medis'] = 'RekamMedisController/index';
$route['admin/rekam-medis/datatable'] = 'RekamMedisController/datatableAdminRekamMedis';
$route['admin/rekam-medis/detail-rekam-medis'] = 'RekamMedisController/detailDataRekamMedis';

$route['admin/dokter'] = 'DokterController/index';
$route['admin/dokter/datatable'] = 'DokterController/datatableAdminDokter';
$route['admin/dokter/detail-dokter'] = 'DokterController/detailDataDokter';

$route['admin/pasung'] = 'PasungController/index';
$route['admin/pasung/datatable'] = 'PasungController/datatableAdminPasung';
$route['admin/pasung/data-manajemen-pasung'] = 'PasungController/dataManajemenPasung';
$route['admin/pasung/detail-pasung'] = 'PasungController/detailDataPasung';

$route['admin/obat'] = 'ObatController/index';
$route['admin/obat/datatable'] = 'ObatController/datatableAdminObat';
$route['admin/obat/detail-obat'] = 'ObatController/detailDataObat';

//Puskesmas Routes
$route['puskesmas/dashboard'] = 'AdminController/lihatAdminPuskesmas';
$route['puskesmas/dashboard/data-dashboard'] = 'AdminController/dataDashboardPuskesmas';

$route['puskesmas/setting'] = 'PuskesmasController/lihatPengaturanAkun';
$route['puskesmas/setting/data-setting'] = 'PuskesmasController/showDaftarUserPuskesmas';
$route['puskesmas/setting/user-update-setting'] = 'PuskesmasController/updateDataUserPuskesmas';

$route['puskesmas/puskesmas'] = 'PuskesmasController/lihatMenuPuskesmas';
$route['puskesmas/puskesmas/puskesmas-form'] = 'PuskesmasController/lihatFormPuskesmas';
$route['puskesmas/puskesmas/daftar-provinsi'] = 'PuskesmasController/daftarProvinsi';
$route['puskesmas/puskesmas/daftar-kota'] = 'PuskesmasController/daftarKota';
$route['puskesmas/puskesmas/daftar-kecamatan'] = 'PuskesmasController/daftarKecamatan';
$route['puskesmas/puskesmas/daftar-desa'] = 'PuskesmasController/daftarDesa';
$route['puskesmas/puskesmas/daftar-puskesmas'] = 'PuskesmasController/daftarPuskesmas';
$route['puskesmas/puskesmas/puskesmas-input'] = 'PuskesmasController/inputDataPuskesmas';
$route['puskesmas/puskesmas/hapus-puskesmas'] = 'PuskesmasController/deleteDataPuskesmas';

$route['puskesmas/pasien'] = 'PasienController/lihatMenuPasien';
$route['puskesmas/pasien/datatable-pasien'] = 'PasienController/datatablePasien';
$route['puskesmas/pasien/pasien-form'] = 'PasienController/lihatFormPasien';
$route['puskesmas/pasien/pasien-input'] = 'PasienController/inputIdentitasPasien';
$route['puskesmas/pasien/detail-pasien'] = 'PasienController/detailDataPasien';
$route['puskesmas/pasien/detail-edit-pasien'] = 'PasienController/detailEditDataPasien';
$route['puskesmas/pasien/edit-pasien'] = 'PasienController/editDataPasien';
$route['puskesmas/pasien/hapus-pasien'] = 'PasienController/deleteDataPasien';

$route['puskesmas/perawatan'] = 'PerawatanController/lihatMenuPerawatan';
$route['puskesmas/perawatan/datatable-perawatan'] = 'PerawatanController/datatablePerawatan';
$route['puskesmas/perawatan/daftar-pasien-sehat'] = 'PerawatanController/daftarPasienSehat';
$route['puskesmas/perawatan/perawatan-form'] = 'PerawatanController/lihatFormPerawatan';
$route['puskesmas/perawatan/perawatan-input'] = 'PerawatanController/inputDataPerawatan';
$route['puskesmas/perawatan/detail-perawatan'] = 'PerawatanController/detailDataPerawatan';
$route['puskesmas/perawatan/detail-edit-perawatan'] = 'PerawatanController/detailEditDataPerawatan';
$route['puskesmas/perawatan/edit-perawatan'] = 'PerawatanController/editDataPerawatan';
$route['puskesmas/perawatan/hapus-perawatan'] = 'PerawatanController/deleteDataPerawatan';

$route['puskesmas/rekam-medis'] = 'RekamMedisController/lihatMenuRekamMedis';
$route['puskesmas/rekam-medis/datatable-rekam-medis'] = 'RekamMedisController/datatableRekamMedis';
$route['puskesmas/rekam-medis/rekam-medis-input'] = 'RekamMedisController/inputDataRekamMedis';
$route['puskesmas/rekam-medis/rekam-medis-form'] = 'RekamMedisController/lihatFormRekamMedis';
$route['puskesmas/rekam-medis/daftar-dokter'] = 'RekamMedisController/daftarDokter';
$route['puskesmas/rekam-medis/daftar-obat'] = 'RekamMedisController/daftarObat';
$route['puskesmas/rekam-medis/detail-rekam-medis'] = 'RekamMedisController/detailDataRekamMedis';
$route['puskesmas/rekam-medis/detail-edit-rekam-medis'] = 'RekamMedisController/detailEditDataRekamMedis';
$route['puskesmas/rekam-medis/edit-rekam-medis'] = 'RekamMedisController/editDataRekamMedis';
$route['puskesmas/rekam-medis/hapus-rekam-medis'] = 'RekamMedisController/deleteDataRekamMedis';

$route['puskesmas/dokter'] = 'DokterController/lihatMenuDokter';
$route['puskesmas/dokter/datatable-dokter'] = 'DokterController/datatableDokter';
$route['puskesmas/dokter/dokter-form'] = 'DokterController/lihatFormDokter';
$route['puskesmas/dokter/dokter-input'] = 'DokterController/inputDataDokter';
$route['puskesmas/dokter/detail-dokter'] = 'DokterController/detailDataDokter';
$route['puskesmas/dokter/edit-dokter'] = 'DokterController/editDataDokter';
$route['puskesmas/dokter/hapus-dokter'] = 'DokterController/deleteDataDokter';

$route['puskesmas/pasung'] = 'PasungController/lihatMenuPasung';
$route['puskesmas/pasung/datatable-pasung'] = 'PasungController/datatablePasung';
$route['puskesmas/pasung/pasung-form'] = 'PasungController/lihatFormPasung';
$route['puskesmas/pasung/pasung-input'] = 'PasungController/inputDataPasung';
$route['puskesmas/pasung/detail-edit-pasung'] = 'PasungController/detailEditDataPasung';
$route['puskesmas/pasung/detail-pasung'] = 'PasungController/detailDataPasung';
$route['puskesmas/pasung/edit-pasung'] = 'PasungController/editDataPasung';
$route['puskesmas/pasung/hapus-pasung'] = 'PasungController/deleteDataPasung';

$route['puskesmas/obat'] = 'ObatController/lihatMenuObat';
$route['puskesmas/obat/datatable-obat'] = 'ObatController/datatableAdminObat';
$route['puskesmas/obat/obat-form'] = 'ObatController/lihatFormObat';
$route['puskesmas/obat/obat-input'] ='ObatController/inputDataObat';
$route['puskesmas/obat/detail-obat'] = 'ObatController/detailDataObat';
$route['puskesmas/obat/edit-obat'] = 'ObatController/editDataObat';
$route['puskesmas/obat/hapus-obat'] = 'ObatController/deleteDataObat';




