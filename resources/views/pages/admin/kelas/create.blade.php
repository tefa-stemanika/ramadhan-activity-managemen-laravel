@extends('components.layouts.admin.container')
@section('title')
    Tambah Kelas
@endsection

@section('main')
    <section>
        <div class="flex space-x-8 mb-6 md:mb-12">
            <a href="{{ url()->previous() }}" class="flex items-center gap-4">
                <div class="flex items-center justify-center bg-primary aspect-square rounded-md size-6">
                    <img src="{{ asset('icons/chevron-left.svg') }}" width="8" height="8" alt="">
                </div>
                <p class="text-sm md:text-base font-bold text-mist">Data Kelas</p>
            </a>
            
            <a href="{{ route('kelas.index') }}" class="flex items-center gap-4">
                <img src="{{ asset('icons/ep_arrow-right-bold.svg') }}" width="8" height="8" alt="" class="w-4">
            </a>
    
            <p class="text-sm md:text-base font-bold">Tambah Kelas Baru</p>
        </div>
        <form action="{{ route('kelas.store') }}" method="POST" class="bg-white p-15 space-y-6 rounded-md border-[1.5px] border-[#D9D9D9] max-w-[750px]">
            @csrf
            @method('POST')
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3 items-center">
                <label for="kode" class="text-lg font-medium">Kode</label>
                <input type="text" name="kode" id="kode" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 text-red-500 text-sm">@error('kode') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3 items-center">
                <label for="nama" class="text-lg font-medium">Nama</label>
                <input type="text" name="nama" id="nama" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 text-red-500 text-sm">@error('nama') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3 items-center">
                <label for="username" class="text-lg font-medium">Username</label>
                <select name="username" id="username" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                    @foreach (App\Models\User::orderBy('username')->get() as $item)
                        <option value="{{ $item->username }}">{{ $item->username }}</option>
                    @endforeach
                </select>
                <p class="col-start-2 text-red-500 text-sm">@error('username') {{ $message }} @enderror</p>
            </div>
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('kelas.index') }}" class="bg-mist py-2 px-2.5 rounded text-white text-sm font-medium">Batal</a>
                <button type="submit" class="bg-primary py-2 px-2.5 rounded text-white text-sm font-medium">Simpan</button>
            </div>
        </div>
    </section>
@endsection