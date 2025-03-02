@extends('components.layouts.admin.container')

@section('title', "Data Siswa")
@section('nestedTitle', "Edit")

@section('main')
    <section>
        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" class="bg-white p-4 md:p-15 space-y-6 rounded-md border-[1.5px] border-[#D9D9D9] max-w-[750px]">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="nis" class="col-span-4 lg:col-span-1 text-sm lg:text-lg font-medium">NIS</label>
                <input type="text" name="nis" id="nis" value="{{ $siswa->nis }}"  class="col-span-4 lg:col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="lg:col-start-2 col-span-4 lg:col-span-3 text-red-500 text-sm">@error('nis') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="nama" class="col-span-4 lg:col-span-1 text-sm lg:text-lg font-medium">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ $siswa->nama }}"  class="col-span-4 lg:col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="lg:col-start-2 col-span-4 lg:col-span-3 text-red-500 text-sm">@error('nama') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="username" class="col-span-4 lg:col-span-1 text-sm lg:text-lg font-medium">Username</label>
                <select name="username" id="username" class="col-span-4 lg:col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                    @foreach (App\Models\User::orderBy('username')->where('role', 'siswa')->get() as $item)
                        <option value="{{ $item->username }}" @selected($siswa->username == $item->username)>{{ $item->username }}</option>
                    @endforeach
                </select>
                <p class="lg:col-start-2 col-span-4 lg:col-span-3 text-red-500 text-sm">@error('username') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="kode_kelas" class="col-span-4 lg:col-span-1 text-sm lg:text-lg font-medium">Kelas</label>
                <select name="kode_kelas" id="kode_kelas" class="col-span-4 lg:col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                    @foreach (App\Models\Kelas::orderBy('kode')->get() as $item)
                        <option value="{{ $item->kode }}" @selected($siswa->kode_kelas == $item->kode)>{{ $item->nama }}</option>
                    @endforeach
                </select>
                <p class="lg:col-start-2 col-span-4 lg:col-span-3 text-red-500 text-sm">@error('kode_kelas') {{ $message }} @enderror</p>
            </div>
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('siswa.index') }}" class="bg-mist py-2 px-2.5 rounded text-white text-sm font-medium">Batal</a>
                <button type="submit" class="bg-primary py-2 px-2.5 rounded text-white text-sm font-medium">Simpan</button>
            </div>
        </form>
    </section>
@endsection