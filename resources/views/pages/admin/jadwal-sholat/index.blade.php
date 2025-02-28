@extends('components.layouts.admin.container')

@section('main')
<section class="flex space-x-8">
    <section>
        <a href="{{ route('admin.home') }}" class="flex items-center gap-4">
            <div class="flex items-center justify-center bg-primary aspect-square rounded-md size-6">
                <img src="{{ asset('icons/chevron-left.svg') }}" width="8" height="8" alt="">
            </div>
            <p class="text-base font-bold">Jadwal Sholat</p>
        </a>
    </section>
</section>

<section class="mt-11">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2.5">
            <a href="{{ route('jadwal-sholat.create') }}" class="flex items-center gap-4 px-5 py-2 rounded bg-transparent border border-primary text-primary">
                <img src="{{ asset('icons/map_mosque.svg') }}" alt="mosque icon" width="20" height="20">
                <p class="text-sm font-bold">Tambah Jadwal</p>
            </a>
        </div>
    </div>
    <div class="mt-5 overflow-x-scroll">
        <table class="min-w-full w-max">
            <thead>
                <tr>
                    <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium">No.</th>
                    <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Tanggal</th>
                    <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Subuh</th>
                    <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Duhur</th>
                    <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Ashar</th>
                    <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Maghrib</th>
                    <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Isya</th>
                    <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $jadwal_sholat as $jadwal)                   
                <tr>
                    <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium text-center">{{ $loop->iteration }}</td>
                    <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['tanggal'] }}</td>
                    <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['subuh'] }}</td>
                    <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['dzuhur'] }}</td>
                    <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['ashar'] }}</td>
                    <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['maghrib'] }}</td>
                    <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $jadwal['isya'] }}</td>
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