#!/bin/sh
php artisan make:migration create_pekerjaan_table --create=pekerjaan
php artisan make:migration create_proyek_table --create=proyek
php artisan make:migration create_penawaran_jasa_table --create=penawaran_jasa
php artisan make:migration create_permintaan_jasa_table --create=permintaan_jasa
php artisan make:migration create_tagihan_table --create=tagihan
php artisan make:migration create_pembayaran_pembelian_table --create=pembayaran_pembelian
php artisan make:migration create_pesanaan_pembelian_table --create=pesanaan_pembelian
php artisan make:migration create_perusahaan_table --create=perusahaan
php artisan make:migration create_bahasa_table --create=bahasa
