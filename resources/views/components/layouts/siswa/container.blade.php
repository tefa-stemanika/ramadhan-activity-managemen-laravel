<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg+xml" href="{{ asset('icons/map_mosque.svg') }}">
    <title>Siswa</title>
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
<body class="max-w-[720px] mx-auto bg-white pb-6">
    @include('components.layouts.siswa.navbar')
    
    @php
        $title = app()->view->getSections()['title'];
        $nestedTitle = app()->view->getSections()['nestedTitle'] ?? null;
        $show = app()->view->getSections()['show'] ?? 'true';
    @endphp

    @include('components.shared.back-button', [
        'title' => $title,
        'nestedTitle' => $nestedTitle,
        'show' => $show
    ])
    
    <main class="px-4 mt-28">
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