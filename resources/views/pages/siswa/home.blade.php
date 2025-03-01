@extends('components.layouts.siswa.container')

@section('main')
    <section>
        <h1 class="text-lg font-bold">Assalamu’alaikum, {{ auth()->user()->Siswa->nama }}</h1>
        <time class="text-sm font-medium mt-1.5">{{ now()->translatedFormat('l, d F Y') }}</time>
        <div class="flex items-center gap-x-4 mt-2.5">
            <a href="{{ route('siswa.kegiatan.create') }}" class="flex items-center px-2.5 py-2  text-sm rounded bg-primary border border-primary text-white">+ &nbsp; Isi Kegiatan</a>
            <a href="{{ route('siswa.jadwal-sholat') }}" class="flex items-center gap-4 px-2.5 py-2 rounded bg-transparent border border-primary text-primary">
                <img src="{{ asset('icons/map_mosque.svg') }}" alt="mosque icon" width="20" height="20">
                <p class="text-sm font-bold">Jadwal Sholat</p>
            </a>
        </div>
    </section>

    <section class="mt-20">
        <h2 class="text-sm font-bold">Berikut kegiatan terbarumu hari ini.</h2>
        <div class="grid grid-cols-1 gap-3 mt-6">
            @foreach (auth()->user()->Siswa->Kegiatan()->whereDate('created_at', now())->latest()->get() as $item)
                <div class="grid grid-cols-5 rounded-lg">
                    <div class="flex items-center justify-center p-2.5 bg-warm rounded-l-lg">
                        <p class="text-xs font-medium text-white">{{ $item->jenis_kegiatan }}</p>
                    </div>
                    <div class="grid grid-cols-1 col-span-4 p-5 bg-white border border-black/10 rounded-r-lg">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-semibold">{{ $item->jenis_kegiatan }}</h3>
                            <a onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')" href="{{ route('siswa.kegiatan.destroy', $item) }}" class="bg-[#FF0000] rounded-md p-1">
                                <img src="{{ asset('icons/Trash.svg') }}" width="18" height="18" alt="">
                            </a>
                        </div>
                        <p class="text-sm font-normal mt-2">{{ $item->deskripsi }}</p>
                        <div class="flex items-center gap-x-4 mt-2">
                            <img src="{{ asset('icons/uit_clock.svg') }}" alt="">
                            <time class="text-xs">{{ Carbon\Carbon::parse($item->created_at)->format('H:i') }}</time>
                        </div>
                        <button onclick="showPhotoPopup('{{ $item->foto }}')" class="foto-kegiatan flex justify-center items-center px-2.5 py-[5px] text-xs font-semibold mt-5 text-[#6B18FF] bg-white border border-[#6B18FF] rounded-full">
                            Foto Kegiatan
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
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