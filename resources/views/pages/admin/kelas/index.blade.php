@extends('components.layouts.admin.container')
@section('title')
    Data Kelas
@endsection

@section('main')
    <section>
        <a href="{{ url()->previous() }}" class="flex items-center gap-4 mb-6 md:mb-12">
            <div class="flex items-center justify-center bg-primary aspect-square rounded-md size-6">
                <img src="{{ asset('icons/chevron-left.svg') }}" width="8" height="8" alt="">
            </div>
            <p class="text-sm md:text-base font-bold">Data Kelas</p>
        </a>
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <form action="{{ route('kelas.index') }}" method="GET" class="flex items-center gap-2.5 w-full md:w-auto">
                <div class="relative w-full md:w-auto">
                    <img src="{{ asset('icons/map_mosque.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari kelas..." class="bg-white w-full md:w-auto rounded-full pl-9 pr-2.5 py-1 border border-primary">
                </div>
                <button class="bg-primary rounded-full px-5 py-2.5 text-white text-xs font-semibold">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('kelas.index') }}" class="bg-gray-500 text-white rounded-full px-5 py-2.5 text-xs font-semibold">
                        Reset
                    </a>
                @endif
            </form>
            <div class="flex items-center gap-2.5">
                <a href="kelas/create" class="flex items-center gap-4 px-5 py-2 rounded bg-transparent border border-primary text-primary">
                    <img src="{{ asset('icons/map_mosque.svg') }}" alt="mosque icon" width="20" height="20">
                    <p class="text-sm font-bold">Tambah Data</p>
                </a>
                @include('components.shared.modals.import', [
                    'template' => asset('templates/kelas-import-template.xlsx'),
                    'action' => route('kelas.import')
                ])
            </div>
        </div>
        @include('components.shared.tables.import-error')
        <div class="mt-5 overflow-x-scroll">
            <table class="min-w-full w-max">
                <thead>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium">No.</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Kode Kelas</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Nama Kelas</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium text-center">{{ $key + 1 }}</td>
                            <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $item->kode }}</td>
                            <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $item->nama }}</td>
                            <td class="flex items-center justify-center gap-4 bg-[#F5F5F5] px-6 py-2.5 text-sm font-medium border-l border-l-[#D9D9D9]">
                                <a href="#" class="text-primary text-sm font-medium">Detail</a>
                                <p>|</p>
                                <a href="{{ route('kelas.edit', $item) }}" class="text-[#0062FF] text-sm font-medium">Edit</a>
                                <p>|</p>
                                <form action="{{ route('kelas.destroy', $item) }}" method="POST">
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