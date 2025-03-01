<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg+xml" href="{{ asset('icons/logo-primary.svg') }}">
    <title>@yield('title') - Karomah</title>
    <script src="https://unpkg.com/feather-icons"></script>
    @notifyCss
    @env('production')
        <link rel="stylesheet" href="{{ asset('build/assets/global.css') }}">
    @else
        @vite('resources/css/global.css')
    @endenv
</head>
<body class="bg-white max-w-[3000px] mx-auto">
    @include('components.layouts.admin.sidebar')

    <section class="lg:ml-80 flex items-center justify-between px-12 py-7 bg-[#F5F5F5]">
        <h1 class="text-2xl font-bold">@yield('title')</h1>
        <button class="flex items-center justify-center p-0.5 bg-[#D9D9D9] aspect-square rounded-full">
            <img src="{{ asset('icons/mynaui_user-solid.svg') }}" alt="">
        </button>
    </section>
    
    <main class="lg:ml-80 px-4 lg:px-12 mt-24 lg:mt-0 lg:my-0 py-8">
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
    feather.replace();
</script>
  @yield('scripts')
</body>
</html>