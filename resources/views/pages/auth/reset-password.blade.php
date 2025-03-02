@php
    $layout = match(auth()->user()->role ?? '') {
        'siswa' => 'components.layouts.siswa.container',
        'guru' => 'components.layouts.guru.container',
        'walikelas' => 'components.layouts.walikelas.container', // Layout default jika role tidak sesuai
    };
@endphp

@extends($layout)

@section('title', 'Profil')
@section('nestedTitle', 'Ganti Password')

@section('main')
 <section>
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