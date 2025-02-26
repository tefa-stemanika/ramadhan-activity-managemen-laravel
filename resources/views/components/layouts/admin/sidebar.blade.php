@php
    $menu = [
        [
            'display' => 'Dashboard',
            'link' => '/admin',
            'route' => 'admin'
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
    ];
@endphp

<aside class="hidden lg:block fixed left-0 top-0 transition-all ease-linear duration-500">
    <div class="flex items-center w-80 h-screen overflow-y-scroll py-5 px-6 bg-[#F5F5F5] drop-shadow-lg">
        {{-- <button class="flex items-center gap-x-3" id="modalMenuButtonDesktop">
            <img src="{{ asset('icons/map_mosque.svg') }}" alt="Logo {{ $nama }}" width="60" height="60">
            <div class="flex flex-col text-left">
                <h1 class="font-bold text-base text-black">E-Agenda</h1>
                <p class="text-black text-xs font-medium">{{ $nama }}</p>
            </div>
        </button> --}}
        <ul class="flex flex-col items-start gap-6 w-full">
            @foreach ($menu as $item)
                <li class="w-full">
                    <a href={{ $item['link'] }} class="flex items-center gap-3.5 px-5 py-2 w-full rounded-md {{ request()->is($item['route']) ? 'bg-primary text-white' : 'bg-transparent text-primary' }}">
                        <img src="{{ asset('icons/map_mosque.svg') }}" width="24" height="24" alt="">
                        <p class="text-xl font-medium">
                            {{ $item['display'] }}
                        </p>
                    </a>
                </li>
            @endforeach
            <li class="w-full">
                <a href="" class="flex items-center gap-3.5 px-5 py-2 w-full rounded-md bg-transparent text-primary">
                    <img src="{{ asset('icons/map_mosque.svg') }}" width="24" height="24" alt="">
                    <p class="text-xl font-medium">
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </div>
</aside>