@extends('components.layouts.guru.container')

@section('main')
    <section>
        <div class="flex space-x-2 md:space-x-8 mb-6 mb:12">
                <a href="{{ route('guru.data.kelas') }}" class="flex items-center gap-4">
                    <div class="flex items-center justify-center bg-primary aspect-square rounded-md size-6">
                        <img src="{{ asset('icons/chevron-left.svg') }}" width="8" height="8" alt="">
                    </div>
                    <p class="text-sm md:text-base font-bold text-mist">Data Kelas</p>
                </a>
            <a href="#" class="flex items-center gap-4">
                <img src="{{ asset('icons/ep_arrow-right-bold.svg') }}" width="8" height="8" alt="" class="w-4">
            </a>
            <p class="text-sm md:text-base font-bold">XII RPL 1</p>
        </div>
            <form action="{{ route('guru.data.kelas.siswa') }}" method="GET" class="flex items-center gap-2.5 w-full sm:w-auto mt-7">
                <div class="relative w-full sm:w-auto">
                    <img src="{{ asset('icons/map_mosque.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari siswa..." class="bg-white w-full sm:w-auto rounded-full pl-9 pr-2.5 py-1 border border-primary">
                </div>
                <button class="bg-primary rounded-full px-4 py-2 text-white text-xs font-semibold">Cari</button>
                @if(request('search'))
                    <a href="{{ route('guru.data.kelas.siswa') }}" class="bg-gray-500 text-white rounded-full px-4 py-2 text-xs font-semibold">Reset</a>
                @endif
            </form>
        <div class="mt-5 overflow-x-scroll">
            <table class="min-w-full w-max">
                <thead>
                    <tr>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium">No.</th>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium border-l border-l-[#D9D9D9]">NIS</th>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Nama Siswa</th>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Jumlah Kegiatan</th>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Lihat Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium text-center">1.</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9]">102200039</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9]">Abiya Azka Rihan</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9] text-center">28</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9] text-center">
                            <a href="{{ route('guru.data.kelas.siswa.kegiatan') }}" class="text-blue-500 text-sm font-semibold flex gap-x-3"><i data-feather="eye" class="feather-16 mt-1"></i>Lihat</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4">
            </div>
    </section>
@endsection