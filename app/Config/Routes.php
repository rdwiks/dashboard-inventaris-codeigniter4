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


// Admin
$routes->get('admin', 'Admin::index',  ['filter' => 'role:admin']);
$routes->get('admin/index', 'Admin::index',  ['filter' => 'role:admin']);
$routes->get('pengguna/', 'Admin::pengguna',  ['filter' => 'role:admin']);
$routes->get('profil/(:any)', 'Admin::profile',  ['filter' => 'role:admin']);

// Users
$routes->get('karyawan', 'Karyawan::index');
$routes->get('karyawan/create', 'Karyawan::create',  ['filter' => 'role:admin']);
$routes->post('karyawan/save', 'Karyawan::save',  ['filter' => 'role:admin']);
$routes->get('karyawan/edit/(:segment)', 'Karyawan::edit/$1',  ['filter' => 'role:admin']);
$routes->put('karyawan/update/(:any)', 'Karyawan::update/$1',  ['filter' => 'role:admin']);
$routes->delete('karyawan/delete/(:num)', 'Karyawan::delete/$1',  ['filter' => 'role:admin']);
$routes->get('karyawan/exportKaryawan', 'Karyawan::exportKaryawan',  ['filter' => 'role:admin']);

// Home
$routes->get('/', 'dashboard');

// All Inventaris
$routes->get('inventaris', 'Inventaris::index');
$routes->get('inventaris/create', 'Inventaris::create',  ['filter' => 'role:admin']);
$routes->post('inventaris/save', 'Inventaris::save',  ['filter' => 'role:admin']);
$routes->get('inventaris/edit/(:segment)', 'Inventaris::edit/$1',  ['filter' => 'role:admin']);
$routes->put('inventaris/update/(:any)', 'Inventaris::update/$1',  ['filter' => 'role:admin']);
$routes->delete('inventaris/delete/(:num)', 'Inventaris::delete/$1',  ['filter' => 'role:admin']);
$routes->get('inventaris/export', 'Inventaris::export',  ['filter' => 'role:admin']);

// asset
$routes->group('transaksi', static function ($routes) {
    $routes->group('pembelian', static function ($routes) {
        $routes->get('/', 'Transaksi_Pembelian::index');
        $routes->get('create', 'Transaksi_Pembelian::create', ['filter' => 'role:admin']);
        $routes->post('save', 'Transaksi_Pembelian::save', ['filter' => 'role:admin']);
        $routes->get('edit/(:segment)', 'Transaksi_Pembelian::edit/$1',  ['filter' => 'role:admin']);
        $routes->put('update/(:any)', 'Transaksi_Pembelian::update/$1',  ['filter' => 'role:admin']);
        $routes->delete('delete/(:num)', 'Transaksi_Pembelian::delete/$1',  ['filter' => 'role:admin']);
    });
    $routes->group('pengeluaran', static function ($routes) {
        $routes->get('/', 'Transaksi_Pengeluaran::index');
        $routes->get('create', 'Transaksi_Pengeluaran::create', ['filter' => 'role:admin']);
        $routes->post('save', 'Transaksi_Pengeluaran::save', ['filter' => 'role:admin']);
        $routes->get('edit/(:segment)', 'Transaksi_Pengeluaran::edit/$1',  ['filter' => 'role:admin']);
        $routes->put('update/(:any)', 'Transaksi_Pengeluaran::update/$1',  ['filter' => 'role:admin']);
        $routes->delete('delete/(:num)', 'Transaksi_Pengeluaran::delete/$1',  ['filter' => 'role:admin']);
    });
});

// All Reports
$routes->get('laporan', 'Laporan::index');
$routes->get('laporan/show/(:segment)', 'Laporan::show');
$routes->get('laporan/inventaris/exportInventaris', 'Laporan::exportInventaris',  ['filter' => 'role:admin']);
$routes->get('laporan/transaksi/exportPembelian', 'Laporan::exportPembelian',  ['filter' => 'role:admin']);
$routes->get('laporan/transaksi/exportPengeluaran', 'Laporan::exportPengeluaran',  ['filter' => 'role:admin']);

// asset
$routes->group('assets', static function ($routes) {
    $routes->group('kategori', static function ($routes) {
        $routes->get('/', 'Kategori::index');
        $routes->get('create', 'Kategori::create', ['filter' => 'role:admin']);
        $routes->post('save', 'Kategori::save', ['filter' => 'role:admin']);
        $routes->get('edit/(:segment)', 'Kategori::edit/$1',  ['filter' => 'role:admin']);
        $routes->put('update/(:any)', 'Kategori::update/$1',  ['filter' => 'role:admin']);
        $routes->delete('delete/(:num)', 'Kategori::delete/$1',  ['filter' => 'role:admin']);
    });
    $routes->group('lokasi', static function ($routes) {
        $routes->get('/', 'Lokasi::index');
        $routes->get('create', 'Lokasi::create', ['filter' => 'role:admin']);
        $routes->post('save', 'Lokasi::save', ['filter' => 'role:admin']);
        $routes->get('edit/(:segment)', 'Lokasi::edit/$1',  ['filter' => 'role:admin']);
        $routes->put('update/(:any)', 'Lokasi::update/$1',  ['filter' => 'role:admin']);
        $routes->delete('delete/(:num)', 'Lokasi::delete/$1',  ['filter' => 'role:admin']);
    });
    $routes->group('barang', static function ($routes) {
        $routes->get('/', 'Barang::index');
        $routes->get('create', 'Barang::create', ['filter' => 'role:admin']);
        $routes->post('save', 'Barang::save', ['filter' => 'role:admin']);
        $routes->get('edit/(:segment)', 'Barang::edit/$1',  ['filter' => 'role:admin']);
        $routes->put('update/(:any)', 'Barang::update/$1',  ['filter' => 'role:admin']);
        $routes->delete('delete/(:num)', 'Barang::delete/$1',  ['filter' => 'role:admin']);
    });
});

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
