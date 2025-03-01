@extends('components.layouts.admin.container')

@section('main')
    <section>
        <div class="mb-[80px]">
            <div class="flex gap-x-4 items-center">
                <a href="{{ route('siswa.index') }}"><i data-feather="chevron-left" class="bg-primary rounded-[5px]  text-white"></i></a>
                <p class="text-2xl text-gray-500 font-bold">Data Siswa</p>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <a href="siswa/create" class="flex items-center gap-4 px-5 py-2 rounded bg-transparent border border-primary text-primary">
                    <img src="{{ asset('icons/map_mosque.svg') }}" alt="mosque icon" width="20" height="20">
                    <p class="text-sm font-bold">Tambah Data</p>
                </a>
                @include('components.shared.modals.import', [
                    'template' => asset('templates/siswa-import-template.xlsx'),
                    'action' => route('siswa.import')
                ])
            </div>
            <form class="flex items-center gap-2.5 w-full md:w-auto">
                <div class="relative w-full md:w-auto">
                    <img src="{{ asset('icons/search-icon.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari Siswa..." class="w-full md:w-auto bg-white rounded-full pl-9 pr-2.5 py-1 border border-primary">
                </div>
                <button type="submit" class="bg-primary rounded-full px-5 py-2.5 text-white text-xs font-semibold">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('siswa.index') }}" class="bg-gray-500 text-white rounded-full px-5 py-2.5 text-xs font-semibold">
                        Reset
                    </a>
                @endif
            </form>
        </div>
        @include('components.shared.tables.import-error')
        <div class="mt-5 overflow-x-scroll">
            <table class="min-w-full w-max">
                <thead>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium">No.</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">NIS</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Nama Siswa</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Kelas</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Username</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                    <tr>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium text-center">{{ $key + 1 }}</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $item->nis }}</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $item->nama }}</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $item->kelas->nama }}</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $item->username }}</td>
                        <td class="flex items-center justify-center gap-4 bg-[#F5F5F5] px-6 py-2.5 text-sm font-medium border-l border-l-[#D9D9D9]">
                            <a href="{{ route('siswa.show', $item->nis) }}" class="text-primary text-sm font-medium">Detail</a>
                            <p>|</p>
                            <a href="{{ route('siswa.edit', $item->id) }}" class="text-[#0062FF] text-sm font-medium">Edit</a>
                            <p>|</p>
                            <form action="{{ route('siswa.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')" type="submit" class="text-[#FF0000] text-sm font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                {{ $data->appends(request()->query())->links() }}
            </table>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/import-modal.js') }}"></script>
@endsection