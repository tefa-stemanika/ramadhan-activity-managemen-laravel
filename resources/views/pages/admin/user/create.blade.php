@extends('components.layouts.admin.container')

@section('main')
    <section>
        <div class="bg-white p-15 space-y-6 rounded-md border-[1.5px] border-[#D9D9D9] max-w-[750px]">
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="username" class="text-lg font-medium">Username</label>
                <input type="text" name="username" id="username" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="password" class="text-lg font-medium">Password</label>
                <input type="password" name="password" id="password" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
            </div>
            <div class="grid grid-cols-4 gap-3 items-center">
                <label for="role" class="text-lg font-medium">Role</label>
                <select name="role" id="role" class="col-span-3 bg-white px-5 py-3.5 rounded-md border-[0.5px] border-[#D9D9D9]">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="walikelas">Walikelas</option>
                    <option value="guru">Guru</option>
                </select>
            </div>
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('siswa.home') }}" class="bg-mist py-2 px-2.5 rounded text-white text-sm font-medium">Batal</a>
                <button type="submit" class="bg-primary py-2 px-2.5 rounded text-white text-sm font-medium">Simpan</button>
            </div>
        </div>
    </section>
@endsection