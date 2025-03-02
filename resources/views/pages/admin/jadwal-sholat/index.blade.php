@extends('components.layouts.admin.container')

@section('title', 'Jadwal Sholat')

@section('main')
<section>
    <div class="flex flex-col space-y-6 md:space-y-0 md:items-center md:justify-between md:flex-row">
        <form class="flex items-center gap-2.5 w-full md:w-auto">
            <div class="relative w-full md:w-auto">
                <img src="{{ asset('icons/search-icon.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari Jadwal Sholat..." class="w-full md:w-auto bg-white rounded-full pl-9 pr-2.5 py-1 border border-primary">
            </div>
            <button type="submit" class="bg-primary rounded-full px-5 py-2.5 text-white text-xs font-semibold">
                Cari
            </button>
            @if(request('search'))
                <a href="{{ route('jadwal-sholat.index') }}" class="bg-gray-500 text-white rounded-full px-5 py-2.5 text-xs font-semibold">
                    Reset
                </a>
            @endif
        </form>
        <div class="flex items-center gap-2.5">
            <a href="{{ route('jadwal-sholat.create') }}" class="flex items-center gap-4 px-5 py-2 rounded bg-transparent border border-primary text-primary">
                <img src="{{ asset('icons/plus.svg') }}" alt="mosque icon" width="20" height="20">
                <p class="text-sm font-bold">Tambah Data</p>
            </a>
            @include('components.shared.modals.import', [
                    'template' => asset('templates/jadwalsholat-import-template.xlsx'),
                    'action' => route('jadwal-sholat.import')
            ])
        </div>
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
                @foreach ($data as $jadwal)                   
                <tr>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium text-center">{{ $loop->iteration }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y') }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ \Carbon\Carbon::parse($jadwal->imsak)->format('H:i') }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ \Carbon\Carbon::parse($jadwal->subuh)->format('H:i') }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ \Carbon\Carbon::parse($jadwal->terbit)->format('H:i') }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ \Carbon\Carbon::parse($jadwal->dhuha)->format('H:i') }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ \Carbon\Carbon::parse($jadwal->dzuhur)->format('H:i') }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ \Carbon\Carbon::parse($jadwal->ashar)->format('H:i') }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ \Carbon\Carbon::parse($jadwal->maghrib)->format('H:i') }}</td>
                    <td class="bg-[#F5F5F5] px-4 py-2 md:px-6 md:py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ \Carbon\Carbon::parse($jadwal->isya)->format('H:i') }}</td>
                    <td class="flex items-center justify-center gap-4 bg-[#F5F5F5] px-6 py-2.5 text-sm font-medium border-l border-l-[#D9D9D9]">
                        <a href="{{ route('jadwal-sholat.edit', $jadwal) }}" class="text-[#0062FF] text-sm font-medium">Edit</a>
                        <p>|</p>
                        <form action="{{ route('jadwal-sholat.destroy', $jadwal) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal sholat ini?')" type="submit" class="text-[#FF0000] text-sm font-medium">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $data->appends(request()->query())->links() }}
</section>
@endsection

@section('scripts')
    <script src="{{ asset('js/import-modal.js') }}"></script>
@endsection