@extends('components.layouts.guru.container')

@section('title', 'Data Kelas')
@section('nestedTitle', $kelas->nama)

@section('main')
    <section>
            <form action="{{ route('guru.data.kelas.siswa', ['kode_kelas' => $kode_kelas]) }}" method="GET" class=" flex items-center gap-2.5 w-full md:w-auto mt-7">
                <div class="relative w-full md:w-auto">
                    <img src="{{ asset('icons/map_mosque.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari siswa..." class="bg-white w-full md:w-auto rounded-full pl-9 pr-2.5 py-1 border border-primary">
                </div>
                <button class="bg-primary rounded-full px-4 py-2 text-white text-xs font-semibold">Cari</button>
                @if(request('search'))
                    <a href="{{ route('guru.data.kelas.siswa', ['kode_kelas' => $kode_kelas]) }}" class="bg-gray-500 text-white rounded-full px-4 py-2 text-xs font-semibold">Reset</a>
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
                    @foreach ($data as $key => $item)
                    <tr>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium text-center">{{ $key + 1 }}</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $item->nis }}</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $item->nama }}</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9] text-center">{{ $item->kegiatan_count }}</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9]">
                            <a href="{{ route('guru.data.kelas.siswa.kegiatan', $item->nis) }}" class="text-blue-500 text-sm font-semibold flex justify-center gap-x-3"><i data-feather="eye" class="feather-16 mt-1"></i>Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
            </div>
    </section>
@endsection