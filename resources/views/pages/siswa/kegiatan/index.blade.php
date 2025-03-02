@extends('components.layouts.siswa.container')

@section('main')
    <section class="mb-10">
        <div class="flex gap-x-4 items-center">
            <div class="flex gap-x-7 items-center">
                <a href="{{ url()->previous() }}" class="flex items-center justify-center bg-primary size-7 rounded-lg">
                    <img src="{{ asset('icons/chevron-left.svg') }}" alt="Prev Button" class="size-2.5">
                </a>
                <h2 class="text-black text-base font-bold">Rekap Kegiatan</h2>
            </div>
        </div>
    </section>

    <section class="mt-11">
        <form action="" method="get" class="grid items-center grid-cols-1 gap-3">
            <input type="date" value="{{ old('tanggal') }}" name="tanggal" class="bg-white rounded-full pl-9 pr-2.5 py-1 border border-primary w-full">
            <div class="relative">
                <img src="{{ asset('icons/search-icon.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                <input type="search" name="search" value="{{ old('search') }}" class="bg-white rounded-full pl-9 pr-2.5 py-1 border border-primary w-full">
            </div>
            <div class="flex">
                <button type="submit" class="bg-primary rounded-md px-5 py-2 text-white">
                    Filter
                </button>
            </div>
        </form>
        <div class="mt-5 overflow-x-scroll">
            <table class="min-w-full w-max">
                <thead>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium">No.</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Tanggal</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Jenis Kegiatan</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Deskripsi Kegiatan</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Bukti Kegiatan</th>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kegiatan as $key => $item)
                        <tr>
                            <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium">{{ $key + 1 }}</td>
                            <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                            <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $item->jenis_kegiatan }}</td>
                            <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $item->deskripsi }}</td>
                            <td class="bg-[#F5F5F5] px-6 py-2.5 text-[#1865FF] text-sm font-semibold border-l border-l-[#D9D9D9] text-center">
                                <button onclick="showPhotoPopup('{{ $item->foto }}')" class="flex items-center gap-3">
                                    <img src="{{asset('icons/mdi-light_eye.svg')}}" alt="">
                                    Lihat
                                </button>
                            </td>
                            <td class="flex items-center justify-center bg-[#F5F5F5] px-6 py-2.5 text-sm font-medium border-l border-l-[#D9D9D9]">
                                <a onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')" href="{{ route('siswa.kegiatan.destroy', $item) }}" class="text-[#FF0000] text-sm font-medium">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $kegiatan->appends(request()->query())->links() }}
    </section>

    <div id="photoOverlay" class="hidden fixed z-50 top-0 left-0 w-full h-screen bg-black bg-opacity-70">
        <div class="flex items-center justify-center relative h-full">
            <img id="popupImage" class="max-w-[80%] max-h-[80%] rounded-lg shadow-2xl" src="" alt="Foto Kegiatan">
            <button class="absolute flex items-center justify-center top-2 right-2 bg-white text-black p-2 aspect-square rounded-full shadow-md" onclick="closePhotoPopup()">✖</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showPhotoPopup(photoUrl) {
            document.getElementById("popupImage").src = photoUrl;
            document.getElementById("photoOverlay").classList.replace("hidden", "flex");
        }
        
        function closePhotoPopup() {
            document.getElementById("photoOverlay").classList.replace("flex", "hidden");
        }
    </script>
@endsection