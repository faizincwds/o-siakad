<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class ThemeUI
{
    public static function getData()
    {
        return [
            /* ─── Menu Definition ─── */
            'menuItems' => [
                ['id' => 'dashboard',  'icon' => 'dashboard',       'label' => 'Dashboard', 'permission' => null], // semua boleh
                ['id' => 'profil',     'icon' => 'account_circle',   'label' => 'Profil'],
                ['icon' => 'school',   'label' => 'Mahasiswa', 'children' => [
                    ['id' => 'mhs-daftar', 'label' => 'Daftar Mahasiswa'],
                    ['id' => 'mhs-hapus',  'label' => 'Daftar Mahasiswa Hapus'],
                ]],
                ['icon' => 'person', 'label' => 'Dosen', 'permission' => null, 'children' => [
                    ['id' => 'dsn-daftar',     'label' => 'Dosen'],
                    ['id' => 'dsn-penugasan',  'label' => 'Penugasan Dosen'],
                ]],
                ['icon' => 'menu_book', 'label' => 'Perkuliahan', 'children' => [
                    ['id' => 'kul-mk',          'label' => 'Mata Kuliah'],
                    ['id' => 'kul-kurikulum',   'label' => 'Kurikulum'],
                    ['id' => 'kul-kelas',       'label' => 'Kelas Perkuliahan'],
                    ['id' => 'kul-nilai',       'label' => 'Nilai Perkuliahan'],
                ]],
                ['icon' => 'tune',      'label' => 'Pelengkap', 'children' => [
                    ['id' => 'pel-skala',   'label' => 'Skala Nilai'],
                    ['id' => 'pel-periode', 'label' => 'Pengaturan Periode'],
                ]],
                ['icon' => 'assessment', 'label' => 'Rekapitulasi', 'children' => [
                    ['id' => 'rek-pelaporan', 'label' => 'Rekap Pelaporan'],
                    ['id' => 'rek-dosen',     'label' => 'Jumlah Dosen'],
                    ['id' => 'rek-mhs',       'label' => 'Jumlah Mahasiswa'],
                ]],
                ['icon' => 'settings', 'label' => 'Pengaturan', 'children' => [
                    ['id' => 'set-sandbox',  'label' => 'Sandbox'],
                    ['id' => 'set-periode',  'label' => 'Pengaturan Periode'],
                    ['id' => 'set-log',      'label' => 'Log Feeder'],
                ]],
                ['icon' => 'file_download', 'label' => 'Export Data', 'children' => [
                    ['id' => 'exp-mhs',   'label' => 'Mahasiswa'],
                    ['id' => 'exp-kelas', 'label' => 'Kelas Perkuliahan'],
                    ['id' => 'exp-nilai', 'label' => 'Nilai'],
                ]],
                ['icon' => 'sync', 'label' => 'Sinkronisasi', 'children' => [
                    ['id' => 'syn-pddikti',  'label' => 'Sinkronisasi PDDIKTI'],
                    ['id' => 'syn-pengguna', 'label' => 'Sinkronisasi Pengguna'],
                    ['id' => 'syn-faq',      'label' => 'FAQ PDDIKTI'],
                ]],
            ],

            /* ─── Page Meta ─── */
            'pageMeta' => [
                'dashboard'      => ['icon' => 'dashboard',      'title' => 'Dashboard Akademik',    'desc' => 'Ringkasan data dan aktivitas perguruan tinggi',       'crumbs' => ['Dashboard']],
                'profil'         => ['icon' => 'account_circle',  'title' => 'Profil Perguruan Tinggi', 'desc' => 'Informasi identitas dan akun pengguna',             'crumbs' => ['Profil']],
                'mhs-daftar'     => ['icon' => 'school',          'title' => 'Daftar Mahasiswa',       'desc' => 'Data lengkap seluruh mahasiswa terdaftar',           'crumbs' => ['Mahasiswa', 'Daftar Mahasiswa']],
                'mhs-hapus'      => ['icon' => 'delete_forever',  'title' => 'Daftar Mahasiswa Hapus', 'desc' => 'Riwayat data mahasiswa yang dihapus',                'crumbs' => ['Mahasiswa', 'Daftar Mahasiswa Hapus']],
                'dsn-daftar'     => ['icon' => 'person',          'title' => 'Data Dosen',             'desc' => 'Daftar seluruh dosen perguruan tinggi',              'crumbs' => ['Dosen', 'Dosen']],
                'dsn-penugasan'  => ['icon' => 'assignment_ind',  'title' => 'Penugasan Dosen',        'desc' => 'Data penugasan mengajar dosen',                      'crumbs' => ['Dosen', 'Penugasan Dosen']],
                'kul-mk'         => ['icon' => 'menu_book',       'title' => 'Mata Kuliah',            'desc' => 'Daftar mata kuliah',                                 'crumbs' => ['Perkuliahan', 'Mata Kuliah']],
                'kul-kurikulum'  => ['icon' => 'account_tree',    'title' => 'Kurikulum',              'desc' => 'Data kurikulum per program studi',                   'crumbs' => ['Perkuliahan', 'Kurikulum']],
                'kul-kelas'      => ['icon' => 'groups',          'title' => 'Kelas Perkuliahan',      'desc' => 'Jadwal dan peserta kelas',                           'crumbs' => ['Perkuliahan', 'Kelas Perkuliahan']],
                'kul-nilai'      => ['icon' => 'grading',         'title' => 'Nilai Perkuliahan',      'desc' => 'Progres input nilai per kelas',                      'crumbs' => ['Perkuliahan', 'Nilai Perkuliahan']],
                'pel-skala'      => ['icon' => 'tune',            'title' => 'Skala Nilai',            'desc' => 'Konversi angka ke huruf mutu',                       'crumbs' => ['Pelengkap', 'Skala Nilai']],
                'pel-periode'    => ['icon' => 'calendar_month',  'title' => 'Pengaturan Periode',     'desc' => 'Konfigurasi semester akademik',                      'crumbs' => ['Pelengkap', 'Pengaturan Periode']],
                'rek-pelaporan'  => ['icon' => 'assessment',      'title' => 'Rekap Pelaporan',        'desc' => 'Ringkasan pelaporan data ke PDDIKTI',                'crumbs' => ['Rekapitulasi', 'Rekap Pelaporan']],
                'rek-dosen'      => ['icon' => 'people',          'title' => 'Jumlah Dosen',           'desc' => 'Rekapitulasi dosen per kategori',                    'crumbs' => ['Rekapitulasi', 'Jumlah Dosen']],
                'rek-mhs'        => ['icon' => 'groups',          'title' => 'Jumlah Mahasiswa',       'desc' => 'Rekapitulasi mahasiswa per prodi',                   'crumbs' => ['Rekapitulasi', 'Jumlah Mahasiswa']],
                'set-sandbox'    => ['icon' => 'science',         'title' => 'Sandbox',                'desc' => 'Mode sandbox untuk pengujian',                       'crumbs' => ['Pengaturan', 'Sandbox']],
                'set-periode'    => ['icon' => 'calendar_month',  'title' => 'Pengaturan Periode',     'desc' => 'Set periode perkuliahan aktif',                      'crumbs' => ['Pengaturan', 'Pengaturan Periode']],
                'set-log'        => ['icon' => 'receipt_long',    'title' => 'Log Feeder',             'desc' => 'Riwayat aktivitas sistem',                           'crumbs' => ['Pengaturan', 'Log Feeder']],
                'exp-mhs'        => ['icon' => 'school',          'title' => 'Export Mahasiswa',       'desc' => 'Data biodata dan status mahasiswa',                  'crumbs' => ['Export Data', 'Mahasiswa']],
                'exp-kelas'      => ['icon' => 'groups',          'title' => 'Export Kelas Perkuliahan', 'desc' => 'Data kelas dan peserta',                           'crumbs' => ['Export Data', 'Kelas Perkuliahan']],
                'exp-nilai'      => ['icon' => 'grading',         'title' => 'Export Nilai',           'desc' => 'Data nilai per kelas',                               'crumbs' => ['Export Data', 'Nilai']],
                'syn-pddikti'    => ['icon' => 'cloud_upload',    'title' => 'Sinkronisasi PDDIKTI',   'desc' => 'Kirim data ke server PDDIKTI',                       'crumbs' => ['Sinkronisasi', 'Sinkronisasi PDDIKTI']],
                'syn-pengguna'   => ['icon' => 'group',           'title' => 'Sinkronisasi Pengguna',  'desc' => 'Sinkronisasi data pengguna',                         'crumbs' => ['Sinkronisasi', 'Sinkronisasi Pengguna']],
                'syn-faq'        => ['icon' => 'help',            'title' => 'FAQ PDDIKTI',            'desc' => 'Pertanyaan seputar sinkronisasi',                     'crumbs' => ['Sinkronisasi', 'FAQ PDDIKTI']],
            ],

            /* ─── Theme Options ─── */
            'themeOpts' => [
                ['id' => 'light', 'icon' => 'light_mode', 'label' => 'Terang'],
                ['id' => 'dark', 'icon' => 'dark_mode', 'label' => 'Gelap'],
            ]
        ];
    }
}
