<!DOCTYPE html>
<html lang="en" class="font-mono">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/images/collage.png">
    <title>
        {{ $head ?? 'Welcom' }}
    </title>

    <style>
        .load-finish{
            animation: finish 0.5s ease-in-out 1s forwards;
        }
        @keyframes finish{
            20%{
                top: 10%
            }
            100%{
                top : -100%
            }
        }
    </style>

</head>


<body {{ $attributes->merge(['class' => 'bg-[#eee] '])  }}>
    <div>
        {{-- <x-load msg='Loading as fast as : ' /> --}}
        @if (!request()->routeIs('admin.*'))
            <x-nav />
        @else
            @include('admin/nav')
        @endif
        
        {{ $slot }}

        {{-- display succss msgs --}}
        @if (session()->has('succss'))
            <div class="fixed bottom-2 right-1 flash-m">
                <p class="p-4 text-lg rounded-full text-center text-white z-20 bg-blue-500">{{ session('succss') }}</p>
            </div>
        @endif

        {{-- display error msgs --}}
        @if (session()->has('err'))
            <div class="fixed bottom-2 right-1 flash-m">
                <p class="p-4 text-lg rounded-full text-center text-white z-20 bg-red-500">{{ session('err') }}</p>
            </div>
        @endif

        <script src="https://cdn.tailwindcss.com/" defer></script>
        <script src="/flash.js" defer></script>
    </div>

</body>

</html>
