@extends('components.layouts.admin.container')

@section('title', "Data Jadwal Sholat")
@section('nestedTitle', "Create")

@section('main')
    <section>
        <form action="{{ route('jadwal-sholat.store') }}" method="POST" class="bg-white p-4  md:p-15 space-y-3 md:space-y-6 rounded-md border-[1.5px] border-[#D9D9D9] max-w-[750px]">
            @csrf
            @method('POST')
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="tanggal" class="text-lg font-medium">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 col-span-3 text-red-500 text-sm">@error('tanggal') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="imsak" class="text-lg font-medium">Imsak</label>
                <input type="time" name="imsak" id="imsak" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 col-span-3 text-red-500 text-sm">@error('imsak') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="subuh" class="text-lg font-medium">Subuh</label>
                <input type="time" name="subuh" id="subuh" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 col-span-3 text-red-500 text-sm">@error('subuh') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="terbit" class="text-lg font-medium">Terbit</label>
                <input type="time" name="terbit" id="terbit" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 col-span-3 text-red-500 text-sm">@error('terbit') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="dhuha" class="text-lg font-medium">Dhuha</label>
                <input type="time" name="dhuha" id="dhuha" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 col-span-3 text-red-500 text-sm">@error('dhuha') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="dzuhur" class="text-lg font-medium">Dzuhur</label>
                <input type="time" name="dzuhur" id="dzuhur" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 col-span-3 text-red-500 text-sm">@error('dzuhur') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="ashar" class="text-lg font-medium">Ashar</label>
                <input type="time" name="ashar" id="ashar" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 col-span-3 text-red-500 text-sm">@error('ashar') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="maghrib" class="text-lg font-medium">Maghrib</label>
                <input type="time" name="maghrib" id="maghrib" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 col-span-3 text-red-500 text-sm">@error('maghrib') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="isya" class="text-lg font-medium">Isya</label>
                <input type="time" name="isya" id="isya" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 col-span-3 text-red-500 text-sm">@error('isya') {{ $message }} @enderror</p>
            </div>
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('jadwal-sholat.index') }}" class="bg-mist md:py-2 px-5 md:px-2.5 rounded text-white text-sm font-medium">Batal</a>
                <button type="submit" class="bg-primary md:py-2 px-5 md:px-2.5 rounded text-white text-sm font-medium">Simpan</button>
            </div>
        </form>
    </section>
@endsection