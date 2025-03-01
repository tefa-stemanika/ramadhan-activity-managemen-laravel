@extends('components.layouts.admin.container')
@section('title', 'Jadwal Sholat')

@section('main')
    <section>
        <div class="flex space-x-2 md:space-x-8 mb-6 md:mb-12">
                <a href="{{ route('jadwal-sholat.index') }}" class="flex items-center gap-4">
                    <div class="flex items-center justify-center bg-primary aspect-square rounded-md size-6">
                        <img src="{{ asset('icons/chevron-left.svg') }}" width="8" height="8" alt="">
                    </div>
                    <p class="text-base font-bold text-mist">Jadwal Sholat</p>
                </a>
            <a href="{{ route('jadwal-sholat.index') }}" class="flex items-center gap-4">
                <img src="{{ asset('icons/ep_arrow-right-bold.svg') }}" width="8" height="8" alt="" class="w-4">
            </a>
            <p class="text-base font-bold">Edit Jadwal Sholat</p>
        </div>
        <form action="{{ route('jadwal-sholat.update', $jadwal_sholat->id) }}" method="POST" class="bg-white p-4 md:p-15 space-y-6 rounded-md border-[1.5px] border-[#D9D9D9] max-w-[750px]">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-3 md:grid-cols-4 gap-2 md:gap-3 items-center">
                <label for="tanggal" class="text-sm md:text-lg font-medium">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $jadwal_sholat->tanggal) }}" class="col-span-3 bg-white px-3 py-2 md:px-5 md:py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 text-red-500 text-[12px] md:text-sm">@error('tanggal') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-4 gap-2 md:gap-3 items-center">
                <label for="imsak" class="text-sm md:text-lg font-medium">Imsak</label>
                <input type="time" name="imsak" id="imsak" value="{{ old('imsak', $jadwal_sholat->imsak) }}" class="col-span-3 bg-white px-3 py-2 md:px-5 md:py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 text-red-500 text-[12px] md:text-sm">@error('imsak') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-4 gap-2 md:gap-3 items-center">
                <label for="subuh" class="text-sm md:text-lg font-medium">Subuh</label>
                <input type="time" name="subuh" id="subuh" value="{{ old('subuh', $jadwal_sholat->subuh) }}" class="col-span-3 bg-white px-3 py-2 md:px-5 md:py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 text-red-500 text-[12px] md:text-sm">@error('subuh') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-4 gap-2 md:gap-3 items-center">
                <label for="terbit" class="text-sm md:text-lg font-medium">Terbit</label>
                <input type="time" name="terbit" id="terbit" value="{{ old('terbit', $jadwal_sholat->terbit) }}" class="col-span-3 bg-white px-3 py-2 md:px-5 md:py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 text-red-500 text-[12px] md:text-sm">@error('terbit') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-4 gap-2 md:gap-3 items-center">
                <label for="dhuha" class="text-sm md:text-lg font-medium">Dhuha</label>
                <input type="time" name="dhuha" id="dhuha" value="{{ old('dhuha', $jadwal_sholat->dhuha) }}" class="col-span-3 bg-white px-3 py-2 md:px-5 md:py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 text-red-500 text-[12px] md:text-sm">@error('dhuha') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-4 gap-2 md:gap-3 items-center">
                <label for="dzuhur" class="text-sm md:text-lg font-medium">Dzuhur</label>
                <input type="time" name="dzuhur" id="dzuhur" value="{{ old('dzuhur', $jadwal_sholat->dzuhur) }}" class="col-span-3 bg-white px-3 py-2 md:px-5 md:py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 text-red-500 text-[12px] md:text-sm">@error('dzuhur') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-4 gap-2 md:gap-3 items-center">
                <label for="ashar" class="text-sm md:text-lg font-medium">Ashar</label>
                <input type="time" name="ashar" id="ashar" value="{{ old('ashar', $jadwal_sholat->ashar) }}" class="col-span-3 bg-white px-3 py-2 md:px-5 md:py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 text-red-500 text-[12px] md:text-sm">@error('ashar') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-4 gap-2 md:gap-3 items-center">
                <label for="maghrib" class="text-sm md:text-lg font-medium">Maghrib</label>
                <input type="time" name="maghrib" id="maghrib" value="{{ old('maghrib', $jadwal_sholat->maghrib) }}" class="col-span-3 bg-white px-3 py-2 md:px-5 md:py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 text-red-500 text-[12px] md:text-sm">@error('maghrib') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-4 gap-2 md:gap-3 items-center">
                <label for="isya" class="text-sm md:text-lg font-medium">Isya</label>
                <input type="time" name="isya" id="isya" value="{{ old('isya', $jadwal_sholat->isya) }}" class="col-span-3 bg-white px-3 py-2 md:px-5 md:py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 text-red-500 text-[12px] md:text-sm">@error('isya') {{ $message }} @enderror</p>
            </div>
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('jadwal-sholat.index') }}" class="bg-mist py-1 md:py-2 px-5 md:px-2.5 rounded text-white text-sm font-medium">Batal</a>
                <button type="submit" class="bg-primary py-1 md:py-2 px-5 md:px-2.5 rounded text-white text-sm font-medium">Simpan</button>
            </div>
        </form>
    </section>
@endsection