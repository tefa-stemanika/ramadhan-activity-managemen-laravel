<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @notifyCss
    @env('production')
        <link rel="stylesheet" href="{{ asset('build/assets/global.css') }}">
    @else
        @vite('resources/css/global.css')
    @endenv
</head>
<body class="bg-white max-w-[720px] mx-auto min-h-screen flex justify-center items-center">
    <main class="flex flex-col justify-center w-full p-6">
        <div class="space-y-3 text-center">
            <h1 class="text-primary text-2xl font-bold">Masuk</h1>
            <p class="text-xs">Masuk dan isi perjalanan ramadhan-mu!</p>
        </div>
        <form action="/signin" method="post" class="w-full mt-11">
            @csrf
            @method('POST')
            <div class="space-y-3">
                <input type="text" name="username" class="p-2.5 rounded-md text-sm font-medium placeholder:text-[#D9D9D9] placeholder:text-sm placeholder:font-medium bg-primary/10 border border-primary w-full" placeholder="Nomor Induk Siswa">
                <input type="password" name="password" class="p-2.5 rounded-md text-sm font-medium placeholder:text-[#D9D9D9] placeholder:text-sm placeholder:font-medium bg-primary/10 border border-primary w-full" placeholder="Password">
            </div>
            <div class="flex items-center justify-between mt-5">
                <div class="flex items-center gap-x-1.5">
                    <input type="checkbox" id="remember" name="remember" class="size-4 bg-white caret-[#D9D9D9]">
                    <label for="remember" class="text-[#777C7A] text-xs font-medium">Ingat Saya?</label>
                </div>
                <a href="#" class="text-primary text-xs font-medium">Lupa password?</a>
            </div>
            <button class="w-full bg-primary px-2.5 py-2 text-white text-sm font-medium mt-7">Masuk</button>
        </form>
    </main>

    @include('notify::components.notify')
  @notifyJs
  @env('production')
      <script src="{{ asset('build/assets/main.js') }}"></script>
  @else
      @vite('resources/js/main.js')
  @endenv
  @yield('scripts')
</body>
</html>