@extends('components.layouts.admin.container')

@section('main')
    <div class="flex space-x-8">
        <section>
            <a href="{{ route('admin.home') }}" class="flex items-center gap-4">
                <div class="flex items-center justify-center bg-primary aspect-square rounded-md size-6">
                    <img src="{{ asset('icons/chevron-left.svg') }}" width="8" height="8" alt="">
                </div>
                <p class="text-base font-bold text-mist">Guru PABP</p>
            </a>
        </section>
        
        <a href="{{ route('guru.index') }}" class="flex items-center gap-4">
            <img src="{{ asset('icons/ep_arrow-right-bold.svg') }}" width="8" height="8" alt="" class="w-4">
        </a>

        <p class="text-base font-bold">Edit Guru PABP</p>
    </div>

    <section class="mt-11">
        <form action="{{ route('guru.update', $guru->id) }}" method="POST" class="bg-white p-15 space-y-6 rounded-md border-[1.5px] border-[#D9D9D9] max-w-[750px]">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="kode" class="text-lg font-medium">Kode Guru</label>
                <input type="text" name="kode" id="kode" value="{{ old('kode', $guru->kode) }}" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 text-red-500 text-sm">@error('kode') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="nama" class="text-lg font-medium">Nama Guru</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $guru->nama) }}" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="username" class="text-lg font-medium">Username</label>
                <select name="username" id="username" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                    @foreach (App\Models\User::orderBy('username')->get() as $item)
                        <option value="{{ $item->username }}" @selected($guru->username == $item->username)>{{ $item->username }}</option>
                    @endforeach
                </select>
                <p class="col-start-2 text-red-500 text-sm">@error('username') {{ $message }} @enderror</p>
            </div>
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('guru.index') }}" class="bg-mist py-2 px-2.5 rounded text-white text-sm font-medium">Batal</a>
                <button type="submit" class="bg-primary py-2 px-2.5 rounded text-white text-sm font-medium">Simpan</button>
            </div>
        </form>
    </section>
@endsection