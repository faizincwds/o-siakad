@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
{{-- Welcome Banner --}}
<div class="cd" style="background:linear-gradient(135deg,var(--pr),var(--pr2));color:#fff;position:relative;overflow:hidden">
    <div class="cd-bd" style="display:flex;align-items:center;gap:24px;position:relative;z-index:1">
        <div style="flex:1">
            <h2 style="font-family:var(--ff-d);font-size:1.75rem;font-weight:700;margin-bottom:8px">
                Selamat Datang, Admin Feeder! 👋
            </h2>
            <p style="opacity:.9;margin-bottom:16px;line-height:1.6">
                Pantau data akademik, sinkronisasi PDDIKTI, dan kelola seluruh informasi perkuliahan
                Universitas Nusantara Mandiri dari satu tempat.
            </p>
            <div style="display:flex;gap:10px;flex-wrap:wrap">
                <a href="{{ route('sinkronisasi.pddikti') }}" class="btn" style="background:rgba(255,255,255,.2);color:#fff;backdrop-filter:blur(8px)">
                    <span class="material-icons-outlined">sync</span>
                    <span>Sinkronisasi Sekarang</span>
                </a>
                <a href="{{ route('rekapitulasi.pelaporan') }}" class="btn" style="background:rgba(255,255,255,.12);color:#fff;backdrop-filter:blur(8px)">
                    <span class="material-icons-outlined">assessment</span>
                    <span>Lihat Rekapitulasi</span>
                </a>
            </div>
        </div>
        {{-- SVG Illustration --}}
        <div style="flex-shrink:0;opacity:.2;position:absolute;right:20px;top:50%;transform:translateY(-50%)">
            <svg width="200" height="160" viewBox="0 0 200 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="20" y="20" width="60" height="80" rx="6" fill="white"/>
                <rect x="30" y="35" width="40" height="4" rx="2" fill="currentColor" opacity=".3"/>
                <rect x="30" y="45" width="30" height="4" rx="2" fill="currentColor" opacity=".2"/>
                <rect x="30" y="55" width="35" height="4" rx="2" fill="currentColor" opacity=".2"/>
                <rect x="30" y="65" width="25" height="4" rx="2" fill="currentColor" opacity=".2"/>
                <rect x="120" y="40" width="60" height="60" rx="6" fill="white"/>
                <circle cx="150" cy="60" r="8" fill="currentColor" opacity=".3"/>
                <rect x="132" y="78" width="36" height="4" rx="2" fill="currentColor" opacity=".2"/>
                <rect x="136" y="86" width="28" height="4" rx="2" fill="currentColor" opacity=".15"/>
                <rect x="60" y="110" width="80" height="30" rx="6" fill="white"/>
                <rect x="72" y="120" width="56" height="4" rx="2" fill="currentColor" opacity=".2"/>
                <rect x="80" y="128" width="40" height="4" rx="2" fill="currentColor" opacity=".15"/>
            </svg>
        </div>
    </div>
</div>

{{-- Stat Cards --}}
<div class="st-grd">
    {{-- Mahasiswa Aktif --}}
    <div class="cd st-cd">
        <div class="cd-bd">
            <div class="st-ic" style="background:rgba(99,102,241,.12);color:#6366f1">
                <span class="material-icons-outlined">groups</span>
            </div>
            <div class="st-inf">
                <div class="st-nm" data-target="2847">0</div>
                <div class="st-lb">Mahasiswa Aktif</div>
            </div>
        </div>
        <div class="st-ft">
            <span class="material-icons-outlined" style="font-size:14px;color:#22c55e">trending_up</span>
            <span style="font-size:12px;color:#22c55e">+5.2% dari semester lalu</span>
        </div>
    </div>

    {{-- Dosen Pengampu --}}
    <div class="cd st-cd">
        <div class="cd-bd">
            <div class="st-ic" style="background:rgba(244,63,94,.12);color:#f43f5e">
                <span class="material-icons-outlined">person</span>
            </div>
            <div class="st-inf">
                <div class="st-nm" data-target="186">0</div>
                <div class="st-lb">Dosen Pengampu</div>
            </div>
        </div>
        <div class="st-ft">
            <span class="material-icons-outlined" style="font-size:14px;color:#22c55e">trending_up</span>
            <span style="font-size:12px;color:#22c55e">+2 dari semester lalu</span>
        </div>
    </div>

    {{-- Mata Kuliah --}}
    <div class="cd st-cd">
        <div class="cd-bd">
            <div class="st-ic" style="background:rgba(245,158,11,.12);color:#f59e0b">
                <span class="material-icons-outlined">menu_book</span>
            </div>
            <div class="st-inf">
                <div class="st-nm" data-target="342">0</div>
                <div class="st-lb">Mata Kuliah</div>
            </div>
        </div>
        <div class="st-ft">
            <span class="material-icons-outlined" style="font-size:14px;color:#64748b">remove</span>
            <span style="font-size:12px;color:var(--tx2)">Tidak berubah</span>
        </div>
    </div>

    {{-- Program Studi --}}
    <div class="cd st-cd">
        <div class="cd-bd">
            <div class="st-ic" style="background:rgba(16,185,129,.12);color:#10b981">
                <span class="material-icons-outlined">apartment</span>
            </div>
            <div class="st-inf">
                <div class="st-nm" data-target="8">0</div>
                <div class="st-lb">Program Studi</div>
            </div>
        </div>
        <div class="st-ft">
            <span class="material-icons-outlined" style="font-size:14px;color:#64748b">remove</span>
            <span style="font-size:12px;color:var(--tx2)">Tidak berubah</span>
        </div>
    </div>
</div>

{{-- Two Column: Log Sinkronisasi + Perkuliahan Hari Ini --}}
<div class="dg-2">
    {{-- Log Sinkronisasi --}}
    <div class="cd">
        <div class="cd-hd">
            <h3 class="cd-t">
                <span class="material-icons-outlined">history</span>
                Log Sinkronisasi
            </h3>
            <a href="{{ route('sinkronisasi.pddikti') }}" class="cd-lnk">
                Lihat Semua <span class="material-icons-outlined">arrow_forward</span>
            </a>
        </div>
        <div class="cd-bd">
            @forelse($sLog as $log)
                <div class="lg-it">
                    <div class="lg-ic {{ $log['s'] === 'sukses' ? 'lg-ok' : ($log['s'] === 'gagal' ? 'lg-er' : 'lg-wn') }}">
                        <span class="material-icons-outlined">
                            {{ $log['s'] === 'sukses' ? 'check_circle' : ($log['s'] === 'gagal' ? 'error' : 'schedule') }}
                        </span>
                    </div>
                    <div class="lg-inf">
                        <div class="lg-tx">{{ $log['t'] }}</div>
                        <div class="lg-tm">{{ $log['w'] }}</div>
                    </div>
                    <span class="bdg {{ $log['s'] === 'sukses' ? 'bdg-ok' : ($log['s'] === 'gagal' ? 'bdg-er' : 'bdg-wn') }}">
                        {{ ucfirst($log['s']) }}
                    </span>
                </div>
            @empty
                <div class="td-emc" style="padding:24px">
                    <span class="material-icons-outlined" style="font-size:36px;opacity:.3">cloud_off</span>
                    <span>Belum ada log sinkronisasi</span>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Perkuliahan Hari Ini --}}
    <div class="cd">
        <div class="cd-hd">
            <h3 class="cd-t">
                <span class="material-icons-outlined">event_note</span>
                Perkuliahan Hari Ini
            </h3>
            <a href="{{ route('perkuliahan.aktivitas-kuliah') }}" class="cd-lnk">
                Lihat Semua <span class="material-icons-outlined">arrow_forward</span>
            </a>
        </div>
        <div class="cd-bd">
            @forelse($kelasHariIni as $schedule)
                <div class="kl-it">
                    <div class="kl-tm">
                        <span>{{ $schedule['Jam'] }}</span>
                        <span style="opacity:.5">—</span>
                        
                    </div>
                    <div class="kl-inf">
                        <div class="kl-mk">{{ $schedule['mata_kuliah'] }}</div>
                        <div class="kl-dt">
                            <span class="material-icons-outlined" style="font-size:14px">person</span>
                            {{ $schedule['dosen'] }}
                        </div>
                        <div class="kl-dt">
                            <span class="material-icons-outlined" style="font-size:14px">meeting_room</span>
                            {{ $schedule['ruang'] }} · {{ $schedule['kelas'] }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="td-emc" style="padding:24px">
                    <span class="material-icons-outlined" style="font-size:36px;opacity:.3">event_busy</span>
                    <span>Tidak ada jadwal hari ini</span>
                </div>
            @endforelse
        </div>
    </div>
</div>

{{-- Two Column: Distribusi Mahasiswa + Status Penilaian --}}
<div class="dg-2">
    {{-- Distribusi Mahasiswa per Prodi --}}
    <div class="cd">
        <div class="cd-hd">
            <h3 class="cd-t">
                <span class="material-icons-outlined">pie_chart</span>
                Distribusi Mahasiswa per Prodi
            </h3>
        </div>
        <div class="cd-bd">
            <div class="pb-grp">
                <div class="pb-it">
                    <div class="pb-lb">
                        <span>Teknik Informatika</span>
                        <span>842</span>
                    </div>
                    <div class="pb-bg">
                        <div class="pb-fl" data-w="29.5" style="background:var(--pr)"></div>
                    </div>
                </div>
                <div class="pb-it">
                    <div class="pb-lb">
                        <span>Sistem Informasi</span>
                        <span>726</span>
                    </div>
                    <div class="pb-bg">
                        <div class="pb-fl" data-w="25.5" style="background:#f43f5e"></div>
                    </div>
                </div>
                <div class="pb-it">
                    <div class="pb-lb">
                        <span>Manajemen Informatika</span>
                        <span>534</span>
                    </div>
                    <div class="pb-bg">
                        <div class="pb-fl" data-w="18.7" style="background:#f59e0b"></div>
                    </div>
                </div>
                <div class="pb-it">
                    <div class="pb-lb">
                        <span>Sains Komputer</span>
                        <span>412</span>
                    </div>
                    <div class="pb-bg">
                        <div class="pb-fl" data-w="14.5" style="background:#10b981"></div>
                    </div>
                </div>
                <div class="pb-it">
                    <div class="pb-lb">
                        <span>Teknik Elektro</span>
                        <span>198</span>
                    </div>
                    <div class="pb-bg">
                        <div class="pb-fl" data-w="6.9" style="background:#8b5cf6"></div>
                    </div>
                </div>
                <div class="pb-it">
                    <div class="pb-lb">
                        <span>Lainnya</span>
                        <span>135</span>
                    </div>
                    <div class="pb-bg">
                        <div class="pb-fl" data-w="4.7" style="background:#64748b"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Status Penilaian --}}
    <div class="cd">
        <div class="cd-hd">
            <h3 class="cd-t">
                <span class="material-icons-outlined">grading</span>
                Status Penilaian
            </h3>
        </div>
        <div class="cd-bd">
            <div class="pb-grp">
                <div class="pb-it">
                    <div class="pb-lb">
                        <span>Sudah Dinilai</span>
                        <span style="color:#22c55e">78%</span>
                    </div>
                    <div class="pb-bg">
                        <div class="pb-fl" data-w="78" style="background:#22c55e"></div>
                    </div>
                </div>
                <div class="pb-it">
                    <div class="pb-lb">
                        <span>Belum Dinilai</span>
                        <span style="color:#f59e0b">15%</span>
                    </div>
                    <div class="pb-bg">
                        <div class="pb-fl" data-w="15" style="background:#f59e0b"></div>
                    </div>
                </div>
                <div class="pb-it">
                    <div class="pb-lb">
                        <span>Belum Input</span>
                        <span style="color:#ef4444">7%</span>
                    </div>
                    <div class="pb-bg">
                        <div class="pb-fl" data-w="7" style="background:#ef4444"></div>
                    </div>
                </div>
            </div>

            {{-- Summary Cards inside --}}
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:20px">
                <div style="text-align:center;padding:16px;border-radius:12px;background:rgba(34,197,94,.08)">
                    <div style="font-size:1.5rem;font-weight:700;color:#22c55e;font-family:var(--ff-d)">267</div>
                    <div style="font-size:.75rem;color:var(--tx2)">Sudah Dinilai</div>
                </div>
                <div style="text-align:center;padding:16px;border-radius:12px;background:rgba(245,158,11,.08)">
                    <div style="font-size:1.5rem;font-weight:700;color:#f59e0b;font-family:var(--ff-d)">51</div>
                    <div style="font-size:.75rem;color:var(--tx2)">Belum Dinilai</div>
                </div>
                <div style="text-align:center;padding:16px;border-radius:12px;background:rgba(239,68,68,.08)">
                    <div style="font-size:1.5rem;font-weight:700;color:#ef4444;font-family:var(--ff-d)">24</div>
                    <div style="font-size:.75rem;color:var(--tx2)">Belum Input</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        aDash();
    });
</script>
@endpush
