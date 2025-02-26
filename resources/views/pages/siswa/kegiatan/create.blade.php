@extends('components.layouts.siswa.container')

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
        <a href="{{ route('siswa.home') }}" class="flex items-center gap-4">
            <div class="flex items-center justify-center bg-primary aspect-square rounded-md size-6">
                <img src="{{ asset('icons/chevron-left.svg') }}" width="8" height="8" alt="">
            </div>
            <p class="text-sm font-bold">Kegiatan</p>
        </a>
    </section>

    <section class="mt-11">
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
            <div class="flex flex-col gap-3 pt-4">
                <label for="foto" class="flex items-center justify-center gap-2 bg-white p-2 rounded-md text-sm font-medium">
                    <img src="{{ asset('icons/map_mosque.svg') }}" width="24" height="24" alt="">
                    <p>Upload Photo</p>
                </label>
                <p>@error('foto') {{ $message }} @enderror</p>
                <input type="file" id="foto" name="foto" class="hidden">
            </div>
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('siswa.home') }}" class="bg-mist py-2 px-2.5 rounded text-white text-sm font-medium">Batal</a>
                <button type="submit" class="bg-primary py-2 px-2.5 rounded text-white text-sm font-medium">Simpan</button>
            </div>
        </form>
    </section>
@endsection