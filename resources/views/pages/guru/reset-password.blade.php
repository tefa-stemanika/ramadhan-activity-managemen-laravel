@extends('components.layouts.guru.container')

@section('main')
 <section>
        <div class="flex space-x-2 mb-[60px]">
                <a href="{{ route('guru.profile') }}" class="flex items-center gap-4">
                    <div class="flex items-center justify-center bg-primary aspect-square rounded-md size-6">
                        <img src="{{ asset('icons/chevron-left.svg') }}" width="8" height="8" alt="">
                    </div>
                    <p class="text-sm md:text-base font-bold text-mist">Profile</p>
                </a>
            <a href="#" class="flex items-center gap-4">
                <img src="{{ asset('icons/ep_arrow-right-bold.svg') }}" width="8" height="8" alt="" class="w-4">
            </a>
            <p class="text-sm md:text-base font-bold">Ganti Password</p>
        </div>
    <div class="grid grid-cols-1 gap-y-6 mx-[20px]">
        <div class="flex flex-col gap-y-2">
            <label for="password" class="text-sm font-bold">Password</label>
            <input type="password" name="password" id="password" placeholder="Masukan password baru anda" class=" placeholder:font-bold text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5">
        </div>
        <div class="flex flex-col gap-y-2">
            <label for="konfir_password" class="text-sm font-bold">Konfimasi Password</label>
            <input type="konfir_password" name="konfir_password" id="konfir_password" placeholder="Ulangi password baru anda" class="placeholder:font-bold text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5">
        </div>
        <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('guru.profile') }}" class="bg-mist py-2 px-3 rounded text-white text-sm font-medium">Batal</a>
                <button type="submit" class="bg-primary py-2 px-3 rounded text-white text-sm font-medium">Simpan</button>
        </div>
    </div>
 </section>
@endsection