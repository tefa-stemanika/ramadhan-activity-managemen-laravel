@extends('components.layouts.siswa.container')

@section('main')
    <section>
        <a href="{{ route('siswa.home') }}" class="flex items-center gap-4">
            <div class="flex items-center justify-center bg-primary aspect-square rounded-md size-6">
                <img src="{{ asset('icons/chevron-left.svg') }}" width="8" height="8" alt="">
            </div>
            <p class="text-sm font-bold">Jadwal Sholat</p>
        </a>
    </section>

    <section class="mt-11">
        <p class="text-sm font-medium">Senin, 01 Januari 2025</p>
        <div class="mt-5 overflow-x-scroll">
            <table class="min-w-full w-max">
                <tbody>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Subuh</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">04.43</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Duhur</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">04.43</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Ashar</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">04.43</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Magrib</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">04.43</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Isya</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">04.43</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection