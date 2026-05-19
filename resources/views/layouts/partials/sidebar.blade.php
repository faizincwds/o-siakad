@php
$routeMap = [
    'dashboard'            => 'dashboard',
    'profil'               => 'profil',
    'mhs-daftar'           => 'mahasiswa.daftar',
    'mhs-hapus'            => 'mahasiswa.hapus',
    'dsn-daftar'           => 'dosen.daftar',
    'dsn-penugasan'        => 'dosen.penugasan',
    'kul-mk'               => 'perkuliahan.mata-kuliah',
    'kul-substansi'        => 'perkuliahan.substansi',
    'kul-kurikulum'        => 'perkuliahan.kurikulum',
    'kul-kelas'            => 'perkuliahan.kelas',
    'kul-nilai'            => 'perkuliahan.nilai',
    'kul-aktif'            => 'perkuliahan.aktivitas-kuliah',
    'kul-hitung'           => 'perkuliahan.hitung-aktivitas',
    'kul-aktifmhs'         => 'perkuliahan.aktivitas-mahasiswa',
    'kul-konversi'         => 'perkuliahan.konversi',
    'kul-lulusdo'          => 'perkuliahan.lulus-do',
    'kul-transkripang'     => 'perkuliahan.transkrip-angkatan',
    'kul-cektrans'         => 'perkuliahan.cek-transkrip',
    'pel-skala'            => 'pelengkap.skala-nilai',
    'pel-periode'          => 'pelengkap.periode',
    'rek-pelaporan'        => 'rekapitulasi.pelaporan',
    'rek-dosen'            => 'rekapitulasi.dosen',
    'rek-mhs'              => 'rekapitulasi.mahasiswa',
    'rek-ips'              => 'rekapitulasi.ips',
    'rek-krs'              => 'rekapitulasi.krs',
    'rek-khs'              => 'rekapitulasi.khs',
    'rek-status'           => 'rekapitulasi.status-mahasiswa',
    'rek-sksdosen'         => 'rekapitulasi.sks-dosen',
    'rek-pddikti'          => 'rekapitulasi.pddikti',
    'set-sandbox'          => 'pengaturan.sandbox',
    'set-periode'          => 'pengaturan.periode',
    'set-transkrip'        => 'pengaturan.transkrip',
    'set-validasi'         => 'pengaturan.validasi',
    'set-kode'             => 'pengaturan.kode-registrasi',
    'set-update'           => 'pengaturan.update',
    'set-log'              => 'pengaturan.log',
    'exp-mhs'              => 'export.mahasiswa',
    'exp-nilaitransfer'    => 'export.nilai-transfer',
    'exp-penugasan'        => 'export.penugasan',
    'exp-mk'               => 'export.mata-kuliah',
    'exp-kelas'            => 'export.kelas',
    'exp-kelasren'         => 'export.kelas-rencana-evaluasi',
    'exp-krs'              => 'export.krs',
    'exp-nilaikev'         => 'export.nilai-komponen-evaluasi',
    'exp-aktifdosen'       => 'export.aktivitas-dosen',
    'exp-aktifkul'         => 'export.aktivitas-kuliah',
    'exp-lulusdo'          => 'export.lulus-do',
    'exp-transkrip'        => 'export.transkrip',
    'syn-pddikti'          => 'sinkronisasi.pddikti',
    'syn-pengguna'         => 'sinkronisasi.pengguna',
    'syn-table'            => 'sinkronisasi.table',
    'syn-faq'              => 'sinkronisasi.faq',
];
@endphp

<aside class="sb" id="sb">
    {{-- Brand --}}
    <div class="sb-br">
        <div class="sb-ico" style="background:var(--sb-ico-bg)">
            <span class="material-icons-outlined" style="color:var(--sb-brand);font-size:26px">school</span>
        </div>
        <div>
            <div class="sb-t" style="color:var(--sb-brand)">Neo Feeder</div>
            <div class="sb-st" style="color:var(--sb-brand2)">PDDIKTI v3.0</div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="sb-nav">
        @foreach($sidebarMenu as $item)
            @php
                $isActive = isset($item['sub'])
                    ? collect($item['sub'])->contains('id', $activePage)
                    : ($activePage === ($item['id'] ?? ''));
            @endphp

            @if(isset($item['sub']))
                {{-- Collapsible menu group --}}
                <div class="sb-mi {{ $isActive ? 'act' : '' }}">
                    <div class="sb-mh" onclick="this.parentElement.classList.toggle('op')">
                        <div class="sb-mg">
                            <span class="material-icons-outlined">{{ $item['icon'] }}</span>
                            <span>{{ $item['label'] }}</span>
                        </div>
                        <span class="material-icons-outlined sb-arr">expand_more</span>
                    </div>
                    <div class="sb-sub">
                        @foreach($item['sub'] as $sub)
                            @php
                                $subActive = $activePage === $sub['id'];
                                $subRoute = $routeMap[$sub['id']] ?? 'dashboard';
                            @endphp
                            <a href="{{ route($subRoute) }}" class="sb-si {{ $subActive ? 'act' : '' }}">
                                <span>{{ $sub['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                {{-- Single menu item --}}
                @php
                    $itemRoute = $routeMap[$item['id']] ?? 'dashboard';
                @endphp
                <a href="{{ route($itemRoute) }}" class="sb-mi {{ $isActive ? 'act' : '' }}">
                    <div class="sb-mg">
                        <span class="material-icons-outlined">{{ $item['icon'] }}</span>
                        <span>{{ $item['label'] }}</span>
                    </div>
                </a>
            @endif
        @endforeach
    </nav>

    {{-- User Section --}}
    <div class="sb-usr">
        <div class="sb-av" style="background:var(--sb-av-bg)">
            <span class="material-icons-outlined" style="color:var(--sb-av-fg)">person</span>
        </div>
        <div>
            <div class="sb-un" style="color:var(--sb-un-fg)">Admin Feeder</div>
            <div class="sb-rl" style="color:var(--sb-rl-fg)">Operator</div>
        </div>
    </div>

    {{-- Theme Switcher --}}
    <div class="sb-th">
        <button data-theme="light" onclick="setTheme('light')" title="Terang">
            <span class="material-icons-outlined">light_mode</span>
            <span>Terang</span>
        </button>
        <button data-theme="dark" onclick="setTheme('dark')" title="Gelap">
            <span class="material-icons-outlined">dark_mode</span>
            <span>Gelap</span>
        </button>
        <button data-theme="system" onclick="setTheme('system')" title="Sistem">
            <span class="material-icons-outlined">settings_suggest</span>
            <span>Sistem</span>
        </button>
    </div>
</aside>
