<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg+xml" href="{{ asset('icons/map_mosque.svg') }}">
    <title>@yield('title') - Karomah</title>
    <script src="https://unpkg.com/feather-icons"></script>
    @notifyCss
    @env('production')
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#13805A",
                        secondary: "#f1c40f",
                        danger: "#e74c3c",
                        warning: "#FFE440",
                        warm: '#FE7C00',
                        tree: '#26DA24',
                        mist: '#777C7A'
                    }
                }
            }
        }
    </script>
    @else
        @vite('resources/css/global.css')
    @endenv
</head>
<body class="bg-white max-w-[3000px] mx-auto">
    <div class="hidden md:block">
        @include('components.layouts.admin.sidebar')
    </div>

    @include('components.layouts.admin.navbar')

    @php
        $title = app()->view->getSections()['title'];
        $nestedTitle = app()->view->getSections()['nestedTitle'] ?? null;
    @endphp

    @include('components.shared.back-button', [
        'title' => $title,
        'nestedTitle' => $nestedTitle
    ])
    
    <main class="lg:ml-80 px-4 lg:px-12 lg:my-0 py-8">
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