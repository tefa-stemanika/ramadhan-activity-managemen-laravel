@extends('components.layouts.siswa.container')

@section('title', 'Buat Kegiatan')

@section('main')
    @php
        $jenisKegiatan = [
            'Kegiatan pembukaan',
            'Shalat Fardu',
            'Shalat Tarawih',
            'Sahur bersama keluarga',
            'Buka puasa bersama keluarga',
            'Kajian islamiyah menjelang buka puasa',
            'Kajian islamiyah malam jumat',
            'Tadarus Al-Quran',
            'Infak harian',
            'Rantang Kayaah',
            'Penulisan mushaf Al-Quran',
            'Ngobras',
            'Penutupan',
        ];
    @endphp

    <section>
        <form action="{{ route('siswa.kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-5 bg-primary/10 rounded-md py-10 px-5">
            @csrf
            @method("POST")
            <div class="flex flex-col gap-3">
                <label for="jenis_kegiatan" class="text-sm font-medium">Jenis Kegiatan</label>
                <select name="jenis_kegiatan" id="jenis_kegiatan" class="bg-white px-2.5 py-3 rounded-md">
                    @foreach ($jenisKegiatan as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
                <p>@error('jenis_kegiatan') {{ $message }} @enderror</p>
            </div>
            <div class="flex flex-col gap-3">
                <label for="deskripsi" class="text-sm font-medium">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="bg-white p-2 rounded-md"></textarea>
                <p>@error('deskripsi') {{ $message }} @enderror</p>
            </div>
            {{-- Tampilkan preview gambar di sini --}}
            <div class="flex flex-col gap-3 pt-4">
                {{-- Tempat preview gambar --}}
                <div id="preview-container" class="mt-3 hidden">
                    <img id="preview-image" src="" alt="Preview Gambar" class="w-full h-auto aspect-auto rounded-md border">
                </div>
                <label for="foto" class="flex items-center justify-center gap-2 bg-white p-2 rounded-md text-sm font-medium cursor-pointer">
                    <img src="{{ asset('icons/prime_upload.svg') }}" width="24" height="24" alt="">
                    <p>Upload Photo</p>
                </label>
                <input type="file" id="foto" name="foto" class="hidden" accept=".png, .jpg, .jpeg">
                <p class="text-xs text-red-500">@error('foto') {{ $message }} @enderror</p>
            </div>
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('siswa.home') }}" class="bg-mist py-2 px-2.5 rounded text-white text-sm font-medium">Batal</a>
                <button type="submit" class="bg-primary py-2 px-2.5 rounded text-white text-sm font-medium">Simpan</button>
            </div>
        </form>
    </section>
@endsection

@section('scripts')
<script>
    document.getElementById('foto').addEventListener('change', function(event) {
        const file = event.target.files[0]; // Ambil file yang dipilih
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Tampilkan gambar preview
                const previewImage = document.getElementById('preview-image');
                const previewContainer = document.getElementById('preview-container');
                
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden'); // Tampilkan container preview
            };
            reader.readAsDataURL(file); // Baca file sebagai data URL
        }
    });
</script>
@endsection