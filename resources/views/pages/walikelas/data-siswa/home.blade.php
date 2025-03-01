@extends('components.layouts.walikelas.container')

@section('main')
    <section>
            <div class="flex gap-x-4 items-center mb-[40px]">
                <a href="{{ route('walikelas.home') }}">
                    <i data-feather="chevron-left" class="bg-primary rounded-[5px] text-white"></i>
                </a>
                <p class="text-lg text-gray-500 font-bold">Data Siswa</p>
            </div>
            <form action="{{ route('walikelas.data.siswa') }}" method="GET" class="flex items-center gap-2.5 w-full sm:w-auto mt-7">
                <div class="relative w-full sm:w-auto">
                    <img src="{{ asset('icons/map_mosque.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari siswa..." class="bg-white w-full sm:w-auto rounded-full pl-9 pr-2.5 py-1 border border-primary">
                </div>
                <button class="bg-primary rounded-full px-4 py-2 text-white text-xs font-semibold">Cari</button>
                @if(request('search'))
                    <a href="{{ route('walikelas.data.siswa') }}" class="bg-gray-500 text-white rounded-full px-4 py-2 text-xs font-semibold">Reset</a>
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
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9] text-center">
                            <a href="{{ route('walikelas.data.siswa.kegiatan', $item->nis) }}" class="text-primary text-sm font-medium">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $data->appends(request()->query())->links() }}
            </div>
    </section>
@endsection