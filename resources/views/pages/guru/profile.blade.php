@extends('components.layouts.guru.container')

@section('main')
<section>
    <div class="flex gap-x-4 items-center mb-[60px]">
        <a href="{{ route('guru.home') }}">
            <i data-feather="chevron-left" class="bg-primary rounded-[5px] text-white"></i>
        </a>
        <p class="text-sm font-bold">Profile</p>
    </div>
    <div class="grid grid-cols-1 gap-y-6 mx-[20px]">
        <div class="flex flex-col gap-y-2">
            <p class="text-sm font-bold ">Kode Guru</p>
            <p class="text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5">1234</p>
        </div>
        <div class="flex flex-col gap-y-4">
            <p class="text-sm font-bold ">Username</p>
            <p class="text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5">username</p>
        </div>
        <div class="flex flex-col gap-y-4">
            <p class="text-sm font-bold ">Nama Guru</p>
            <p class="text-sm text-gray-700 border-[0.5px] border-[#D9D9D9] bg-transparent rounded-[10px] py-2 px-3.5">Epik Sopian, M.Kom</p>
        </div>
        <a href="{{ route('guru.reset-password') }}" class="text-sm bg-primary rounded-[10px] py-2  text-center text-white font-semibold">Ganti Password</a>
    </div>
</section>
@endsection