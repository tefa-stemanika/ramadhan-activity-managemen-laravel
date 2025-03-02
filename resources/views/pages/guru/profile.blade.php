@extends('components.layouts.guru.container')

@section('title', 'Profil')

@section('main')
<section>
    <div class="grid grid-cols-1 gap-y-6 mx-[20px]">
        <div class="flex flex-col gap-y-2">
            <p class="text-sm font-bold ">Kode Guru</p>
            <p class="text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5">{{ $guru->kode }}</p>
        </div>
        <div class="flex flex-col gap-y-4">
            <p class="text-sm font-bold ">Username</p>
            <p class="text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5">{{ $guru->username }}</p>
        </div>
        <div class="flex flex-col gap-y-4">
            <p class="text-sm font-bold ">Nama Guru</p>
            <p class="text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5">{{ $guru->nama }}</p>
        </div>
        <a href="{{ route('password.form') }}" class="text-sm bg-primary rounded-[10px] py-2  text-center text-white font-semibold">Ganti Password</a>
    </div>
</section>
@endsection