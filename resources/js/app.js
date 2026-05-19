/**
 * Neo Feeder â€” Dashboard Akademik
 * Utility JavaScript (Theme, Sidebar, Dropdown, Toast, Modal, FAQ, Search, Animations)
 */

/* ===== THEME SYSTEM: Light / Dark / System ===== */
var _sysMq = window.matchMedia('(prefers-color-scheme:dark)');
var _curTheme = 'system';

function getSysDark() {
  return _sysMq.matches;
}

function setTheme(mode) {
  // mode: 'light' | 'dark' | 'system'
  _curTheme = mode;
  localStorage.setItem('nf-theme', mode);
  applyTheme();
}

function applyTheme() {
  var dark = _curTheme === 'dark' || (_curTheme === 'system' && getSysDark());
  if (dark) {
    document.documentElement.classList.add('dark');
  } else {
    document.documentElement.classList.remove('dark');
  }
  updateThemeUI();
}

function updateThemeUI() {
  // update header icon
  var icoMap = { light: 'light_mode', dark: 'dark_mode', system: 'brightness_auto' };
  var lblMap = { light: 'Terang', dark: 'Gelap', system: 'Sistem' };
  var ico = document.getElementById('dkI');
  if (ico) ico.textContent = icoMap[_curTheme] || 'brightness_auto';
  var btn = document.getElementById('dkB');
  if (btn) btn.title = 'Tema: ' + lblMap[_curTheme];

  // update sidebar theme switcher active state
  document.querySelectorAll('.ts-opt').forEach(function (el) {
    el.classList.toggle('act', el.dataset.theme === _curTheme);
  });
}

function cycleTheme() {
  var order = ['light', 'dark', 'system'];
  var idx = order.indexOf(_curTheme);
  var next = order[(idx + 1) % order.length];
  setTheme(next);
  var lblMap = { light: 'Terang', dark: 'Gelap', system: 'Sistem' };
  toast('Tema: ' + lblMap[next], 'info');
}

function iDk() {
  // migrate from old key nf-dk to nf-theme
  if (!localStorage.getItem('nf-theme') && localStorage.getItem('nf-dk')) {
    localStorage.setItem('nf-theme', localStorage.getItem('nf-dk') === '1' ? 'dark' : 'light');
    localStorage.removeItem('nf-dk');
  }
  var saved = localStorage.getItem('nf-theme');
  if (saved === 'light' || saved === 'dark' || saved === 'system') {
    _curTheme = saved;
  } else {
    _curTheme = 'system';
  }
  applyTheme();
}

// listen OS preference changes for System mode
try {
  _sysMq.addEventListener('change', function () {
    if (_curTheme === 'system') applyTheme();
  });
} catch (e) {
  _sysMq.addListener(function () {
    if (_curTheme === 'system') applyTheme();
  });
}

/* ===== SIDEBAR INTERACTION ===== */
function tsb() {
  var sb = document.getElementById('sb'),
    mw = document.getElementById('mw');
  if (window.innerWidth <= 1024) {
    sb.classList.toggle('sopen');
    document.getElementById('ov').classList.toggle('sh');
  } else {
    sb.classList.toggle('cl');
    mw.classList.toggle('fl');
  }
}

function cmob() {
  document.getElementById('sb').classList.remove('sopen');
  document.getElementById('ov').classList.remove('sh');
}

function tSub(el) {
  var sub = el.nextElementSibling,
    arr = el.querySelector('.mi-a');
  document.querySelectorAll('.sb-sub.op').forEach(function (s) {
    if (s !== sub) {
      s.classList.remove('op');
      s.previousElementSibling.querySelector('.mi-a').classList.remove('op');
    }
  });
  sub.classList.toggle('op');
  arr.classList.toggle('op');
}

/* ===== DROPDOWN ===== */
function tdd() {
  document.getElementById('ddM').classList.toggle('sh');
}
function cdd() {
  document.getElementById('ddM').classList.remove('sh');
}
document.addEventListener('click', function (e) {
  if (!e.target.closest('#ddB') && !e.target.closest('#ddM')) cdd();
});

/* ===== TOAST NOTIFICATION ===== */
function toast(msg, type) {
  type = type || 'info';
  var c = document.getElementById('tc'),
    t = document.createElement('div');
  t.className = 'tt';
  var ic = { success: 'check_circle', info: 'info', error: 'error' },
    cl = { success: 'color:#34d399', info: 'color:#60a5fa', error: 'color:#f87171' };
  t.innerHTML =
    '<span class="material-icons-outlined" style="font-size:17px;' +
    (cl[type] || cl.info) +
    '">' +
    (ic[type] || ic.info) +
    '</span><span>' +
    msg +
    '</span>';
  c.appendChild(t);
  setTimeout(function () {
    t.classList.add('ou');
    setTimeout(function () {
      t.remove();
    }, 200);
  }, 2800);
}

/* ===== MODAL ===== */
function cmod() {
  document.getElementById('mdl').classList.remove('sh');
}

/* ===== FAQ ACCORDION ===== */
function tFaq(btn) {
  var b = btn.nextElementSibling,
    ic = btn.querySelector('.material-icons-outlined');
  var o = b.style.maxHeight && b.style.maxHeight !== '0px';
  document.querySelectorAll('.fb').forEach(function (x) {
    x.style.maxHeight = '0px';
    x.parentElement.querySelector('.material-icons-outlined').style.transform = '';
  });
  if (!o) {
    b.style.maxHeight = b.scrollHeight + 'px';
    ic.style.transform = 'rotate(180deg)';
  }
}

/* ===== SEARCH (navigate via Laravel routes) ===== */
function gsFn(q) {
  if (!q.trim()) return;
  var ql = q.toLowerCase();

  // Map of menu labels to route paths
  var menuMap = {
    'dashboard': '/dashboard',
    'profil': '/profil',
    'daftar mahasiswa': '/mahasiswa/daftar',
    'daftar mahasiswa hapus': '/mahasiswa/hapus',
    'dosen': '/dosen/daftar',
    'penugasan dosen': '/dosen/penugasan',
    'mata kuliah': '/perkuliahan/mata-kuliah',
    'substansi kuliah': '/perkuliahan/substansi',
    'kurikulum': '/perkuliahan/kurikulum',
    'kelas perkuliahan': '/perkuliahan/kelas',
    'nilai perkuliahan': '/perkuliahan/nilai',
    'aktivitas kuliah mahasiswa': '/perkuliahan/aktivitas-kuliah',
    'hitung aktivitas perkuliahan': '/perkuliahan/hitung-aktivitas',
    'aktivitas mahasiswa': '/perkuliahan/aktivitas-mahasiswa',
    'konversi aktivitas mahasiswa': '/perkuliahan/konversi',
    'daftar mahasiswa lulus / dropout': '/perkuliahan/lulus-do',
    'perhitungan transkrip angkatan': '/perkuliahan/transkrip-angkatan',
    'cek transkrip mahasiswa': '/perkuliahan/cek-transkrip',
    'skala nilai': '/pelengkap/skala-nilai',
    'pengaturan periode perkuliahan': '/pelengkap/periode',
    'rekap pelaporan': '/rekapitulasi/pelaporan',
    'jumlah dosen': '/rekapitulasi/dosen',
    'jumlah mahasiswa': '/rekapitulasi/mahasiswa',
    'rekap ips mahasiswa': '/rekapitulasi/ips',
    'krs mahasiswa': '/rekapitulasi/krs',
    'khs mahasiswa': '/rekapitulasi/khs',
    'laporan status mahasiswa': '/rekapitulasi/status-mahasiswa',
    'laporan sks dosen mengajar': '/rekapitulasi/sks-dosen',
    'rekap pelaporan pddikti per checkpoint': '/rekapitulasi/pddikti',
    'sandbox': '/pengaturan/sandbox',
    'pengaturan periode': '/pengaturan/periode',
    'pengaturan transkrip': '/pengaturan/transkrip',
    'validasi feeder': '/pengaturan/validasi',
    'update kode registrasi': '/pengaturan/kode-registrasi',
    'update aplikasi': '/pengaturan/update',
    'log feeder': '/pengaturan/log',
    'export mahasiswa': '/export/mahasiswa',
    'nilai transfer': '/export/nilai-transfer',
    'penugasan dosen export': '/export/penugasan',
    'export mata kuliah': '/export/mata-kuliah',
    'export kelas': '/export/kelas',
    'kelas perkuliahan rencana evaluasi': '/export/kelas-rencana-evaluasi',
    'export krs': '/export/krs',
    'nilai komponen evaluasi': '/export/nilai-komponen-evaluasi',
    'aktivitas mengajar dosen': '/export/aktivitas-dosen',
    'aktivitas kuliah export': '/export/aktivitas-kuliah',
    'mahasiswa lulus / do export': '/export/lulus-do',
    'transkip': '/export/transkrip',
    'sinkronisasi pddikti': '/sinkronisasi/pddikti',
    'sinkronisasi pengguna': '/sinkronisasi/pengguna',
    'sinkronisasi pddikti table': '/sinkronisasi/table',
    'faq pddikti': '/sinkronisasi/faq',
  };

  // Try matching label
  var keys = Object.keys(menuMap);
  for (var i = 0; i < keys.length; i++) {
    if (keys[i].indexOf(ql) !== -1) {
      window.location.href = menuMap[keys[i]];
      var gS = document.getElementById('gS');
      if (gS) gS.value = '';
      return;
    }
  }
}

/* ===== COUNT-UP ANIMATION FOR DASHBOARD NUMBERS ===== */
function cntUp(el, target, duration) {
  duration = duration || 1000;
  var start = performance.now();
  (function update(now) {
    var progress = Math.min((now - start) / duration, 1);
    // ease-out cubic
    var eased = 1 - Math.pow(1 - progress, 3);
    el.textContent = Math.round(eased * target).toLocaleString('id-ID');
    if (progress < 1) requestAnimationFrame(update);
  })(start);
}

/* ===== PROGRESS BAR ANIMATION FOR DASHBOARD ===== */
function animPb() {
  setTimeout(function () {
    document.querySelectorAll('.pf').forEach(function (bar) {
      if (bar.dataset.w) {
        bar.style.width = bar.dataset.w;
      }
    });
  }, 80);
}

/* ===== ANIMATE DASHBOARD ELEMENTS ===== */
function aDash() {
  var el = document.getElementById('pg');
  if (!el) return;

  // CountUp on .sn[data-target]
  el.querySelectorAll('.sn[data-target]').forEach(function (e) {
    var t = parseInt(e.dataset.target);
    cntUp(e, t, 1000);
  });

  // Animate progress bars
  animPb();
}

/* ===== DOMContentLoaded INIT ===== */
document.addEventListener('DOMContentLoaded', function () {
  iDk();
  updateThemeUI();

  // Animate dashboard if on dashboard page
  if (document.querySelector('.sn[data-target]')) {
    setTimeout(aDash, 30);
  }
});

/* ===== WINDOW & KEYBOARD EVENTS ===== */
window.addEventListener('resize', function () {
  if (window.innerWidth > 1024) cmob();
});

document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape') {
    cmod();
    cdd();
  }
});