@extends('components.layouts.admin.container')

@section('title', 'Data Guru')

@section('main')
    <section>
        <div class="flex flex-col space-y-6 md:space-y-0 md:items-center md:justify-between md:flex-row">
            <form class="flex items-center gap-2.5 w-full md:w-auto">
                <div class="relative w-full md:w-auto">
                    <img src="{{ asset('icons/search-icon.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari Guru..." class="w-full md:w-auto bg-white rounded-full pl-9 pr-2.5 py-1 border border-primary">
                </div>
                <button type="submit" class="bg-primary rounded-full px-5 py-2.5 text-white text-xs font-semibold">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('user.index') }}" class="bg-gray-500 text-white rounded-full px-5 py-2.5 text-xs font-semibold">
                        Reset
                    </a>
                @endif
            </form>
            <div class="flex items-center gap-2.5">
                <a href="{{ route('guru.create') }}" class="flex items-center gap-4 px-5 py-2  rounded bg-transparent border border-primary text-primary">
                    <img src="{{ asset('icons/plus.svg') }}" alt="mosque icon" width="20" height="20">
                    <p class="text-sm font-bold">Tambah Data</p>
                </a>
                @include('components.shared.modals.import', [
                    'template' => asset('templates/guru-import-template.xlsx'),
                    'action' => route('guru.import')
                ])
            </div>
        </div>
        @include('components.shared.tables.import-error')
        <div class="mt-5 overflow-x-scroll">
            <table class=" min-w-full w-max">
                <thead>
                    <tr>
                        <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium">No.</th>
                        <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Kode Guru</th>
                        <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Nama Guru</th>
                        <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Username</th>
                        <th class="bg-primary px-4 py-2 md:px-6 md:py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $g)
                    <tr>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium text-center">{{ $loop->iteration }}</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $g->kode }}</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $g->nama }}</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $g->username }}</td>
                        <td class="flex items-center justify-center gap-4 bg-[#F5F5F5] px-6 py-2.5 text-sm font-medium border-l border-l-[#D9D9D9]">
                            <a href="{{ route('guru.edit', $g) }}" class="text-[#0062FF] text-sm font-medium">Edit</a>
                            <p>|</p>
                            <form action="{{ route('guru.destroy', $g) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[#FF0000] text-sm font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                {{ $guru->appends(request()->query())->links() }}
            </table>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/import-modal.js') }}"></script>
@endsection