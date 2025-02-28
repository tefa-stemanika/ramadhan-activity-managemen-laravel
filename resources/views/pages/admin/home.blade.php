@extends('components.layouts.admin.container')

@section('main')
    <section>
        <h1 class="text-2xl font-bold">Assalamu’alaikum, User</h1>
        <time class="text-base font-medium mt-1.5">Senin, 01 Januari 2025</time>
        <div class="flex items-center gap-x-4 mt-7">
            <a href="{{ route('jadwal-sholat.index') }}" class="flex items-center gap-4 px-2.5 py-2 rounded bg-transparent border border-primary text-primary">
                <img src="{{ asset('icons/map_mosque.svg') }}" alt="mosque icon" width="20" height="20">
                <p class="text-sm font-bold">Jadwal Sholat</p>
            </a>
        </div>
    </section>
@endsection