@extends('components.layouts.admin.container')

@section('title', "Data Kelas")
@section('nestedTitle', "Edit")

@section('main')
    <section>
        <form action="{{ route('kelas.update', $data) }}" method="POST" class="bg-white p-4 md:p-15 space-y-6 rounded-md border-[1.5px] border-[#D9D9D9] max-w-[750px]">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="kode" class="col-span-4 lg:col-span-1 text-sm lg:text-lg font-medium">Kode Kelas</label>
                <input type="text" name="kode" id="kode" value="{{ $data->kode }}" class="col-span-4 lg:col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="lg:col-start-2 col-span-4 lg:col-span-3 text-red-500 text-sm">@error('kode') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="nama" class="col-span-4 lg:col-span-1 text-sm lg:text-lg font-medium">Nama Kelas</label>
                <input type="text" name="nama" id="nama" value="{{ $data->nama }}" class="col-span-4 lg:col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="lg:col-start-2 col-span-4 lg:col-span-3 text-red-500 text-sm">@error('nama') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="kode_guru" class="col-span-4 lg:col-span-1 text-sm lg:text-lg font-medium">Kode Guru</label>
                <select name="kode_guru" id="kode_guru" class="col-span-4 lg:col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                    @foreach (App\Models\Guru::orderBy('kode')->get() as $item)
                        <option value="{{ $item->kode }}" @selected($data->kode_guru == $item->kode)>{{ $item->nama }}</option>
                    @endforeach
                    <p class="col-start-2 col-span-3 text-red-500 text-sm">@error('kode_guru') {{ $message }} @enderror</p>
                </select>
                <p class="lg:col-start-2 col-span-4 lg:col-span-3 text-red-500 text-sm">@error('kode_guru') {{ $message }} @enderror</p>
            </div>
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('kelas.index') }}" class="bg-mist py-2 px-2.5 rounded text-white text-sm font-medium">Batal</a>
                <button type="submit" class="bg-primary py-2 px-2.5 rounded text-white text-sm font-medium">Simpan</button>
            </div>
        </form>
    </section>
@endsection