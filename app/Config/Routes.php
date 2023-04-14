<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'user::index');

//admin
$routes->get('/admin', 'admin\dashboard::index');

$routes->get('admin/data-master/gol-darah', 'admin\datamaster\goldarah::index');
$routes->get('admin/data-master/gol-darah/show', 'admin\datamaster\goldarah::show');
$routes->post('admin/data-master/gol-darah/save', 'admin\datamaster\goldarah::save');
$routes->post('admin/data-master/gol-darah/delete', 'admin\datamaster\goldarah::delete');

$routes->get('admin/data-master/pekerjaan', 'admin\datamaster\pekerjaan::index');
$routes->get('admin/data-master/pekerjaan/show', 'admin\datamaster\pekerjaan::show');
$routes->post('admin/data-master/pekerjaan/save', 'admin\datamaster\pekerjaan::save');
$routes->post('admin/data-master/pekerjaan/delete', 'admin\datamaster\pekerjaan::delete');

$routes->get('admin/data-master/jenis-kelamin', 'admin\datamaster\jeniskelamin::index');
$routes->get('admin/data-master/jenis-kelamin/show', 'admin\datamaster\jeniskelamin::show');
$routes->post('admin/data-master/jenis-kelamin/save', 'admin\datamaster\jeniskelamin::save');
$routes->post('admin/data-master/jenis-kelamin/delete', 'admin\datamaster\jeniskelamin::delete');

$routes->get('admin/data-master/jenis-darah', 'admin\datamaster\jenisdarah::index');
$routes->get('admin/data-master/jenis-darah/show', 'admin\datamaster\jenisdarah::show');
$routes->post('admin/data-master/jenis-darah/save', 'admin\datamaster\jenisdarah::save');
$routes->post('admin/data-master/jenis-darah/delete', 'admin\datamaster\jenisdarah::delete');

$routes->get('admin/data-master/rumah-sakit', 'admin\datamaster\rumahsakit::index');
$routes->get('admin/data-master/rumah-sakit/show', 'admin\datamaster\rumahsakit::show');
$routes->post('admin/data-master/rumah-sakit/save', 'admin\datamaster\rumahsakit::save');
$routes->post('admin/data-master/rumah-sakit/delete', 'admin\datamaster\rumahsakit::delete');

$routes->get('admin/pendonor', 'admin\pendonor::index');
$routes->get('admin/pendonor/show', 'admin\pendonor::show');
$routes->post('admin/pendonor/save', 'admin\pendonor::save');
$routes->post('admin/pendonor/delete', 'admin\pendonor::delete');

$routes->get('admin/darah-masuk', 'admin\darahmasuk::index');
$routes->get('admin/darah-masuk/show', 'admin\darahmasuk::show');
$routes->post('admin/darah-masuk/save', 'admin\darahmasuk::save');
$routes->post('admin/darah-masuk/delete', 'admin\darahmasuk::delete');

$routes->get('admin/stok-darah', 'admin\stokdarah::index');
$routes->get('admin/stok-darah/show', 'admin\stokdarah::show');
$routes->post('admin/stok-darah/save', 'admin\stokdarah::save');
$routes->post('admin/stok-darah/delete', 'admin\stokdarah::delete');

$routes->get('admin/penggunaan-darah', 'admin\penggunaandarah::index');
$routes->get('admin/penggunaan-darah/show', 'admin\penggunaandarah::show');
$routes->post('admin/penggunaan-darah/save', 'admin\penggunaandarah::save');
$routes->post('admin/penggunaan-darah/delete', 'admin\penggunaandarah::delete');

$routes->get('admin/jadwal-kegiatan', 'admin\jadwalkegiatan::index');
$routes->get('admin/jadwal-kegiatan/show', 'admin\jadwalkegiatan::show');
$routes->post('admin/jadwal-kegiatan/save', 'admin\jadwalkegiatan::save');
$routes->post('admin/jadwal-kegiatan/delete', 'admin\jadwalkegiatan::delete');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
