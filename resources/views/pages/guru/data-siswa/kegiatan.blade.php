@extends('components.layouts.guru.container')

@section('title', $siswa->Kelas->nama)
@section('nestedTitle', $siswa->nama)

@section('main')
    <section>
        <div class="grid gap-y-4">
            <form action="{{ route('guru.data.kelas.siswa.kegiatan', $siswa->nis) }}" method="get">
                @csrf
                <input type="date" name="tanggal" value="{{ request('tanggal') }}" placeholder="Pilih Tanggal" onchange="this.form.submit()" class="p-2 bg-gray-200 rounded-full text-primary font-semibold">
            </form>
            <form action="{{  route('guru.data.kelas.siswa.kegiatan', $siswa->nis) }}" method="GET" class="flex items-center gap-2.5">
                @csrf
                <div class="relative  w-full md:w-auto">
                    <img src="{{ asset('icons/map_mosque.svg') }}" width="18" height="18" alt="" class="absolute top-1/2 -translate-y-1/2 left-2.5">
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari kegiatan..." class=" w-full md:w-auto bg-white rounded-full pl-9 pr-2.5 py-1 border border-primary">
                </div>
                <button class="bg-primary rounded-full px-4 py-2.5 text-white text-xs font-semibold">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('guru.data.kelas.siswa.kegiatan', $siswa->nis) }}" class="bg-gray-500 text-white rounded-full px-4 py-2.5 text-xs font-semibold">
                        Reset
                    </a>
                @endif
            </form>
        </div>
        <div class="mt-5 overflow-x-scroll">
            <table class="min-w-full w-max">
                <thead>
                    <tr>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium">No.</th>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Tanggal</th>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Jenis Kegiatan</th>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Deskripsi Kegiatan</th>
                        <th class="bg-primary px-4 py-2 text-white text-sm font-medium border-l border-l-[#D9D9D9]">Bukti Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                    <tr>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium text-center">{{ $key + 1 }}</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9]">{{ $item->jenis_kegiatan }}</td>
                        <td class="bg-[#F5F5F5] px-4 py-2 text-black text-sm font-medium border-l border-l-[#D9D9D9] text-center">{{ $item->deskripsi }}</td>
                        <td class="bg-[#F5F5F5] px-6 py-2.5 text-black text-sm font-medium border-l border-l-[#D9D9D9] ">
                            <button type="button" onclick="showPhotoPopup('{{ $item->foto }}')" class="foto-kegiatan flex justify-center gap-x-2 items-center px-2.5 py-[5px] text-sm font-semibold text-blue-500 ">
                                <i data-feather="eye" class="feather-16"></i>Lihat
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
            event.preventDefault();
            document.getElementById("popupImage").src = photoUrl;
            document.getElementById("photoOverlay").classList.replace("hidden", "flex");
        }
        
        function closePhotoPopup() {
            document.getElementById("photoOverlay").classList.replace("flex", "hidden");
        }
    </script>
@endsection