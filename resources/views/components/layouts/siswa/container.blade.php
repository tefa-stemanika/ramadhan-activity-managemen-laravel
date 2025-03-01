<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siswa</title>
    @notifyCss
    @env('production')
        <link rel="stylesheet" href="{{ asset('build/assets/global.css') }}">
    @else
        @vite('resources/css/global.css')
    @endenv
</head>
<body class="max-w-[720px] mx-auto bg-white pb-6">
    @include('components.layouts.siswa.navbar')
    
    <main class="px-6 mt-32 lg:mt-0">
        @yield('main')
    </main>

    @include('notify::components.notify')
  @notifyJs
  @env('production')
      <script src="{{ asset('build/assets/main.js') }}"></script>
  @else
      @vite('resources/js/main.js')
  @endenv
  <script>
    
</script>
  @yield('scripts')
</body>
</html>