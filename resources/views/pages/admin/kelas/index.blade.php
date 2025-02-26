@extends('components.layouts.admin.container')

@section('main')
    <section>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <a href="kelas/create" class="flex items-center gap-4 px-5 py-2 rounded bg-transparent border border-primary text-primary">
                    <img src="{{ asset('icons/map_mosque.svg') }}" alt="mosque icon" width="20" height="20">
                    <p class="text-sm font-bold">Tambah Data</p>
                </a>
                <button class="flex items-center gap-4 px-5 py-2 rounded bg-[#FCEE80]">
                    <p class="text-sm font-bold text-primary">Impor Data</p>
                </button>
            </div>
            <form class="flex items-center gap-2.5">
                <div class="relative">
                    <img src="{{ asset('icons/map_mosque.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                    <input type="search" class="bg-white rounded-full pl-9 pr-2.5 py-1 border border-primary">
                </div>
                <button class="bg-primary rounded-full px-5 py-2.5 text-white text-xs font-semibold">
                    Cari
                </button>
            </fo>
        </div>
        <div class="mt-5 overflow-x-scroll">
            <table class="min-w-full w-max">
                <thead>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium">No.</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Kode Kelas</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Nama Kelas</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Kode Guru PAI</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium text-center">1</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">nvied9</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">XII RPL 3</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">cw092d</td>
                        <td class="flex items-center justify-center gap-4 bg-[#F5F5F5] px-6 py-2.5 text-sm font-medium border-l border-l-[#D9D9D9]">
                            <a href="#" class="text-primary text-sm font-medium">Detail</a>
                            <p>|</p>
                            <a href="#" class="text-[#0062FF] text-sm font-medium">Edit</a>
                            <p>|</p>
                            <a href="#" class="text-[#FF0000] text-sm font-medium">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection