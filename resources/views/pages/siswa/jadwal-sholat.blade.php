@extends('components.layouts.siswa.container')

@section('title', 'Jadwal Sholat')

@section('main')
    <section class="mt-11">
        <p class="text-sm font-medium">{{ now()->translatedFormat('l, d F Y') }}</p>
        <div class="mt-5 overflow-x-scroll">
            <table class="min-w-full w-max">
                <tbody>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Imsak</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ Carbon\Carbon::parse($data->imsak)->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Subuh</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ Carbon\Carbon::parse($data->subuh)->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Terbit</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ Carbon\Carbon::parse($data->terbit)->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Dhuha</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ Carbon\Carbon::parse($data->dhuha)->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Duhur</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ Carbon\Carbon::parse($data->duhur)->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Ashar</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ Carbon\Carbon::parse($data->ashar)->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Magrib</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ Carbon\Carbon::parse($data->maghrib)->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="bg-primary px-6 py-2.5 text-white text-sm font-bold text-center border-b border-b-white border border-primary">Isya</th>
                        <td class="bg-white px-6 py-2.5 text-black text-sm font-bold text-center border border-primary">{{ Carbon\Carbon::parse($data->isya)->format('H:i') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection