@extends('components.layouts.guru.container')

@section('title', 'Dashboard Guru')
@section('show', false)

@section('main')
    <section class="mt-28">
        <h1 class="text-lg font-bold">Assalamu`alaikum, {{ $guru->nama }}</h1>
        <time class="text-sm font-medium mt-1.5">{{ now()->format('D, Y M d') }}</time>
        <div class="flex items-center gap-x-4 mt-2.5">
            <a href="{{ route('guru.data.kelas') }}" class="flex items-center px-2.5 py-2  text-sm rounded bg-primary border border-primary text-white">Lihat Kelas</a>
            <a href="{{ route('guru.jadwal-sholat') }}" class="flex items-center gap-4 px-2.5 py-2 rounded bg-transparent border border-primary text-primary">
                <img src="{{ asset('icons/map_mosque.svg') }}" alt="mosque icon" width="20" height="20">
                <p class="text-sm font-bold">Jadwal Sholat</p>
            </a>
        </div>
        <div class="mt-10">
            <p class="text-sm font-semibold mb-4">Berikut grafik kegiatan kelas anda.</p>
            <canvas id="kegiatanChart"></canvas>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            fetch("{{ route('chart.data.kelas') }}")
                .then(response => response.json())
                .then(data => {

                    const labels = data.map(item => item.kelas);
                    const values = data.map(item => item.total_kegiatan);

                    const colors = ["#13805A", "#f1c40f"];
                    const backgroundColors = values.map((_, i) => colors[i % 2]);

                    const ctx = document.getElementById("kegiatanChart").getContext("2d");
                    new Chart(ctx, {
                        type: "bar",
                        data: {
                            labels: labels,
                            datasets: [{
                                label: "Jumlah Kegiatan ",
                                data: values,
                                backgroundColor: backgroundColors,
                                borderColor: backgroundColors.map(color => color.replace("0.7", "1")), 
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: { beginAtZero: true }
                            }
                        }
                    });
                })
                .catch(error => console.error("Error saat mengambil data:", error));
        });
    </script>
@endsection