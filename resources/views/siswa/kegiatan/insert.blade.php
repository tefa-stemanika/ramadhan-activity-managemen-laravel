@extends('components.layouts.siswa.container')

@section('main')
    <section>
        <a href="{{ route('siswa.home') }}" class="flex items-center gap-4">
            <div class="flex items-center justify-center bg-primary aspect-square rounded-md size-6">
                <img src="{{ asset('icons/chevron-left.svg') }}" width="8" height="8" alt="">
            </div>
            <p class="text-sm font-bold">Kegiatan</p>
        </a>
    </section>

    <section class="mt-11">
        <form action="" method="" enctype="" class="grid grid-cols-1 gap-5 bg-primary/10 rounded-md py-10 px-5">
            <div class="flex flex-col gap-3">
                <label for="kegiatan_type" class="text-sm font-medium">Jenis Kegiatan</label>
                <select name="kegiatan_type" id="kegiatan_type" class="bg-white px-2.5 py-3 rounded-md">
                    <option value="val 1">val 1</option>
                    <option value="val 1">val 1</option>
                    <option value="val 1">val 1</option>
                    <option value="val 1">val 1</option>
                    <option value="val 1">val 1</option>
                </select>
                <div class="flex flex-col gap-3">
                    <label for="description" class="text-sm font-medium">Jenis Kegiatan</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="bg-white p-2 rounded-md">

                    </textarea>
                </div>
                <div class="flex flex-col gap-3 pt-4">
                    <label for="foto" class="flex items-center justify-center gap-2 bg-white p-2 rounded-md text-sm font-medium">
                        <img src="{{ asset('icons/map_mosque.svg') }}" width="24" height="24" alt="">
                        <p>Upload Photo</p>
                    </label>
                    <input type="file" id="foto" class="hidden">
                </div>
                <div class="flex items-center justify-end gap-4 pt-4">
                    <a href="{{ route('siswa.home') }}" class="bg-mist py-2 px-2.5 rounded text-white text-sm font-medium">Batal</a>
                    <button type="submit" class="bg-primary py-2 px-2.5 rounded text-white text-sm font-medium">Simpan</button>
                </div>
            </div>
        </form>
    </section>
@endsection