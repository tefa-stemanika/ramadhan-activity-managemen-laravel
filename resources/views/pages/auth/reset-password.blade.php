@extends('components.layouts.guru.container')

@section('main')
 <section>
        <div class="flex space-x-2 mb-[60px]">
                <a href="javascript:history.back()" class="flex items-center gap-4">
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
        <form action="{{ route('password.update') }}" method="POST" class="grid grid-cols-1 gap-y-6 mx-[20px]">
            @csrf
            <input type="text" name="username" id="username" value="{{ auth()->user()->username ?? '' }}" hidden autocomplete="username">
            <div class="flex flex-col gap-y-2">
                <label for="password" class="text-sm font-bold">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password baru Anda" 
                    class="placeholder:font-bold text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5"
                    required autocomplete="new-password">
                @error('password') 
                    <p class="text-red-500 text-sm">{{ $message }}</p> 
                @enderror
            </div>

            <div class="flex flex-col gap-y-2">
                <label for="password_confirmation" class="text-sm font-bold">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password baru Anda" 
                    class="placeholder:font-bold text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5"
                    required autocomplete="new-password">
                @error('password_confirmation') 
                    <p class="text-red-500 text-sm">{{ $message }}</p> 
                @enderror
            </div>

            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ url()->previous() }}" class="bg-mist py-2 px-3 rounded text-white text-sm font-medium">Batal</a>
                <button type="submit" class="bg-primary py-2 px-3 rounded text-white text-sm font-medium">Simpan</button>
            </div>
        </form>
 </section>
@endsection