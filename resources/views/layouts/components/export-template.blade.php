@props(['exportTitle', 'exportDescription', 'exportIcon'])

<div class="pg-hd">
    {{-- Breadcrumbs --}}
    <div class="bc">
        <a href="{{ route('dashboard') }}" class="bc-l">Dashboard</a>
        <span class="material-icons-outlined bc-sep">chevron_right</span>
        <a href="#" class="bc-l">Export Data</a>
        <span class="material-icons-outlined bc-sep">chevron_right</span>
        <span class="bc-c">{{ $exportTitle }}</span>
    </div>

    {{-- Page Header --}}
    <div class="pg-tl">
        <div class="pg-ico">
            <span class="material-icons-outlined">{{ $exportIcon }}</span>
        </div>
        <div>
            <h1 class="pg-t">{{ $exportTitle }}</h1>
            <p class="pg-d">{{ $exportDescription }}</p>
        </div>
    </div>
</div>

{{-- Filter Card --}}
<div class="cd">
    <div class="cd-hd">
        <h3 class="cd-t">
            <span class="material-icons-outlined">filter_list</span>
            Filter Export
        </h3>
    </div>
    <div class="cd-bd">
        <div class="frm-grd">
            {{-- Format --}}
            <div class="frm-g">
                <label class="frm-l">Format</label>
                <select class="frm-s">
                    <option value="csv">CSV</option>
                    <option value="xlsx" selected>XLSX</option>
                </select>
            </div>

            {{-- Periode --}}
            <div class="frm-g">
                <label class="frm-l">Periode</label>
                <select class="frm-s">
                    <option value="">Semua Periode</option>
                    <option value="20251">Genap 2024/2025</option>
                    <option value="20242">Ganjil 2024/2025</option>
                    <option value="20241">Genap 2023/2024</option>
                </select>
            </div>

            {{-- Program Studi --}}
            <div class="frm-g">
                <label class="frm-l">Program Studi</label>
                <select class="frm-s">
                    <option value="">Semua Prodi</option>
                    <option value="TI">Teknik Informatika</option>
                    <option value="SI">Sistem Informasi</option>
                    <option value="MI">Manajemen Informatika</option>
                    <option value="SK">Sains Komputer</option>
                </select>
            </div>

            {{-- Status --}}
            <div class="frm-g">
                <label class="frm-l">Status</label>
                <select class="frm-s">
                    <option value="">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="lulus">Lulus</option>
                    <option value="do">Drop Out</option>
                    <option value="cuti">Cuti</option>
                </select>
            </div>
        </div>
    </div>
</div>

{{-- Download Buttons --}}
<div class="cd">
    <div class="cd-bd" style="display:flex;gap:12px;flex-wrap:wrap">
        <button class="btn btn-p" onclick="toast('Mengunduh file CSV...','info')">
            <span class="material-icons-outlined">download</span>
            <span>Unduh CSV</span>
        </button>
        <button class="btn btn-s" onclick="toast('Mengunduh file Excel...','info')" style="background:#16a34a;color:#fff">
            <span class="material-icons-outlined">table_chart</span>
            <span>Unduh Excel</span>
        </button>
        <button class="btn btn-s" onclick="toast('Mengunduh file PDF...','info')" style="background:#dc2626;color:#fff">
            <span class="material-icons-outlined">picture_as_pdf</span>
            <span>Unduh PDF</span>
        </button>
    </div>
</div>
