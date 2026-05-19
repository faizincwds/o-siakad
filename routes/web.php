<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Dashboard & Profil
    Route::get('/', [PageController::class, 'index'])->name('index');
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/profil', [PageController::class, 'profil'])->name('profil');

    // Mahasiswa
    Route::get('/mahasiswa/daftar', [PageController::class, 'mhsDaftar'])->name('mahasiswa.daftar');
    Route::get('/mahasiswa/hapus', [PageController::class, 'mhsHapus'])->name('mahasiswa.hapus');

    // Dosen
    Route::get('/dosen/daftar', [PageController::class, 'dsnDaftar'])->name('dosen.daftar');
    Route::get('/dosen/penugasan', [PageController::class, 'dsnPenugasan'])->name('dosen.penugasan');

    // Perkuliahan
    Route::get('/perkuliahan/mata-kuliah', [PageController::class, 'kulMk'])->name('perkuliahan.mata-kuliah');
    Route::get('/perkuliahan/substansi', [PageController::class, 'kulSubstansi'])->name('perkuliahan.substansi');
    Route::get('/perkuliahan/kurikulum', [PageController::class, 'kulKurikulum'])->name('perkuliahan.kurikulum');
    Route::get('/perkuliahan/kelas', [PageController::class, 'kulKelas'])->name('perkuliahan.kelas');
    Route::get('/perkuliahan/nilai', [PageController::class, 'kulNilai'])->name('perkuliahan.nilai');
    Route::get('/perkuliahan/aktivitas-kuliah', [PageController::class, 'kulAktif'])->name('perkuliahan.aktivitas-kuliah');
    Route::get('/perkuliahan/hitung-aktivitas', [PageController::class, 'kulHitung'])->name('perkuliahan.hitung-aktivitas');
    Route::get('/perkuliahan/aktivitas-mahasiswa', [PageController::class, 'kulAktifmhs'])->name('perkuliahan.aktivitas-mahasiswa');
    Route::get('/perkuliahan/konversi', [PageController::class, 'kulKonversi'])->name('perkuliahan.konversi');
    Route::get('/perkuliahan/lulus-do', [PageController::class, 'kulLulusdo'])->name('perkuliahan.lulus-do');
    Route::get('/perkuliahan/transkrip-angkatan', [PageController::class, 'kulTranskripang'])->name('perkuliahan.transkrip-angkatan');
    Route::get('/perkuliahan/cek-transkrip', [PageController::class, 'kulCektrans'])->name('perkuliahan.cek-transkrip');

    // Pelengkap
    Route::get('/pelengkap/skala-nilai', [PageController::class, 'pelSkala'])->name('pelengkap.skala-nilai');
    Route::get('/pelengkap/periode', [PageController::class, 'pelPeriode'])->name('pelengkap.periode');

    // Rekapitulasi
    Route::get('/rekapitulasi/pelaporan', [PageController::class, 'rekPelaporan'])->name('rekapitulasi.pelaporan');
    Route::get('/rekapitulasi/dosen', [PageController::class, 'rekDosen'])->name('rekapitulasi.dosen');
    Route::get('/rekapitulasi/mahasiswa', [PageController::class, 'rekMhs'])->name('rekapitulasi.mahasiswa');
    Route::get('/rekapitulasi/ips', [PageController::class, 'rekIps'])->name('rekapitulasi.ips');
    Route::get('/rekapitulasi/krs', [PageController::class, 'rekKrs'])->name('rekapitulasi.krs');
    Route::get('/rekapitulasi/khs', [PageController::class, 'rekKhs'])->name('rekapitulasi.khs');
    Route::get('/rekapitulasi/status-mahasiswa', [PageController::class, 'rekStatus'])->name('rekapitulasi.status-mahasiswa');
    Route::get('/rekapitulasi/sks-dosen', [PageController::class, 'rekSksdosen'])->name('rekapitulasi.sks-dosen');
    Route::get('/rekapitulasi/pddikti', [PageController::class, 'rekPddikti'])->name('rekapitulasi.pddikti');

    // Pengaturan
    Route::get('/pengaturan/sandbox', [PageController::class, 'setSandbox'])->name('pengaturan.sandbox');
    Route::get('/pengaturan/periode', [PageController::class, 'setPeriode'])->name('pengaturan.periode');
    Route::get('/pengaturan/transkrip', [PageController::class, 'setTranskrip'])->name('pengaturan.transkrip');
    Route::get('/pengaturan/validasi', [PageController::class, 'setValidasi'])->name('pengaturan.validasi');
    Route::get('/pengaturan/kode-registrasi', [PageController::class, 'setKode'])->name('pengaturan.kode-registrasi');
    Route::get('/pengaturan/update', [PageController::class, 'setUpdate'])->name('pengaturan.update');
    Route::get('/pengaturan/log', [PageController::class, 'setLog'])->name('pengaturan.log');

    // Export Data
    Route::get('/export/mahasiswa', [PageController::class, 'expMhs'])->name('export.mahasiswa');
    Route::get('/export/nilai-transfer', [PageController::class, 'expNilaitransfer'])->name('export.nilai-transfer');
    Route::get('/export/penugasan', [PageController::class, 'expPenugasan'])->name('export.penugasan');
    Route::get('/export/mata-kuliah', [PageController::class, 'expMk'])->name('export.mata-kuliah');
    Route::get('/export/kelas', [PageController::class, 'expKelas'])->name('export.kelas');
    Route::get('/export/kelas-rencana-evaluasi', [PageController::class, 'expKelasren'])->name('export.kelas-rencana-evaluasi');
    Route::get('/export/krs', [PageController::class, 'expKrs'])->name('export.krs');
    Route::get('/export/nilai-komponen-evaluasi', [PageController::class, 'expNilaikev'])->name('export.nilai-komponen-evaluasi');
    Route::get('/export/aktivitas-dosen', [PageController::class, 'expAktifdosen'])->name('export.aktivitas-dosen');
    Route::get('/export/aktivitas-kuliah', [PageController::class, 'expAktifkul'])->name('export.aktivitas-kuliah');
    Route::get('/export/lulus-do', [PageController::class, 'expLulusdo'])->name('export.lulus-do');
    Route::get('/export/transkrip', [PageController::class, 'expTranskrip'])->name('export.transkrip');

    // Sinkronisasi
    Route::get('/sinkronisasi/pddikti', [PageController::class, 'synPddikti'])->name('sinkronisasi.pddikti');
    Route::get('/sinkronisasi/pengguna', [PageController::class, 'synPengguna'])->name('sinkronisasi.pengguna');
    Route::get('/sinkronisasi/table', [PageController::class, 'synTable'])->name('sinkronisasi.table');
    Route::get('/sinkronisasi/faq', [PageController::class, 'synFaq'])->name('sinkronisasi.faq');
