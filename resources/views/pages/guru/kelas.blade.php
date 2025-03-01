@extends('components.layouts.guru.container')

@section('main')
    <section>
            <div class="flex gap-x-4 items-center mb-[40px]">
                <a href="{{ route('guru.home') }}">
                    <i data-feather="chevron-left" class="bg-primary rounded-[5px] text-white"></i>
                </a>
                <p class="text-sm text-gray-500 font-bold">Data Kelas</p>
            </div>
            <form action="{{ route('guru.data.kelas') }}" method="GET" class="flex items-center gap-2.5 w-full sm:w-auto mt-7">
                <div class="relative w-full sm:w-auto">
                    <img src="{{ asset('icons/map_mosque.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari siswa..." class="bg-white w-full sm:w-auto rounded-full pl-9 pr-2.5 py-1 border border-primary">
                </div>
                <button class="bg-primary rounded-full px-4 py-2 text-white text-xs font-semibold">Cari</button>
                @if(request('search'))
                    <a href="{{ route('guru.data.kelas') }}" class="bg-gray-500 text-white rounded-full px-4 py-2 text-xs font-semibold">Reset</a>
                @endif
            </form>
        <div class="mt-5 overflow-x-scroll">
            <table class="min-w-full w-max">
                <thead>
                    <tr>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium">No.</th>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Nama Kelas</th>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Jumlah Siswa</th>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium text-center">1.</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9]">XII RPL 1</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9]">36</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9]">
                            <a href="{{ route('guru.data.kelas.siswa') }}" class="text-blue-500 text-sm font-medium flex gap-x-3"><i data-feather="eye" class="feather-16 mt-1"></i>Lihat</a>
                        </td>
                    </tr>
                </tbody>
            </table>
    </section>
@endsection