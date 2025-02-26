@extends('components.layouts.siswa.container')

@section('main')
    <section>
        <h1 class="text-lg font-bold">Assalamu’alaikum, User</h1>
        <time class="text-sm font-medium mt-1.5">Senin, 01 Januari 2025</time>
        <div class="flex items-center gap-x-4 mt-2.5">
            <a href="{{ route('siswa.kegiatan.insert') }}" class="flex items-center px-2.5 py-2  text-sm rounded bg-primary border border-primary text-white">+ &nbsp; Isi Kegiatan</a>
            <a href="{{ route('siswa.jadwal-sholat') }}" class="flex items-center gap-4 px-2.5 py-2 rounded bg-transparent border border-primary text-primary">
                <img src="{{ asset('icons/map_mosque.svg') }}" alt="mosque icon" width="20" height="20">
                <p class="text-sm font-bold">Jadwal Sholat</p>
            </a>
        </div>
    </section>

    <section class="mt-20">
        <h2 class="text-sm font-bold">Berikut kegiatan terbarumu hari ini.</h2>
        <div class="grid grid-cols-1 gap-3 mt-6">
            <div class="grid grid-cols-5 rounded-lg">
                <div class="flex items-center justify-center p-2.5 bg-warm rounded-l-lg">
                    <p class="text-xs font-medium text-white">Infaq</p>
                </div>
                <div class="grid grid-cols-1 col-span-4 p-5 bg-white border border-black/10 rounded-r-lg">
                    <h3 class="text-sm font-semibold">Judul Kegiatan</h3>
                    <p class="text-sm font-medium mt-2">Ini adalah deskripsi kegiatan saya.</p>
                    <div class="flex items-center gap-x-4 mt-2">
                        <img src="{{ asset('icons/uit_clock.svg') }}" alt="">
                        <time class="text-xs">12.09</time>
                    </div>
                    <a href="#" class="flex justify-center items-center px-2.5 py-[5px] text-xs font-semibold mt-5 text-[#6B18FF] bg-white border border-[#6B18FF]  rounded-full">
                        Foto Kegiatan
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-5 rounded-lg">
                <div class="flex items-center justify-center p-2.5 bg-tree rounded-l-lg">
                    <p class="text-xs font-medium text-white">Infaq</p>
                </div>
                <div class="grid grid-cols-1 col-span-4 p-5 bg-white border border-black/10 rounded-r-lg">
                    <h3 class="text-sm font-semibold">Judul Kegiatan</h3>
                    <p class="text-sm font-medium mt-2">Ini adalah deskripsi kegiatan saya.</p>
                    <div class="flex items-center gap-x-4 mt-2">
                        <img src="{{ asset('icons/uit_clock.svg') }}" alt="">
                        <time class="text-xs">12.09</time>
                    </div>
                    <a href="#" class="flex justify-center items-center px-2.5 py-[5px] text-xs font-semibold mt-5 text-[#6B18FF] bg-white border border-[#6B18FF]  rounded-full">
                        Foto Kegiatan
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-5 rounded-lg">
                <div class="flex items-center justify-center p-2.5 bg-warning rounded-l-lg">
                    <p class="text-xs font-medium text-white">Infaq</p>
                </div>
                <div class="grid grid-cols-1 col-span-4 p-5 bg-white border border-black/10 rounded-r-lg">
                    <h3 class="text-sm font-semibold">Judul Kegiatan</h3>
                    <p class="text-sm font-medium mt-2">Ini adalah deskripsi kegiatan saya.</p>
                    <div class="flex items-center gap-x-4 mt-2">
                        <img src="{{ asset('icons/uit_clock.svg') }}" alt="">
                        <time class="text-xs">12.09</time>
                    </div>
                    <a href="#" class="flex justify-center items-center px-2.5 py-[5px] text-xs font-semibold mt-5 text-[#6B18FF] bg-white border border-[#6B18FF]  rounded-full">
                        Foto Kegiatan
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection