@extends('components.layouts.siswa.container')

@section('main')
    <section>
        <a href="{{ route('siswa.home') }}" class="flex items-center gap-4">
            <div class="flex items-center justify-center bg-primary aspect-square rounded-md size-6">
                <img src="{{ asset('icons/chevron-left.svg') }}" width="8" height="8" alt="">
            </div>
            <p class="text-sm font-bold">Rekap Kegiatan</p>
        </a>
    </section>

    <section class="mt-11">
        <form action="" method="" class="flex items-center gap-3">
            <label for="chose_date" class="flex items-center gap-2.5 w-full bg-[#D9D9D9] rounded-full px-2.5 py-1">
                <img src="{{ asset('icons/map_mosque.svg') }}" width="18" height="18" alt="">
                <span class="text-primary text-xs font-semibold">Pilih Tanggal</span>
            </label>
            <div class="relative">
                <img src="{{ asset('icons/map_mosque.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                <input type="search" class="bg-white rounded-full pl-9 pr-2.5 py-1 border border-primary">
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
                            <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9]">
                                <button data-photo="{{ asset($item->foto) }}" class="foto-kegiatan">
                                    Foto Kegiatan
                                </button>
                            </td>
                            <td class="flex items-center justify-center gap-4 bg-[#F5F5F5] px-6 py-2.5 text-sm font-medium border-l border-l-[#D9D9D9]">
                                <a href="#" class="text-[#0062FF] text-sm font-medium">Edit</a>
                                <p>|</p>
                                <a onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')" href="{{ route('siswa.kegiatan.destroy', $item) }}" class="text-[#FF0000] text-sm font-medium">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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