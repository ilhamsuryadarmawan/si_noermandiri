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
$route['default_controller'] = 'C_landingpage';

$route['landingpage'] = 'C_landingpage';


$route['login'] = 'C_login';
$route['logout'] = 'C_login/logout';

//akses admin
//data pegawai
$route['daftarpegawai'] = 'C_pegawai/index';
$route['forminput'] = 'C_pegawai/tambah';
$route['inputpegawai'] = 'C_pegawai/tambahPegawai';
$route['updatepegawai'] = 'C_pegawai/update';

//data siswa
$route['daftarsiswa'] = 'C_siswa/index';
$route['updatesiswa'] = 'C_siswa/update';

//data mapel
$route['tambahmapel'] = 'C_mapel/tambah';
$route['updatemapel'] = 'C_mapel/update';

//data ruangan
$route['tambahruangan'] = 'C_ruangan/tambah';
$route['updateruangan'] = 'C_ruangan/update';

//data kelas
$route['tambahkelas'] = 'C_kelas/tambah';
$route['updatekelas'] = 'C_kelas/update';

$route['tambahskala'] = 'C_skala/tambah';

$route['updatesesi'] = 'C_sesi/update';

$route['updatejabatan'] = 'C_jabatan/update';

$route['updatejenjang'] = 'C_jenjang_kelas/update';

$route['tambahjenisujian'] = 'C_jenis_ujian/tambah';
$route['updatejenisujian'] = 'C_jenis_ujian/update';

//data absen
$route['simpanabsen'] = 'C_absensi/simpan';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

