<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Full sidebar menu structure matching the original MN array.
     */
    private array $sidebarMenu = [
        ['id' => 'dashboard', 'icon' => 'dashboard', 'label' => 'Dashboard'],
        ['id' => 'profil', 'icon' => 'account_circle', 'label' => 'Profil'],
        ['icon' => 'school', 'label' => 'Mahasiswa', 'sub' => [
            ['id' => 'mahasiswa.daftar', 'label' => 'Daftar Mahasiswa'],
            ['id' => 'mahasiswa.hapus', 'label' => 'Daftar Mahasiswa Hapus'],
        ]],
        ['icon' => 'person', 'label' => 'Dosen', 'sub' => [
            ['id' => 'dosen.daftar', 'label' => 'Dosen'],
            ['id' => 'dosen.penugasan', 'label' => 'Penugasan Dosen'],
        ]],
        ['icon' => 'menu_book', 'label' => 'Perkuliahan', 'sub' => [
            ['id' => 'perkuliahan.mata-kuliah', 'label' => 'Mata Kuliah'],
            ['id' => 'perkuliahan.substansi', 'label' => 'Substansi Kuliah'],
            ['id' => 'perkuliahan.kurikulum', 'label' => 'Kurikulum'],
            ['id' => 'perkuliahan.kelas', 'label' => 'Kelas Perkuliahan'],
            ['id' => 'perkuliahan.nilai', 'label' => 'Nilai Perkuliahan'],
            ['id' => 'perkuliahan.aktivitas-kuliah', 'label' => 'Aktivitas Kuliah Mahasiswa'],
            ['id' => 'perkuliahan.hitung-aktivitas', 'label' => 'Hitung Aktivitas Perkuliahan'],
            ['id' => 'perkuliahan.aktivitas-mahasiswa', 'label' => 'Aktivitas Mahasiswa'],
            ['id' => 'perkuliahan.konversi', 'label' => 'Konversi Aktivitas Mahasiswa'],
            ['id' => 'perkuliahan.lulus-do', 'label' => 'Daftar Mahasiswa Lulus / Dropout'],
            ['id' => 'perkuliahan.transkrip-angkatan', 'label' => 'Perhitungan Transkrip Angkatan'],
            ['id' => 'perkuliahan.cek-transkrip', 'label' => 'Cek Transkrip Mahasiswa'],
        ]],
        ['icon' => 'tune', 'label' => 'Pelengkap', 'sub' => [
            ['id' => 'pelengkap.skala-nilai', 'label' => 'Skala Nilai'],
            ['id' => 'pelengkap.periode', 'label' => 'Pengaturan Periode Perkuliahan'],
        ]],
        ['icon' => 'assessment', 'label' => 'Rekapitulasi', 'sub' => [
            ['id' => 'rekapitulasi.pelaporan', 'label' => 'Rekap Pelaporan'],
            ['id' => 'rekapitulasi.dosen', 'label' => 'Jumlah Dosen'],
            ['id' => 'rekapitulasi.mahasiswa', 'label' => 'Jumlah Mahasiswa'],
            ['id' => 'rekapitulasi.ips', 'label' => 'Rekap IPS Mahasiswa'],
            ['id' => 'rekapitulasi.krs', 'label' => 'KRS Mahasiswa'],
            ['id' => 'rekapitulasi.khs', 'label' => 'KHS Mahasiswa'],
            ['id' => 'rekapitulasi.status-mahasiswa', 'label' => 'Laporan Status Mahasiswa'],
            ['id' => 'rekapitulasi.sks-dosen', 'label' => 'Laporan SKS Dosen Mengajar'],
            ['id' => 'rekapitulasi.pddikti', 'label' => 'Rekap Pelaporan PDDIKTI Per Checkpoint'],
        ]],
        ['icon' => 'settings', 'label' => 'Pengaturan', 'sub' => [
            ['id' => 'pengaturan.sandbox', 'label' => 'Sandbox'],
            ['id' => 'pengaturan.periode', 'label' => 'Pengaturan Periode'],
            ['id' => 'pengaturan.transkrip', 'label' => 'Pengaturan Transkrip'],
            ['id' => 'pengaturan.validasi', 'label' => 'Validasi Feeder'],
            ['id' => 'pengaturan.kode-registrasi', 'label' => 'Update Kode Registrasi'],
            ['id' => 'pengaturan.update', 'label' => 'Update Aplikasi'],
            ['id' => 'pengaturan.log', 'label' => 'Log Feeder'],
        ]],
        ['icon' => 'file_download', 'label' => 'Export Data', 'sub' => [
            ['id' => 'export.mahasiswa', 'label' => 'Mahasiswa'],
            ['id' => 'export.nilai-transfer', 'label' => 'Nilai Transfer'],
            ['id' => 'export.penugasan', 'label' => 'Penugasan Dosen'],
            ['id' => 'export.mata-kuliah', 'label' => 'Mata Kuliah'],
            ['id' => 'export.kelas', 'label' => 'Kelas Perkuliahan'],
            ['id' => 'export.kelas-rencana-evaluasi', 'label' => 'Kelas Perkuliahan Rencana Evaluasi'],
            ['id' => 'export.krs', 'label' => 'KRS Mahasiswa'],
            ['id' => 'export.nilai-komponen-evaluasi', 'label' => 'Nilai Komponen Evaluasi'],
            ['id' => 'export.aktivitas-dosen', 'label' => 'Aktivitas Mengajar Dosen'],
            ['id' => 'export.aktivitas-kuliah', 'label' => 'Aktivitas Kuliah'],
            ['id' => 'export.lulus-do', 'label' => 'Mahasiswa Lulus / DO'],
            ['id' => 'export.transkrip', 'label' => 'Transkip'],
        ]],
        ['icon' => 'sync', 'label' => 'Sinkronisasi', 'sub' => [
            ['id' => 'sinkronisasi.pddikti', 'label' => 'Sinkronisasi PDDIKTI'],
            ['id' => 'sinkronisasi.pengguna', 'label' => 'Sinkronisasi Pengguna'],
            ['id' => 'sinkronisasi.table', 'label' => 'Sinkronisasi PDDIKTI Table'],
            ['id' => 'sinkronisasi.faq', 'label' => 'FAQ PDDIKTI'],
        ]],
    ];

    /**
     * Build common view data shared across all pages.
     */
    private function viewData(
        string $activePage,
        array $breadcrumbs,
        string $pageTitle,
        string $pageDescription,
        string $pageIcon,
        array $extra = [],
    ): array {
        return array_merge([
            'sidebarMenu' => $this->sidebarMenu,
            'activePage' => $activePage,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'pageIcon' => $pageIcon,
        ], $extra);
    }

    /**
     * Build a data-table page's view data.
     */
    private function tableViewData(
        string $activePage,
        array $breadcrumbs,
        string $pageTitle,
        string $pageDescription,
        string $pageIcon,
        array $columns,
        array $rows,
        array $badges = [],
        int $perPage = 8,
    ): array {
        return $this->viewData($activePage, $breadcrumbs, $pageTitle, $pageDescription, $pageIcon, [
            'columns' => $columns,
            'rows' => $rows,
            'badges' => $badges,
            'perPage' => $perPage,
        ]);
    }

    /**
     * Build an export page's view data.
     */
    private function exportViewData(
        string $activePage,
        string $exportTitle,
        string $exportDescription,
        string $exportIcon,
    ): array {
        return $this->viewData($activePage, ['Export Data', $exportTitle], $exportTitle, $exportDescription, $exportIcon, [
            'exportTitle' => $exportTitle,
            'exportDescription' => $exportDescription,
            'exportIcon' => $exportIcon,
        ]);
    }

    // ───────────────────────────────────────────────
    //  DEMO DATA
    // ───────────────────────────────────────────────

    private function mhsDData(): array
    {
        return [
            'columns' => ['NIM', 'Nama', 'Prodi', 'Smt', 'IPK', 'SKS', 'Status'],
            'rows' => [
                ['2024001001', 'Ahmad Rizky Pratama', 'Teknik Informatika', '4', '3.72', '86', 'Aktif'],
                ['2024001002', 'Siti Nurhaliza Putri', 'Sistem Informasi', '4', '3.65', '78', 'Aktif'],
                ['2023001023', 'Muhammad Farhan Hakim', 'Teknik Informatika', '6', '3.81', '110', 'Aktif'],
                ['2023001045', 'Dewi Anggraini', 'Manajemen', '6', '3.45', '102', 'Aktif'],
                ['2022002011', 'Budi Santoso', 'Akuntansi', '8', '3.58', '138', 'Cuti'],
                ['2024002003', 'Rina Wulandari', 'Manajemen', '4', '3.33', '80', 'Aktif'],
                ['2023002008', 'Fajar Nugroho', 'Akuntansi', '6', '3.27', '96', 'Aktif'],
                ['2022003005', 'Anisa Rahma', 'Ilmu Komunikasi', '8', '3.91', '140', 'Aktif'],
                ['2021004012', 'Dian Permana', 'Teknik Informatika', '10', '3.55', '148', 'Lulus'],
                ['2024003007', 'Hendra Wijaya', 'Ilmu Komunikasi', '4', '3.10', '72', 'Aktif'],
                ['2023003001', 'Lestari Dewi', 'Ilmu Komunikasi', '6', '3.48', '98', 'Aktif'],
                ['2024001008', 'Rizky Aditya', 'Teknik Informatika', '4', '3.60', '84', 'Aktif'],
                ['2022001009', 'Putri Maharani', 'Sistem Informasi', '8', '3.74', '136', 'Aktif'],
                ['2023002015', 'Yoga Pratama', 'Manajemen', '6', '3.15', '0', 'DO'],
                ['2024002009', 'Sari Indah', 'Manajemen', '4', '3.42', '82', 'Aktif'],
                ['2021002005', 'Maya Sari', 'Manajemen', '10', '3.87', '146', 'Lulus'],
                ['2023002019', 'Bayu Prasetyo', 'Akuntansi', '6', '3.51', '100', 'Aktif'],
                ['2024003003', 'Dimas Arya', 'Ilmu Komunikasi', '4', '3.20', '76', 'Aktif'],
                ['2022003010', 'Andi Saputra', 'Ilmu Komunikasi', '8', '3.38', '130', 'Aktif'],
                ['2023001006', 'Nadia Fitriani', 'Sistem Informasi', '6', '3.69', '104', 'Aktif'],
            ],
            'badges' => [6 => ['Aktif' => 'tg-p', 'Cuti' => 'tg-u', 'Lulus' => 'tg-u', 'DO' => 'tg-n']],
        ];
    }

    private function mhsHData(): array
    {
        return [
            'columns' => ['NIM', 'Nama', 'Prodi', 'Smt', 'Alasan Hapus', 'Tgl Hapus'],
            'rows' => [
                ['2022004020', 'Rizal Firmansyah', 'Teknik Informatika', '6', 'Pindah PT lain', '2024-09-15'],
                ['2023003008', 'Indah Permata', 'Ilmu Komunikasi', '4', 'Mengundurkan diri', '2025-01-20'],
                ['2023001005', 'Dani Setiawan', 'Sistem Informasi', '4', 'Tidak memenuhi syarat', '2024-12-10'],
                ['2024002006', 'Rahma Aulia', 'Manajemen', '2', 'Pindah prodi', '2025-03-05'],
            ],
        ];
    }

    private function dsnDData(): array
    {
        return [
            'columns' => ['NIDN', 'Nama', 'Home Base', 'Jabatan', 'Pendidikan', 'Sertifikasi', 'Status'],
            'rows' => [
                ['0012345678', 'Prof. Dr. Ir. Bambang Susilo, M.Sc.', 'TI', 'Guru Besar', 'S3', 'Tersertifikasi', 'Aktif'],
                ['0023456789', 'Dr. Siti Aminah, M.Kom.', 'SI', 'Lektor Kepala', 'S3', 'Tersertifikasi', 'Aktif'],
                ['0034567890', 'Dr. Hendra Kusuma, M.T.', 'TI', 'Lektor Kepala', 'S3', 'Tersertifikasi', 'Aktif'],
                ['0045678901', 'Ir. Yulianto Prabowo, M.Kom.', 'TI', 'Lektor', 'S2', 'Tersertifikasi', 'Aktif'],
                ['0056789012', 'Dra. Ratna Dewi, M.M.', 'MN', 'Lektor Kepala', 'S2', 'Tersertifikasi', 'Aktif'],
                ['0067890123', 'Dr. Agus Salim, M.Si.', 'MN', 'Lektor', 'S3', 'Tersertifikasi', 'Aktif'],
                ['0078901234', 'Drs. Joko Widodo, M.Ak.', 'AK', 'Lektor Kepala', 'S2', 'Tersertifikasi', 'Aktif'],
                ['0089012345', 'Dr. Rina Marlina, M.I.Kom.', 'IK', 'Lektor', 'S3', 'Belum', 'Aktif'],
                ['0090123456', 'Dewi Safitri, S.Kom., M.Kom.', 'SI', 'Asisten Ahli', 'S2', 'Belum', 'Aktif'],
                ['0101234567', 'Andi Prasetyo, S.T., M.Kom.', 'TI', 'Asisten Ahli', 'S2', 'Belum', 'Aktif'],
            ],
            'badges' => [5 => ['Tersertifikasi' => 'tg-p', 'Belum' => 'tg-u']],
        ];
    }

    private function dsnPData(): array
    {
        return [
            'columns' => ['ID Penugasan', 'NIDN', 'Nama Dosen', 'Prodi', 'Semester', 'SKS', 'Kelas'],
            'rows' => [
                ['PG-001', '0012345678', 'Prof. Bambang Susilo', 'TI', 'Genap 2025/2026', '8', '2'],
                ['PG-002', '0023456789', 'Dr. Siti Aminah', 'SI', 'Genap 2025/2026', '10', '3'],
                ['PG-003', '0034567890', 'Dr. Hendra Kusuma', 'TI', 'Genap 2025/2026', '6', '2'],
                ['PG-004', '0045678901', 'Ir. Yulianto', 'TI', 'Genap 2025/2026', '8', '2'],
                ['PG-005', '0056789012', 'Dra. Ratna Dewi', 'MN', 'Genap 2025/2026', '12', '3'],
                ['PG-006', '0067890123', 'Dr. Agus Salim', 'MN', 'Genap 2025/2026', '10', '3'],
                ['PG-007', '0078901234', 'Drs. Joko Widodo', 'AK', 'Genap 2025/2026', '12', '3'],
                ['PG-008', '0089012345', 'Dr. Rina Marlina', 'IK', 'Genap 2025/2026', '6', '2'],
            ],
        ];
    }

    private function mkDData(): array
    {
        return [
            'columns' => ['Kode', 'Nama MK', 'SKS', 'Smt', 'Jenis', 'TM/Prak/Lab', 'Prodi'],
            'rows' => [
                ['TI101', 'Pengantar Teknik Informatika', '3', '1', 'Wajib', '2/0/1', 'TI'],
                ['TI102', 'Algoritma dan Pemrograman', '4', '1', 'Wajib', '2/2/0', 'TI'],
                ['TI201', 'Struktur Data', '3', '2', 'Wajib', '2/0/1', 'TI'],
                ['TI202', 'Basis Data', '4', '2', 'Wajib', '2/2/0', 'TI'],
                ['TI301', 'Rekayasa Perangkat Lunak', '3', '5', 'Wajib', '2/0/1', 'TI'],
                ['TI302', 'Kecerdasan Buatan', '3', '5', 'Pilihan', '2/0/1', 'TI'],
                ['SI101', 'Pengantar Sistem Informasi', '3', '1', 'Wajib', '3/0/0', 'SI'],
                ['SI201', 'Analisis Sistem', '3', '3', 'Wajib', '2/0/1', 'SI'],
                ['MN101', 'Pengantar Manajemen', '3', '1', 'Wajib', '3/0/0', 'MN'],
                ['AK101', 'Pengantar Akuntansi', '4', '1', 'Wajib', '3/0/1', 'AK'],
                ['IK101', 'Pengantar Ilmu Komunikasi', '3', '1', 'Wajib', '3/0/0', 'IK'],
            ],
            'badges' => [4 => ['Wajib' => 'tg-u', 'Pilihan' => 'tg-u']],
        ];
    }

    private function subDData(): array
    {
        return [
            'columns' => ['ID', 'Kode MK', 'Nama Substansi', 'SKS', 'Urutan'],
            'rows' => [
                ['SUB-001', 'TI102', 'Pengenalan Algoritma', '1', '1'],
                ['SUB-002', 'TI102', 'Percabangan & Perulangan', '1', '2'],
                ['SUB-003', 'TI102', 'Array & String', '1', '3'],
                ['SUB-004', 'TI102', 'Fungsi & Prosedur', '1', '4'],
                ['SUB-001', 'TI201', 'Array Static & Dynamic', '1', '1'],
                ['SUB-002', 'TI201', 'Stack & Queue', '1', '2'],
                ['SUB-003', 'TI201', 'Linked List', '1', '3'],
                ['SUB-001', 'TI202', 'ER Model & Normalisasi', '1', '1'],
                ['SUB-002', 'TI202', 'SQL & DDL', '1', '2'],
                ['SUB-003', 'TI202', 'Query Lanjutan', '1', '3'],
                ['SUB-004', 'TI202', 'Praktikum Basis Data', '1', '4'],
            ],
        ];
    }

    private function kurDData(): array
    {
        return [
            'columns' => ['ID', 'Nama', 'Prodi', 'Tahun', 'Jml MK', 'Total SKS', 'Wajib', 'Pilihan', 'Status'],
            'rows' => [
                ['KR-001', 'Kurikulum 2024', 'TI', '2024', '45', '144', '120', '24', 'Aktif'],
                ['KR-002', 'Kurikulum 2020', 'TI', '2020', '40', '140', '116', '24', 'Nonaktif'],
                ['KR-003', 'Kurikulum 2024', 'SI', '2024', '42', '138', '114', '24', 'Aktif'],
                ['KR-004', 'Kurikulum 2024', 'MN', '2024', '38', '132', '108', '24', 'Aktif'],
                ['KR-005', 'Kurikulum 2024', 'AK', '2024', '40', '140', '116', '24', 'Aktif'],
                ['KR-006', 'Kurikulum 2024', 'IK', '2024', '36', '126', '108', '18', 'Aktif'],
            ],
            'badges' => [8 => ['Aktif' => 'tg-p', 'Nonaktif' => 'tg-u']],
        ];
    }

    private function kelDData(): array
    {
        return [
            'columns' => ['Kode Kelas', 'Mata Kuliah', 'Dosen', 'Hari', 'Jam', 'Ruang', 'Prodi', 'Peserta'],
            'rows' => [
                ['TI-A-2401', 'Algoritma dan Pemrograman', 'Ir. Yulianto', 'Senin', '08:00-11:30', 'Lab A1', 'TI', '42'],
                ['TI-A-2402', 'Basis Data', 'Andi Prasetyo', 'Selasa', '08:00-11:30', 'Lab A2', 'TI', '38'],
                ['TI-A-2403', 'Struktur Data', 'Dr. Fauzi Rahman', 'Rabu', '08:00-10:30', 'Lab A1', 'TI', '40'],
                ['SI-A-2401', 'Analisis Sistem', 'Dewi Safitri', 'Kamis', '08:00-10:30', 'Lab B1', 'SI', '35'],
                ['SI-A-2402', 'SPK', 'Dr. Siti Aminah', 'Jumat', '08:00-10:30', 'Lab B1', 'SI', '30'],
                ['MN-A-2401', 'Manajemen Keuangan', 'Dra. Ratna Dewi', 'Senin', '13:00-15:30', 'R.201', 'MN', '45'],
                ['AK-A-2401', 'Pengantar Akuntansi', 'Drs. Joko Widodo', 'Selasa', '13:00-16:30', 'R.301', 'AK', '44'],
                ['IK-A-2401', 'Media Digital', 'Dr. Rina Marlina', 'Kamis', '13:00-15:30', 'R.401', 'IK', '32'],
            ],
        ];
    }

    private function nilDData(): array
    {
        return [
            'columns' => ['Kode Kelas', 'Mata Kuliah', 'Dosen', 'Total', 'Sudah', 'Belum', '%', 'Status'],
            'rows' => [
                ['TI-A-2401', 'Algoritma', 'Ir. Yulianto', '42', '42', '0', '100%', 'Selesai'],
                ['TI-A-2402', 'Basis Data', 'Andi Prasetyo', '38', '30', '8', '79%', 'Proses'],
                ['TI-A-2403', 'Struktur Data', 'Dr. Fauzi Rahman', '40', '40', '0', '100%', 'Selesai'],
                ['SI-A-2401', 'Analisis Sistem', 'Dewi Safitri', '35', '20', '15', '57%', 'Proses'],
                ['SI-A-2402', 'SPK', 'Dr. Siti Aminah', '30', '0', '30', '0%', 'Belum'],
                ['MN-A-2401', 'Manaj. Keuangan', 'Dra. Ratna Dewi', '45', '45', '0', '100%', 'Selesai'],
                ['AK-A-2401', 'Pengantar Akt.', 'Drs. Joko Widodo', '44', '44', '0', '100%', 'Selesai'],
                ['IK-A-2401', 'Media Digital', 'Dr. Rina Marlina', '32', '10', '22', '31%', 'Proses'],
            ],
            'badges' => [7 => ['Selesai' => 'tg-p', 'Proses' => 'tg-u', 'Belum' => 'tg-n']],
        ];
    }

    private function ldoDData(): array
    {
        return [
            'columns' => ['NIM', 'Nama', 'Prodi', 'Smt', 'Status', 'Tgl', 'IPK'],
            'rows' => [
                ['2021004012', 'Dian Permana', 'TI', '10', 'Lulus', '2025-02-15', '3.55'],
                ['2021002005', 'Maya Sari', 'MN', '10', 'Lulus', '2025-02-15', '3.87'],
                ['2020001015', 'Rahmat Hidayat', 'TI', '8', 'Lulus', '2024-09-20', '3.92'],
                ['2023002015', 'Yoga Pratama', 'MN', '6', 'Dropout', '2025-01-20', '3.15'],
                ['2022004020', 'Rizal Firmansyah', 'TI', '6', 'Dropout', '2024-09-15', '2.98'],
            ],
            'badges' => [4 => ['Lulus' => 'tg-p', 'Dropout' => 'tg-n']],
        ];
    }

    private function sklDData(): array
    {
        return [
            'columns' => ['Huruf', 'Bobot', 'Rentang', 'Keterangan'],
            'rows' => [
                ['A', '4.00', '85 - 100', 'Sangat Baik'],
                ['A-', '3.70', '80 - 84.99', 'Sangat Baik'],
                ['B+', '3.30', '75 - 79.99', 'Baik'],
                ['B', '3.00', '70 - 74.99', 'Baik'],
                ['B-', '2.70', '65 - 69.99', 'Cukup Baik'],
                ['C+', '2.30', '60 - 64.99', 'Cukup'],
                ['C', '2.00', '55 - 59.99', 'Cukup'],
                ['D', '1.00', '40 - 54.99', 'Kurang'],
                ['E', '0.00', '0 - 39.99', 'Tidak Lulus'],
            ],
        ];
    }

    private function sLogData(): array
    {
        return [
            ['w' => 'Baru saja', 't' => 'Full Sync', 'n' => 2395, 's' => 'sukses', 'sc' => 'tg-p'],
            ['w' => 'Hari ini, 07:45', 't' => 'Mahasiswa', 'n' => 342, 's' => 'sukses', 'sc' => 'tg-p'],
            ['w' => 'Hari ini, 07:42', 't' => 'Dosen', 'n' => 186, 's' => 'sukses', 'sc' => 'tg-p'],
            ['w' => 'Kemarin, 16:30', 't' => 'Nilai', 'n' => 1847, 's' => 'sukses', 'sc' => 'tg-p'],
            ['w' => 'Kemarin, 16:28', 't' => 'Kelas Kuliah', 'n' => 520, 's' => 'gagal', 'sc' => 'tg-n'],
            ['w' => '28 Apr, 09:15', 't' => 'Kurikulum', 'n' => 8, 's' => 'sukses', 'sc' => 'tg-p'],
        ];
    }

    // ───────────────────────────────────────────────
    //  PAGE METHODS
    // ───────────────────────────────────────────────

    public function index(): View
    {
        return view('pages.test', $this->viewData(
            'dashboard',
            ['Dashboard'],
            'Dashboard',
            'Ringkasan data akademik',
            'dashboard',
        ));
    }
    
    public function dashboard(): View
    {
        return view('pages.dashboard', $this->viewData(
            'dashboard',
            ['Dashboard'],
            'Dashboard',
            'Ringkasan data akademik',
            'dashboard',
            [
                'sLog' => $this->sLogData(),
                'kelasHariIni' => $this->kelDData()['rows'],
            ],
        ));
    }

    public function profil(): View
    {
        return view('pages.profil', $this->viewData(
            'profil',
            ['Profil'],
            'Profil Perguruan Tinggi',
            'Informasi identitas PT',
            'account_circle',
        ));
    }

    public function mhsDaftar(): View
    {
        $data = $this->mhsDData();
        return view('pages.mahasiswa.daftar', $this->tableViewData(
            'mahasiswa.daftar',
            ['Mahasiswa', 'Daftar Mahasiswa'],
            'Daftar Mahasiswa',
            'Data lengkap seluruh mahasiswa terdaftar',
            'school',
            $data['columns'],
            $data['rows'],
            $data['badges'] ?? [],
        ));
    }

    public function mhsHapus(): View
    {
        $data = $this->mhsHData();
        return view('pages.mahasiswa.hapus', $this->tableViewData(
            'mahasiswa.hapus',
            ['Mahasiswa', 'Daftar Mahasiswa Hapus'],
            'Daftar Mahasiswa Hapus',
            'Riwayat data mahasiswa yang dihapus',
            'delete_forever',
            $data['columns'],
            $data['rows'],
            $data['badges'] ?? [],
        ));
    }

    public function dsnDaftar(): View
    {
        $data = $this->dsnDData();
        return view('pages.dosen.daftar', $this->tableViewData(
            'dosen.daftar',
            ['Dosen', 'Dosen'],
            'Data Dosen',
            'Daftar seluruh dosen perguruan tinggi',
            'person',
            $data['columns'],
            $data['rows'],
            $data['badges'] ?? [],
        ));
    }

    public function dsnPenugasan(): View
    {
        $data = $this->dsnPData();
        return view('pages.dosen.penugasan', $this->tableViewData(
            'dosen.penugasan',
            ['Dosen', 'Penugasan Dosen'],
            'Penugasan Dosen',
            'Data penugasan mengajar dosen',
            'assignment_ind',
            $data['columns'],
            $data['rows'],
            $data['badges'] ?? [],
        ));
    }

    public function kulMk(): View
    {
        $data = $this->mkDData();
        return view('pages.perkuliahan.mata-kuliah', $this->tableViewData(
            'perkuliahan.mata-kuliah',
            ['Perkuliahan', 'Mata Kuliah'],
            'Mata Kuliah',
            'Daftar mata kuliah',
            'menu_book',
            $data['columns'],
            $data['rows'],
            $data['badges'] ?? [],
            10,
        ));
    }

    public function kulSubstansi(): View
    {
        $data = $this->subDData();
        return view('pages.perkuliahan.substansi', $this->tableViewData(
            'perkuliahan.substansi',
            ['Perkuliahan', 'Substansi Kuliah'],
            'Substansi Kuliah',
            'Komponen substansi dalam mata kuliah',
            'view_list',
            $data['columns'],
            $data['rows'],
            $data['badges'] ?? [],
        ));
    }

    public function kulKurikulum(): View
    {
        $data = $this->kurDData();
        return view('pages.perkuliahan.kurikulum', $this->tableViewData(
            'perkuliahan.kurikulum',
            ['Perkuliahan', 'Kurikulum'],
            'Kurikulum',
            'Data kurikulum per program studi',
            'account_tree',
            $data['columns'],
            $data['rows'],
            $data['badges'] ?? [],
            6,
        ));
    }

    public function kulKelas(): View
    {
        $data = $this->kelDData();
        return view('pages.perkuliahan.kelas', $this->tableViewData(
            'perkuliahan.kelas',
            ['Perkuliahan', 'Kelas Perkuliahan'],
            'Kelas Perkuliahan',
            'Jadwal dan peserta kelas',
            'groups',
            $data['columns'],
            $data['rows'],
            $data['badges'] ?? [],
        ));
    }

    public function kulNilai(): View
    {
        $data = $this->nilDData();
        return view('pages.perkuliahan.nilai', $this->tableViewData(
            'perkuliahan.nilai',
            ['Perkuliahan', 'Nilai Perkuliahan'],
            'Nilai Perkuliahan',
            'Progres input nilai per kelas',
            'grading',
            $data['columns'],
            $data['rows'],
            $data['badges'] ?? [],
        ));
    }

    public function kulAktif(): View
    {
        return view('pages.perkuliahan.aktivitas-kuliah', $this->viewData(
            'perkuliahan.aktivitas-kuliah',
            ['Perkuliahan', 'Aktivitas Kuliah Mahasiswa'],
            'Aktivitas Kuliah Mahasiswa',
            'Data kehadiran dan aktivitas kuliah',
            'fact_check',
            ['infoType' => 'feature', 'featureIcon' => 'event_available', 'featureTitle' => 'Fitur Aktivitas Kuliah Mahasiswa', 'featureDesc' => 'Data kehadiran, izin, dan sakit per mahasiswa'],
        ));
    }

    public function kulHitung(): View
    {
        return view('pages.perkuliahan.hitung-aktivitas', $this->viewData(
            'perkuliahan.hitung-aktivitas',
            ['Perkuliahan', 'Hitung Aktivitas Perkuliahan'],
            'Hitung Aktivitas Perkuliahan',
            'Perhitungan otomatis aktivitas',
            'calculate',
            ['infoType' => 'hitung-aktivitas'],
        ));
    }

    public function kulAktifmhs(): View
    {
        return view('pages.perkuliahan.aktivitas-mahasiswa', $this->viewData(
            'perkuliahan.aktivitas-mahasiswa',
            ['Perkuliahan', 'Aktivitas Mahasiswa'],
            'Aktivitas Mahasiswa',
            'Riwayat aktivitas per mahasiswa',
            'history',
            ['infoType' => 'aktivitas-mahasiswa'],
        ));
    }

    public function kulKonversi(): View
    {
        return view('pages.perkuliahan.konversi', $this->viewData(
            'perkuliahan.konversi',
            ['Perkuliahan', 'Konversi Aktivitas Mahasiswa'],
            'Konversi Aktivitas Mahasiswa',
            'Konversi nilai aktivitas ke bobot penilaian',
            'swap_horiz',
            ['infoType' => 'feature', 'featureIcon' => 'swap_horiz', 'featureTitle' => 'Konversi Aktivitas Mahasiswa', 'featureDesc' => 'Konversi data aktivitas kuliah menjadi komponen nilai.'],
        ));
    }

    public function kulLulusdo(): View
    {
        $data = $this->ldoDData();
        return view('pages.perkuliahan.lulus-do', $this->tableViewData(
            'perkuliahan.lulus-do',
            ['Perkuliahan', 'Mahasiswa Lulus / Dropout'],
            'Daftar Mahasiswa Lulus / Dropout',
            'Data mahasiswa lulus dan dropout',
            'school',
            $data['columns'],
            $data['rows'],
            $data['badges'] ?? [],
        ));
    }

    public function kulTranskripang(): View
    {
        return view('pages.perkuliahan.transkrip-angkatan', $this->viewData(
            'perkuliahan.transkrip-angkatan',
            ['Perkuliahan', 'Perhitungan Transkrip Angkatan'],
            'Perhitungan Transkrip Angkatan',
            'Rekap transkrip nilai per angkatan',
            'summarize',
            ['infoType' => 'transkrip-angkatan'],
        ));
    }

    public function kulCektrans(): View
    {
        return view('pages.perkuliahan.cek-transkrip', $this->viewData(
            'perkuliahan.cek-transkrip',
            ['Perkuliahan', 'Cek Transkrip Mahasiswa'],
            'Cek Transkrip Mahasiswa',
            'Verifikasi transkrip nilai individual',
            'verified',
            ['infoType' => 'cek-transkrip'],
        ));
    }

    public function pelSkala(): View
    {
        $data = $this->sklDData();
        return view('pages.pelengkap.skala-nilai', $this->tableViewData(
            'pelengkap.skala-nilai',
            ['Pelengkap', 'Skala Nilai'],
            'Skala Nilai',
            'Konversi angka ke huruf mutu',
            'tune',
            $data['columns'],
            $data['rows'],
            $data['badges'] ?? [],
            9,
        ));
    }

    public function pelPeriode(): View
    {
        return view('pages.pelengkap.periode', $this->viewData(
            'pelengkap.periode',
            ['Pelengkap', 'Pengaturan Periode Perkuliahan'],
            'Pengaturan Periode Perkuliahan',
            'Konfigurasi semester akademik',
            'calendar_month',
            ['infoType' => 'pel-periode'],
        ));
    }

    public function rekPelaporan(): View
    {
        return view('pages.rekapitulasi.pelaporan', $this->viewData(
            'rekapitulasi.pelaporan',
            ['Rekapitulasi', 'Rekap Pelaporan'],
            'Rekap Pelaporan',
            'Ringkasan pelaporan data ke PDDIKTI',
            'assessment',
            ['infoType' => 'rek-pelaporan'],
        ));
    }

    public function rekDosen(): View
    {
        return view('pages.rekapitulasi.dosen', $this->viewData(
            'rekapitulasi.dosen',
            ['Rekapitulasi', 'Jumlah Dosen'],
            'Jumlah Dosen',
            'Rekapitulasi dosen per kategori',
            'people',
            ['infoType' => 'rek-dosen'],
        ));
    }

    public function rekMhs(): View
    {
        return view('pages.rekapitulasi.mahasiswa', $this->viewData(
            'rekapitulasi.mahasiswa',
            ['Rekapitulasi', 'Jumlah Mahasiswa'],
            'Jumlah Mahasiswa',
            'Rekapitulasi mahasiswa per prodi',
            'groups',
            ['infoType' => 'rek-mhs'],
        ));
    }

    public function rekIps(): View
    {
        return view('pages.rekapitulasi.ips', $this->viewData(
            'rekapitulasi.ips',
            ['Rekapitulasi', 'Rekap IPS Mahasiswa'],
            'Rekap IPS Mahasiswa',
            'Rekapitulasi Indeks Prestasi Semester',
            'trending_up',
            ['infoType' => 'rek-ips'],
        ));
    }

    public function rekKrs(): View
    {
        return view('pages.rekapitulasi.krs', $this->viewData(
            'rekapitulasi.krs',
            ['Rekapitulasi', 'KRS Mahasiswa'],
            'KRS Mahasiswa',
            'Rekapitulasi Kartu Rencana Studi',
            'description',
            ['infoType' => 'rek-krs'],
        ));
    }

    public function rekKhs(): View
    {
        return view('pages.rekapitulasi.khs', $this->viewData(
            'rekapitulasi.khs',
            ['Rekapitulasi', 'KHS Mahasiswa'],
            'KHS Mahasiswa',
            'Rekapitulasi Kartu Hasil Studi',
            'grade',
            ['infoType' => 'rek-khs'],
        ));
    }

    public function rekStatus(): View
    {
        return view('pages.rekapitulasi.status-mahasiswa', $this->viewData(
            'rekapitulasi.status-mahasiswa',
            ['Rekapitulasi', 'Laporan Status Mahasiswa'],
            'Laporan Status Mahasiswa',
            'Rekap status mahasiswa',
            'pie_chart',
            ['infoType' => 'rek-status'],
        ));
    }

    public function rekSksdosen(): View
    {
        return view('pages.rekapitulasi.sks-dosen', $this->viewData(
            'rekapitulasi.sks-dosen',
            ['Rekapitulasi', 'Laporan SKS Dosen Mengajar'],
            'Laporan SKS Dosen Mengajar',
            'Rekapitulasi beban mengajar dosen',
            'work_history',
            ['infoType' => 'rek-sksdosen'],
        ));
    }

    public function rekPddikti(): View
    {
        return view('pages.rekapitulasi.pddikti', $this->viewData(
            'rekapitulasi.pddikti',
            ['Rekapitulasi', 'Rekap Pelaporan PDDIKTI Per Checkpoint'],
            'Rekap Pelaporan PDDIKTI',
            'Monitoring pelaporan per checkpoint',
            'cloud_upload',
            ['infoType' => 'rek-pddikti'],
        ));
    }

    public function setSandbox(): View
    {
        return view('pages.pengaturan.sandbox', $this->viewData(
            'pengaturan.sandbox',
            ['Pengaturan', 'Sandbox'],
            'Sandbox',
            'Mode sandbox untuk pengujian',
            'science',
            ['infoType' => 'set-sandbox'],
        ));
    }

    public function setPeriode(): View
    {
        return view('pages.pengaturan.periode', $this->viewData(
            'pengaturan.periode',
            ['Pengaturan', 'Pengaturan Periode'],
            'Pengaturan Periode',
            'Set periode perkuliahan aktif',
            'calendar_month',
            ['infoType' => 'set-periode'],
        ));
    }

    public function setTranskrip(): View
    {
        return view('pages.pengaturan.transkrip', $this->viewData(
            'pengaturan.transkrip',
            ['Pengaturan', 'Pengaturan Transkrip'],
            'Pengaturan Transkrip',
            'Konfigurasi format transkrip',
            'article',
            ['infoType' => 'set-transkrip'],
        ));
    }

    public function setValidasi(): View
    {
        return view('pages.pengaturan.validasi', $this->viewData(
            'pengaturan.validasi',
            ['Pengaturan', 'Validasi Feeder'],
            'Validasi Feeder',
            'Validasi kesesuaian data',
            'fact_check',
            ['infoType' => 'set-validasi'],
        ));
    }

    public function setKode(): View
    {
        return view('pages.pengaturan.kode-registrasi', $this->viewData(
            'pengaturan.kode-registrasi',
            ['Pengaturan', 'Update Kode Registrasi'],
            'Update Kode Registrasi',
            'Perbarui kode registrasi PT',
            'vpn_key',
            ['infoType' => 'set-kode'],
        ));
    }

    public function setUpdate(): View
    {
        return view('pages.pengaturan.update', $this->viewData(
            'pengaturan.update',
            ['Pengaturan', 'Update Aplikasi'],
            'Update Aplikasi',
            'Cek dan terapkan pembaruan',
            'system_update',
            ['infoType' => 'set-update'],
        ));
    }

    public function setLog(): View
    {
        return view('pages.pengaturan.log', $this->viewData(
            'pengaturan.log',
            ['Pengaturan', 'Log Feeder'],
            'Log Feeder',
            'Riwayat aktivitas sistem',
            'receipt_long',
            ['infoType' => 'set-log'],
        ));
    }

    // ───────────────────────────────────────────────
    //  EXPORT PAGES
    // ───────────────────────────────────────────────

    public function expMhs(): View
    {
        return view('pages.export.mahasiswa', $this->exportViewData(
            'export.mahasiswa', 'Mahasiswa', 'Data biodata dan status mahasiswa', 'school',
        ));
    }

    public function expNilaitransfer(): View
    {
        return view('pages.export.nilai-transfer', $this->exportViewData(
            'export.nilai-transfer', 'Nilai Transfer', 'Data nilai mahasiswa transfer', 'swap_horiz',
        ));
    }

    public function expPenugasan(): View
    {
        return view('pages.export.penugasan', $this->exportViewData(
            'export.penugasan', 'Penugasan Dosen', 'Data penugasan mengajar', 'assignment_ind',
        ));
    }

    public function expMk(): View
    {
        return view('pages.export.mata-kuliah', $this->exportViewData(
            'export.mata-kuliah', 'Mata Kuliah', 'Daftar mata kuliah', 'menu_book',
        ));
    }

    public function expKelas(): View
    {
        return view('pages.export.kelas', $this->exportViewData(
            'export.kelas', 'Kelas Perkuliahan', 'Data kelas dan peserta', 'groups',
        ));
    }

    public function expKelasren(): View
    {
        return view('pages.export.kelas-rencana-evaluasi', $this->exportViewData(
            'export.kelas-rencana-evaluasi', 'Kelas Perkuliahan Rencana Evaluasi', 'Rencana evaluasi per kelas', 'fact_check',
        ));
    }

    public function expKrs(): View
    {
        return view('pages.export.krs', $this->exportViewData(
            'export.krs', 'KRS Mahasiswa', 'Kartu Rencana Studi', 'description',
        ));
    }

    public function expNilaikev(): View
    {
        return view('pages.export.nilai-komponen-evaluasi', $this->exportViewData(
            'export.nilai-komponen-evaluasi', 'Nilai Komponen Evaluasi', 'Nilai per komponen evaluasi', 'grading',
        ));
    }

    public function expAktifdosen(): View
    {
        return view('pages.export.aktivitas-dosen', $this->exportViewData(
            'export.aktivitas-dosen', 'Aktivitas Mengajar Dosen', 'Rekap aktivitas mengajar', 'work_history',
        ));
    }

    public function expAktifkul(): View
    {
        return view('pages.export.aktivitas-kuliah', $this->exportViewData(
            'export.aktivitas-kuliah', 'Aktivitas Kuliah', 'Data kehadiran kuliah', 'event_available',
        ));
    }

    public function expLulusdo(): View
    {
        return view('pages.export.lulus-do', $this->exportViewData(
            'export.lulus-do', 'Mahasiswa Lulus / DO', 'Data kelulusan dan dropout', 'school',
        ));
    }

    public function expTranskrip(): View
    {
        return view('pages.export.transkrip', $this->exportViewData(
            'export.transkrip', 'Transkip', 'Transkrip nilai mahasiswa', 'article',
        ));
    }

    // ───────────────────────────────────────────────
    //  SINKRONISASI PAGES
    // ───────────────────────────────────────────────

    public function synPddikti(): View
    {
        return view('pages.sinkronisasi.pddikti', $this->viewData(
            'sinkronisasi.pddikti',
            ['Sinkronisasi', 'Sinkronisasi PDDIKTI'],
            'Sinkronisasi PDDIKTI',
            'Kirim data ke server PDDIKTI',
            'cloud_upload',
            ['infoType' => 'syn-pddikti'],
        ));
    }

    public function synPengguna(): View
    {
        return view('pages.sinkronisasi.pengguna', $this->viewData(
            'sinkronisasi.pengguna',
            ['Sinkronisasi', 'Sinkronisasi Pengguna'],
            'Sinkronisasi Pengguna',
            'Sinkronisasi data pengguna',
            'group',
            ['infoType' => 'syn-pengguna'],
        ));
    }

    public function synTable(): View
    {
        return view('pages.sinkronisasi.table', $this->viewData(
            'sinkronisasi.table',
            ['Sinkronisasi', 'Sinkronisasi PDDIKTI Table'],
            'Sinkronisasi PDDIKTI Table',
            'Sinkronisasi per tabel',
            'table_chart',
            ['infoType' => 'syn-table'],
        ));
    }

    public function synFaq(): View
    {
        return view('pages.sinkronisasi.faq', $this->viewData(
            'sinkronisasi.faq',
            ['Sinkronisasi', 'FAQ PDDIKTI'],
            'FAQ PDDIKTI',
            'Pertanyaan seputar sinkronisasi',
            'help',
            ['infoType' => 'syn-faq'],
        ));
    }
}
