@extends('components.layouts.admin.container')
@section('title')
    Edit User
@endsection

@section('main')
    <section>
        <div class="flex space-x-8 mb-6 md:mb-12">
            <a href="{{ url()->previous() }}" class="flex items-center gap-4">
                <div class="flex items-center justify-center bg-primary aspect-square rounded-md size-6">
                    <img src="{{ asset('icons/chevron-left.svg') }}" width="8" height="8" alt="">
                </div>
                <p class="text-sm md:text-base font-bold text-mist">Data User</p>
            </a>
            
            <a href="{{ route('user.index') }}" class="flex items-center gap-4">
                <img src="{{ asset('icons/ep_arrow-right-bold.svg') }}" width="8" height="8" alt="" class="w-4">
            </a>
    
            <p class="text-sm md:text-base font-bold">Edit User</p>
        </div>
        <form action="{{ route('user.update', $data) }}" method="POST" class="bg-white p-15 space-y-6 rounded-md border-[1.5px] border-[#D9D9D9] max-w-[750px]">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3 items-center">
                <label for="username" class="text-lg font-medium">Username</label>
                <input type="text" name="username" id="username" value="{{ $data->username }}" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 col-span-3 text-red-500 text-sm">@error('username') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3 items-center">
                <label for="password" class="text-lg font-medium">Password</label>
                <input type="password" name="password" id="password" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                <p class="col-start-2 col-span-3 text-red-500 text-sm">@error('password') {{ $message }} @enderror</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3 items-center">
                <label for="role" class="text-lg font-medium">Role</label>
                <select name="role" id="role" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                    <option value="siswa" @selected($data->role == 'siswa')>Siswa</option>
                    <option value="walikelas" @selected($data->role == 'walikelas')>Walikelas</option>
                    <option value="guru" @selected($data->role == 'guru')>Guru</option>
                    <option value="admin" @selected($data->role == 'admin')>Admin</option>
                </select>
                <p class="col-start-2 text-red-500 text-sm">@error('role') {{ $message }} @enderror</p>
            </div>
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('siswa.home') }}" class="bg-mist py-2 px-2.5 rounded text-white text-sm font-medium">Batal</a>
                <button type="submit" class="bg-primary py-2 px-2.5 rounded text-white text-sm font-medium">Simpan</button>
            </div>
        </form>
    </section>
@endsection