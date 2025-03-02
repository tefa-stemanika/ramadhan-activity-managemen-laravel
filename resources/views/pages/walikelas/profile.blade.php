@extends('components.layouts.walikelas.container')

@section('title', 'Profil')

@section('main')
<section>
    <div class="grid grid-cols-1 gap-y-6">
        <div class="flex flex-col gap-y-2">
            <p class="text-sm font-bold ">Kode Walikelas</p>
            <p class="text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5">{{ $walikelas->kode }}</p>
        </div>
        <div class="flex flex-col gap-y-4">
            <p class="text-sm font-bold ">Username</p>
            <p class="text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5">{{ $walikelas->username }}</p>
        </div>
        <div class="flex flex-col gap-y-4">
            <p class="text-sm font-bold ">Nama</p>
            <p class="text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5">{{ $walikelas->nama }}</p>
        </div>
        <div class="flex flex-col gap-y-4">
            <p class="text-sm font-bold ">Kelas</p>
            <p class="text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5">{{ $walikelas->kelas->nama }}</p>
        </div>
        <a href="{{ route('password.form') }}" class="text-sm bg-primary rounded-[10px] py-2  text-center text-white font-semibold">Ganti Password</a>
    </div>
</section>
@endsection