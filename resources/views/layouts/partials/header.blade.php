<header class="hd">
    {{-- Left: Hamburger + University Info --}}
    <div class="hd-l">
        <button class="hd-hm" onclick="tsb()" title="Toggle Menu">
            <span class="material-icons-outlined">menu</span>
        </button>
        <div class="hd-inf">
            <div class="hd-un">Universitas Nusantara Mandiri</div>
            <div class="hd-sm">Semester Genap 2025/2026</div>
        </div>
    </div>

    {{-- Right: Search, Notification, Theme, User --}}
    <div class="hd-r">
        {{-- Search --}}
        <div class="hd-sr">
            <span class="material-icons-outlined hd-si">search</span>
            <input type="text" id="gS" placeholder="Cari menu, fitur..." onkeyup="gsFn(this.value)">
        </div>

        {{-- Notification --}}
        <button class="hd-nb" title="Notifikasi">
            <span class="material-icons-outlined">notifications</span>
            <span class="hd-nbg">3</span>
        </button>

        {{-- Theme Toggle --}}
        <button class="hd-tb" onclick="cycleTheme()" title="Ganti Tema" id="dkB">
            <span class="material-icons-outlined" id="dkI">dark_mode</span>
        </button>

        {{-- User Dropdown --}}
        <div class="dd">
            <button class="dd-t" onclick="tdd()">
                <div class="dd-av">
                    <span class="material-icons-outlined">person</span>
                </div>
                <span class="material-icons-outlined dd-ar">expand_more</span>
            </button>
            <div class="ddM" id="ddM">
                <div class="ddH">
                    <div class="ddH-n">Admin Feeder</div>
                    <div class="ddH-e">admin@unm.ac.id</div>
                </div>
                <a href="{{ route('profil') }}" class="ddI">
                    <span class="material-icons-outlined">person</span>
                    <span>Profil</span>
                </a>
                <a href="{{ route('pengaturan.sandbox') }}" class="ddI">
                    <span class="material-icons-outlined">settings</span>
                    <span>Pengaturan</span>
                </a>
                <div class="ddB"></div>
                <a href="{{ route('logout') }}" class="ddI dd-x" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <span class="material-icons-outlined">logout</span>
                    <span>Keluar</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</header>

{{-- Close dropdown on outside click --}}
<script>
    document.addEventListener('click', function(e) {
        const dd = document.querySelector('.dd');
        if (dd && !dd.contains(e.target)) cdd();
    });
</script>
