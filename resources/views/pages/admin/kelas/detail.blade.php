@extends('components.layouts.admin.container')

@section('main')
    <section>
        <div class="flex items-center justify-end">
            <form class="flex items-center gap-2.5 w-full md:w-auto">
                <div class="relative w-full md:w-auto">
                    <img src="{{ asset('icons/search-icon.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari Kelas..." class="w-full md:w-auto bg-white rounded-full pl-9 pr-2.5 py-1 border border-primary">
                </div>
                <button type="submit" class="bg-primary rounded-full px-5 py-2.5 text-white text-xs font-semibold">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('kelas.index') }}" class="bg-gray-500 text-white rounded-full px-5 py-2.5 text-xs font-semibold">
                        Reset
                    </a>
                @endif
            </form>
        </div>
        <div class="mt-5 overflow-x-scroll">
            <table class="min-w-full w-max">
                <thead>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium">No.</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">NIS</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Nama Siswa</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Jumlah Kegiatan</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->Siswa()->orderBy('nis')->get() as $key => $item)
                    <tr>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium text-center">{{ $key + 1 }}</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $item->nis }}</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $item->nama }}</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l text-center border-l-[#D9D9D9]">{{ $item->Kegiatan->count() }}</td>
                        <td class="flex items-center justify-center bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">
                            <a 
                                class="flex items-center gap-3 text-[#1865FF]"
                                href="{{ 
                                    route('kelas.detail-kegiatan', [
                                        'kelas' => $data,
                                        'siswa' => $item
                                    ]) 
                                }}">
                                <img src="{{asset('icons/mdi-light_eye.svg')}}" alt="">
                                Lihat
                            </a>
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