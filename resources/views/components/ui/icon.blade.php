@props([
    'name',
    'size' => 'md',
])

@php

$icons = [

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    'dashboard'     => 'dashboard',
    'home'          => 'home',
    'analytics'     => 'analytics',
    'monitoring'    => 'monitoring',
    'widgets'       => 'widgets',

    /*
    |--------------------------------------------------------------------------
    | Mahasiswa
    |--------------------------------------------------------------------------
    */

    'student'       => 'school',
    'students'      => 'groups',
    'graduate'      => 'workspace_premium',
    'alumni'        => 'military_tech',
    'card'          => 'badge',
    'profile'       => 'person',

    /*
    |--------------------------------------------------------------------------
    | Dosen
    |--------------------------------------------------------------------------
    */

    'lecturer'      => 'co_present',
    'teacher'       => 'co_present',
    'supervisor'    => 'supervisor_account',
    'advisor'       => 'support_agent',

    /*
    |--------------------------------------------------------------------------
    | Akademik
    |--------------------------------------------------------------------------
    */

    'faculty'       => 'apartment',
    'program-study' => 'account_tree',
    'course'        => 'menu_book',
    'curriculum'    => 'library_books',
    'classroom'     => 'meeting_room',
    'schedule'      => 'schedule',
    'calendar'      => 'calendar_month',
    'attendance'    => 'fact_check',
    'grade'         => 'grading',
    'exam'          => 'quiz',
    'transcript'    => 'description',
    'krs'           => 'checklist',
    'khs'           => 'task',
    'thesis'        => 'article',
    'graduation'    => 'school',

    /*
    |--------------------------------------------------------------------------
    | Keuangan
    |--------------------------------------------------------------------------
    */

    'finance'       => 'account_balance_wallet',
    'payment'       => 'payments',
    'invoice'       => 'receipt_long',
    'wallet'        => 'wallet',
    'scholarship'   => 'volunteer_activism',

    /*
    |--------------------------------------------------------------------------
    | SDM
    |--------------------------------------------------------------------------
    */

    'employee'      => 'badge',
    'staff'         => 'groups',
    'users'         => 'group',
    'role'          => 'admin_panel_settings',
    'permission'    => 'verified_user',

    /*
    |--------------------------------------------------------------------------
    | Dokumen
    |--------------------------------------------------------------------------
    */

    'document'      => 'description',
    'folder'        => 'folder',
    'upload'        => 'upload',
    'download'      => 'download',
    'print'         => 'print',

    /*
    |--------------------------------------------------------------------------
    | Laporan
    |--------------------------------------------------------------------------
    */

    'report'        => 'assessment',
    'chart'         => 'bar_chart',
    'statistics'    => 'monitoring',

    /*
    |--------------------------------------------------------------------------
    | Notifikasi
    |--------------------------------------------------------------------------
    */

    'notification'  => 'notifications',
    'announcement'  => 'campaign',
    'mail'          => 'mail',

    /*
    |--------------------------------------------------------------------------
    | Aksi CRUD
    |--------------------------------------------------------------------------
    */

    'add'           => 'add_circle',
    'create'        => 'add_circle',
    'edit'          => 'edit',
    'update'        => 'edit_square',
    'save'          => 'save',
    'delete'        => 'delete',
    'remove'        => 'delete_forever',
    'restore'       => 'restore_from_trash',
    'view'          => 'visibility',
    'detail'        => 'visibility',
    'search'        => 'search',
    'filter'        => 'filter_alt',
    'refresh'       => 'refresh',
    'reload'        => 'sync',
    'copy'          => 'content_copy',
    'share'         => 'share',

    /*
    |--------------------------------------------------------------------------
    | Setting
    |--------------------------------------------------------------------------
    */

    'settings'      => 'settings',
    'config'        => 'tune',
    'security'      => 'security',
    'backup'        => 'backup',
    'database'      => 'storage',

    /*
    |--------------------------------------------------------------------------
    | Auth
    |--------------------------------------------------------------------------
    */

    'login'         => 'login',
    'logout'        => 'logout',
    'password'      => 'lock',
    'unlock'        => 'lock_open',

    /*
    |--------------------------------------------------------------------------
    | Navigasi
    |--------------------------------------------------------------------------
    */

    'menu'          => 'menu',
    'close'         => 'close',
    'back'          => 'arrow_back',
    'next'          => 'arrow_forward',
    'up'            => 'keyboard_arrow_up',
    'down'          => 'keyboard_arrow_down',
    'left'          => 'keyboard_arrow_left',
    'right'         => 'keyboard_arrow_right',

];

$sizes = [
    'xs' => 'icon-xs',
    'sm' => 'icon-sm',
    'md' => 'icon-md',
    'lg' => 'icon-lg',
    'xl' => 'icon-xl',
];

@endphp

<span
    {{
        $attributes->merge([
            'class' => 'material-icons-outlined ' . ($sizes[$size] ?? 'icon-md')
        ])
    }}
>
    {{ $icons[$name] ?? $name }}
</span>
