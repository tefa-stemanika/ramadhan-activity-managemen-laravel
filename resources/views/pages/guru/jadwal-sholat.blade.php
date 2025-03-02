@extends('components.layouts.guru.container')

@section('title', 'Jadwal Sholat')

@section('main')
    <section>
        <p class="text-sm font-medium">{{ now()->format('D, Y M d') }}</p>
        <div class="mt-5 overflow-x-scroll">
            <table class="min-w-full w-max">
                <tbody>
                    @foreach($jadwal_sholat as $jadwal)                 
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Imsak</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ $jadwal['imsak'] }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Subuh</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ $jadwal['subuh'] }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Terbit</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ $jadwal['terbit'] }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Dhuha</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ $jadwal['dhuha'] }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Duhur</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ $jadwal['dzuhur'] }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Ashar</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ $jadwal['ashar'] }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Magrib</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ $jadwal['maghrib'] }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Isya</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ $jadwal['isya'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection