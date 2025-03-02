@php
    $menu = [
        [
            'display' => 'Home',
            'link' => '/guru',
            'route' => 'guru'
        ],
        [
            'display' => 'Rekap Kegiatan Kelas',
            'link' => '/guru/kelas',
            'route' => 'guru/kelas*'
        ]
    ];
@endphp

<aside class="hidden fixed left-0 top-0 bottom-0 right-0 bg-black/40 z-50" id="navbar-menu-mobile">
    <div class="absolute left-0 top-0 bottom-0 right-24 bg-primary p-6 z-50">
        <div class="flex items-center justify-between">
            <img src="{{ asset('icons/logo-white.svg') }}" width="92" height="41" alt="Logo">
            <button class="text-lg font-bold text-white" id="navbar-toggle">
                <img src="{{ asset('icons/mingcute_close-fill.svg') }}" width="24" height="24" alt="Logo">
            </button>
        </div>
        <ul class="mt-9 space-y-2">
            @foreach ($menu as $item)
                <li>
                    <a href={{ $item['link'] }} class="block px-2 py-3 {{ request()->is($item['route']) ? 'bg-white text-primary' : 'bg-transparent text-white' }} text-sm rounded-md font-bold">
                        {{ $item['display'] }}
                    </a>
                </li>
            @endforeach
            <li>
                <a onclick="return confirm('Apakah Anda yakin ingin keluar?')" href="{{ route('logout') }}" class="block px-2 py-3 bg-transparent text-danger text-sm font-bold">Keluar</a>
            </li>
        </ul>
    </div>
</aside>
<header class="fixed top-0 left-0 right-0 max-w-[720px] mx-auto flex items-center justify-between px-6 py-7 z-40 bg-white">
    <button type="button" id="navbar-toggle">
        <img src="{{ asset('icons/ic_round-menu.svg') }}" alt="">
    </button>
    <img src="{{ asset('icons/logo-primary.svg') }}" width="92" height="41" alt="Logo">
    <a href="{{ route('guru.profile') }}">
        <button class="flex items-center justify-center p-0.5 bg-[#D9D9D9] aspect-square rounded-full">
        <img src="{{ asset('icons/mynaui_user-solid.svg') }}" alt="">
    </button>
    </a>
</header>