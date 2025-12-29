<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KAYUKAYUKU') }} - Premium Woodcrafts</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/d79b975262.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FAFAFA;
            color: #1F2937;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Playfair Display', serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
    @livewireStyles
</head>

<body class="antialiased flex flex-col min-h-screen">
    <div id="app" class="flex-grow">
        {{-- Navbar --}}
        @include('includes.navbar-tailwind')

        <main>
            @yield('content')
        </main>
    </div>

    {{-- Footer --}}
    <footer class="bg-stone-900 text-stone-300 py-12 border-t border-stone-800 mt-auto">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between items-center">
                <div class="w-full md:w-1/3 mb-6 md:mb-0 text-center md:text-left">
                    <span class="text-2xl font-serif text-amber-500 font-bold tracking-widest">KAYUKAYUKU</span>
                    <p class="mt-2 text-sm text-stone-400">&copy; {{ date('Y') }} Premium Handicraft. All rights
                        reserved.</p>
                </div>

                <div class="w-full md:w-1/3 mb-6 md:mb-0 text-center">
                    {{-- Social Icons or Motto --}}
                    <span class="italic text-stone-500">"Nature's touch in every detail"</span>
                </div>

                <div class="w-full md:w-1/3 flex justify-center md:justify-end gap-6 text-sm font-medium">
                    <a href="#" class="hover:text-amber-500 transition-colors duration-300">Home</a>
                    <a href="#" class="hover:text-amber-500 transition-colors duration-300">Products</a>
                    <a href="#" class="hover:text-amber-500 transition-colors duration-300">About</a>
                    <a href="#" class="hover:text-amber-500 transition-colors duration-300">FAQ</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('after-script')
    @livewireScripts
</body>

</html>