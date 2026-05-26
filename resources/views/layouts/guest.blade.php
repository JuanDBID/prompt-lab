<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Prompt Lab | Autenticación</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <style>
            .bg-main-pattern {
                background-color: #020617;
                background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');
                background-size: 250px;
            }
            .logo-shadow {
                filter: drop-shadow(0 0 15px rgba(56, 189, 248, 0.25));
            }
        </style>
    </head>
    <body class="font-sans text-slate-200 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-main-pattern">
            
            <div class="mb-6 transition-transform duration-500 hover:scale-105">
                <a href="/">
                    <img src="{{ asset('images/logo-prompt-lab.png') }}" alt="Logo Prompt Lab" class="w-64 h-auto object-contain logo-shadow">
                </a>
            </div>

            <div class="w-full sm:w-md mt-6 px-8 py-8 bg-[#0f172a]/90 backdrop-blur-sm border border-slate-800 shadow-2xl rounded-[2.5rem] overflow-hidden">
                {{ $slot }}
            </div>

        </div>
    </body>
</html>
