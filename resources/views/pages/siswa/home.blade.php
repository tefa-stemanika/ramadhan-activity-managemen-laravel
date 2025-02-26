@extends('components.layouts.siswa.container')

@section('main')
    <section>
        <h1 class="text-lg font-bold">Assalamu’alaikum, {{ auth()->user()->Siswa->nama }}</h1>
        <time class="text-sm font-medium mt-1.5">{{ now()->format('D, Y M d') }}</time>
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
            @foreach (auth()->user()->Siswa->Kegiatan()->latest()->get() as $item)
                <div class="grid grid-cols-5 rounded-lg">
                    <div class="flex items-center justify-center p-2.5 bg-warm rounded-l-lg">
                        <p class="text-xs font-medium text-white">{{ $item->jenis_kegiatan }}</p>
                    </div>
                    <div class="grid grid-cols-1 col-span-4 p-5 bg-white border border-black/10 rounded-r-lg">
                        <h3 class="text-sm font-semibold">{{ $item->jenis_kegiatan }}</h3>
                        <p class="text-sm font-medium mt-2">{{ $item->deskripsi }}</p>
                        <div class="flex items-center gap-x-4 mt-2">
                            <img src="{{ asset('icons/uit_clock.svg') }}" alt="">
                            <time class="text-xs">{{ Carbon\Carbon::parse($item->created_at)->format('m:s') }}</time>
                        </div>
                        <button data-photo="{{ asset($item->foto) }}" class="foto-kegiatan flex justify-center items-center px-2.5 py-[5px] text-xs font-semibold mt-5 text-[#6B18FF] bg-white border border-[#6B18FF] rounded-full">
                            Foto Kegiatan
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('scripts')
    <script>
    function showPhotoPopup(photoUrl) {
        // Buat elemen overlay
        let overlay = document.createElement("div");
        overlay.style.position = "fixed";
        overlay.style.top = "0";
        overlay.style.left = "0";
        overlay.style.width = "100%";
        overlay.style.height = "100%";
        overlay.style.backgroundColor = "rgba(0, 0, 0, 0.7)";
        overlay.style.display = "flex";
        overlay.style.alignItems = "center";
        overlay.style.justifyContent = "center";
        overlay.style.zIndex = "1000";

        // Buat elemen gambar
        let img = document.createElement("img");
        img.src = photoUrl;
        img.style.maxWidth = "80%";
        img.style.maxHeight = "80%";
        img.style.borderRadius = "10px";
        img.style.boxShadow = "0 4px 8px rgba(0, 0, 0, 0.2)";

        // Buat tombol close
        let closeButton = document.createElement("button");
        closeButton.innerText = "✖";
        closeButton.style.position = "absolute";
        closeButton.style.top = "20px";
        closeButton.style.right = "20px";
        closeButton.style.background = "white";
        closeButton.style.border = "none";
        closeButton.style.padding = "10px";
        closeButton.style.borderRadius = "50%";
        closeButton.style.cursor = "pointer";
        closeButton.onclick = function () {
            document.body.removeChild(overlay);
        };

        // Tambahkan elemen ke overlay
        overlay.appendChild(img);
        overlay.appendChild(closeButton);
        
        // Tambahkan overlay ke body
        document.body.appendChild(overlay);
    }

    // Tambahkan event listener ke semua tombol "Foto Kegiatan"
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll("button.foto-kegiatan").forEach(button => {
            button.addEventListener("click", function () {
                let photoUrl = this.getAttribute("data-photo");
                showPhotoPopup(photoUrl);
            });
        });
    });

    </script>
@endsection