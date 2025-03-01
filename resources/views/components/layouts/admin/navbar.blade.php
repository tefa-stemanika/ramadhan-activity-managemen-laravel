@php
    $menu = [
        [
            'display' => 'Dashboard',
            'link' => '/admin',
            'route' => 'admin',
        ],
        [
            'display' => 'Data User',
            'link' => '/admin/user',
            'route' => 'admin/user*',
        ],
        [
            'display' => 'Data Kelas',
            'link' => '/admin/kelas',
            'route' => 'admin/kelas*',
        ],
        [
            'display' => 'Data Siswa',
            'link' => '/admin/siswa',
            'route' => 'admin/siswa*',
        ],
        [
            'display' => 'Data Guru',
            'link' => '/admin/guru',
            'route' => 'admin/guru*',
        ],
        [
            'display' => 'Data Wali Kelas',
            'link' => '/admin/walikelas',
            'route' => 'admin/walikelas*',
        ],
        [
            'display' => 'Jadwal Sholat',
            'link' => '/admin/jadwal-sholat',
            'route' => 'admin/jadwal-sholat*',
        ],
    ];
@endphp

<aside class="hidden fixed left-0 top-0 bottom-0 right-0 bg-black/40 z-50" id="navbar-menu-mobile">
    <div class="absolute left-0 top-0 bottom-0 right-24 bg-primary p-6 z-50">
        <button class="text-lg font-bold text-white" id="navbar-toggle">X</button>
        <ul class="mt-7">
            @foreach ($menu as $item)
                <li>
                    <a href={{ $item['link'] }} class="block px-2 py-3 bg-transparent text-white text-sm font-bold">
                        {{ $item['display'] }}
                    </a>
                </li>
            @endforeach
            <li>
                <a href="{{ route('logout') }}" class="block px-2 py-3 bg-transparent text-danger text-sm font-bold">Keluar</a>
            </li>
        </ul>
    </div>
</aside>
<header class="fixed top-0 left-0 right-0 max-w-[720px] mx-auto flex items-center justify-between px-6 py-7 z-40 bg-white">
    <button type="button" id="navbar-toggle">
        <img src="{{ asset('icons/ic_round-menu.svg') }}" alt="">
    </button>
    <img src="{{ asset('icons/logo-primary.svg') }}" width="92" height="41" alt="Logo">
    <button class="flex items-center justify-center p-0.5 bg-[#D9D9D9] aspect-square rounded-full">
        <img src="{{ asset('icons/mynaui_user-solid.svg') }}" alt="">
    </button>
</header>