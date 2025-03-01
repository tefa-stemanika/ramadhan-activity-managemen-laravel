@extends('components.layouts.admin.container')
@section('title', 'Jadwal Sholat')

@section('main')
<section>
    <div class="flex space-x-2 md:space-x-8 mb-6 md:mb-12">
        <a href="{{ route('admin.home') }}" class="flex items-center gap-4">
            <div class="flex items-center justify-center bg-primary aspect-square rounded-md size-6">
                <img src="{{ asset('icons/chevron-left.svg') }}" width="8" height="8" alt="">
            </div>
            <p class="text-sm md:text-base font-bold">Jadwal Sholat</p>
        </a>
    </div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:items-center md:justify-between md:flex-row">
        <form class="flex items-center gap-2.5 w-full md:w-auto">
            <div class="relative w-full md:w-auto">
                <img src="{{ asset('icons/map_mosque.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari Jadwal..." class="w-full md:w-auto bg-white rounded-full pl-9 pr-2.5 py-1 border border-primary">
            </div>
            <button type="submit" class="bg-primary rounded-full px-5 py-2.5 text-white text-xs font-semibold">
                Cari
            </button>
            @if(request('q'))
                <a href="{{ route('jadwal-sholat.index') }}" class="bg-gray-500 text-white rounded-full px-5 py-2.5 text-xs font-semibold">
                    Reset
                </a>
            @endif
        </form>
        <div class="flex items-center gap-2.5">
            <a href="{{ route('jadwal-sholat.create') }}" class="flex items-center gap-4 px-5 py-2 rounded bg-transparent border border-primary text-primary">
                <img src="{{ asset('icons/map_mosque.svg') }}" alt="mosque icon" width="20" height="20">
                <p class="text-sm font-bold">Tambah Jadwal</p>
            </a>
            @include('components.shared.modals.import', [
                    'template' => asset('templates/jadwalsholat-import-template.xlsx'),
                    'action' => route('jadwal-sholat.import')
            ])
        </div>
        <form class="flex items-center gap-2.5">
            <div class="relative">
                <img src="{{ asset('icons/map_mosque.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                <input type="search" name="q" value="{{ request('q') }}" class="bg-white rounded-full pl-9 pr-2.5 py-1 border border-primary">
            </div>
            <button type="button" class="bg-primary rounded-full px-5 py-2.5 text-white text-xs font-semibold">
                Cari
            </button>
        </form>
    </div>
    @include('components.shared.tables.import-error')
    <div class="mt-5 overflow-x-scroll">
        <table class="min-w-full w-max">
            <thead>
                <tr>
                    <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium">No.</th>
                    <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Tanggal</th>
                    <th class="bg-primary  px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Imsak</th>
                    <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Subuh</th>
                    <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Terbit</th>
                    <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Dhuha</th>
                    <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Dzuhur</th>
                    <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Ashar</th>
                    <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Maghrib</th>
                    <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Isya</th>
                    <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $jadwal_sholat as $jadwal)                   
                <tr>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium text-center">{{ $loop->iteration }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['tanggal'] }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['imsak'] }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['subuh'] }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['terbit'] }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['dhuha'] }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['dzuhur'] }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['ashar'] }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['maghrib'] }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['isya'] }}</td>
                    <td class="flex items-center justify-center gap-4 bg-[#F5F5F5] px-6 py-2.5 text-sm font-medium border-l border-l-[#D9D9D9]">
                        <a href="{{ route('jadwal-sholat.edit', $jadwal['id']) }}" class="text-[#0062FF] text-sm font-medium">Edit</a>
                        <p>|</p>
                        <form action="{{ route('jadwal-sholat.destroy', $jadwal['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-[#FF0000] text-sm font-medium">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection

@section('scripts')
    <script src="{{ asset('js/import-modal.js') }}"></script>
@endsection