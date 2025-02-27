@php
    $menu = [
        [
            'display' => 'Home',
            'link' => '/siswa',
        ],
        [
            'display' => 'Isi Kegiatan',
            'link' => '/siswa/kegiatan/insert',
        ],
        [
            'display' => 'Rekap Kegiatan',
            'link' => '/siswa/kegiatan/rekap',
        ]
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
    <button class="flex items-center justify-center p-0.5 bg-[#D9D9D9] aspect-square rounded-full">
        <img src="{{ asset('icons/mynaui_user-solid.svg') }}" alt="">
    </button>
</header>