<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SIGAP-LAB' }} - Sistem Aduan Lab Komputer</title>
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo_smk5Solo.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo_smk5Solo.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo_smk5Solo.jpg') }}">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Archivo:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS CDN for instant styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --bg-cream: #F5F3EE;
            --c-black: #0A0A0A;
            --c-yellow: #FFE500;
            --c-blue: #3D5AFE;
            --c-pink: #FF3EA5;
            --c-lime: #B4FF00;
        }

        body {
            background-color: var(--bg-cream);
            color: var(--c-black);
            font-family: 'Archivo', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .font-display {
            font-family: 'Archivo Black', sans-serif;
        }

        /* Neobrutalism Box Styles */
        .neo-box {
            background-color: #FFFFFF;
            border: 3px solid var(--c-black);
            box-shadow: 6px 6px 0 var(--c-black);
        }

        .neo-box-sm {
            border: 2px solid var(--c-black);
            box-shadow: 3px 3px 0 var(--c-black);
        }

        /* Neobrutalism Button with active press state */
        .btn-neo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-family: 'Archivo Black', sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border: 3px solid var(--c-black);
            box-shadow: 4px 4px 0 var(--c-black);
            transition: transform 0.08s ease, box-shadow 0.08s ease;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-neo:active {
            transform: translate(3px, 3px);
            box-shadow: 1px 1px 0 var(--c-black);
        }

        .btn-neo-yellow {
            background-color: var(--c-yellow);
            color: var(--c-black);
        }

        .btn-neo-blue {
            background-color: var(--c-blue);
            color: #FFFFFF;
        }

        .btn-neo-lime {
            background-color: var(--c-lime);
            color: var(--c-black);
        }

        .btn-neo-pink {
            background-color: var(--c-pink);
            color: #FFFFFF;
        }

        .btn-neo-white {
            background-color: #FFFFFF;
            color: var(--c-black);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: var(--bg-cream); }
        ::-webkit-scrollbar-thumb { background: var(--c-black); }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    @auth
    <!-- Global Header -->
        <header class="bg-[#0A0A0A] text-white px-3 sm:px-6 h-14 flex items-center justify-between sticky top-0 z-50 border-b-2 border-[#0A0A0A]">
        <!-- Brand / Logo -->
        <div class="flex items-center gap-2 sm:gap-3 shrink-0">
            <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('siswa.dashboard') }}" class="flex items-center gap-2 sm:gap-3 decoration-0">
                <img src="{{ asset('images/logo_smk5Solo.jpg') }}" alt="Logo SMKN 5 Surakarta" class="w-7 h-7 sm:w-8 sm:h-8 rounded border border-white/30 object-contain bg-white p-0.5 shrink-0">
                <span class="bg-[#FFE500] text-[#0A0A0A] font-display text-xs sm:text-sm px-2 py-0.5 sm:px-2.5 sm:py-1 border-2 border-[#FFE500] rounded-sm tracking-wide shrink-0">
                    SIGAP-LAB
                </span>
                <span class="text-neutral-400 font-semibold text-xs tracking-wider uppercase hidden md:inline">
                    / {{ Auth::user()->role === 'admin' ? 'ADMIN / TEKNISI' : 'SISWA' }}
                </span>
            </a>
        </div>

        <!-- User Info & Keluar -->
        <div class="flex items-center gap-2 sm:gap-3 min-w-0 justify-end">
            <div class="text-right min-w-0">
                <span class="text-[#F5F3EE] text-[11px] sm:text-xs md:text-sm font-bold block truncate max-w-[130px] sm:max-w-[200px] md:max-w-none">
                    {{ Auth::user()->name }}
                </span>
                @if(Auth::user()->kelas)
                <span class="text-neutral-400 text-[9px] sm:text-[10px] md:text-xs block font-semibold truncate">
                    {{ Auth::user()->kelas }}
                </span>
                @endif
            </div>
            <form action="{{ route('logout') }}" method="POST" class="inline shrink-0">
                @csrf
                <button type="submit" class="btn-neo btn-neo-white text-[10px] sm:text-xs px-2.5 py-1 sm:px-3 sm:py-1.5 border-2 shadow-[2px_2px_0_#FFE500] bg-transparent text-[#F5F3EE] hover:bg-[#FFE500] hover:text-[#0A0A0A] transition-colors">
                    KELUAR
                </button>
            </form>
        </div>
    </header>
    @endauth

    <main class="flex-1">
        @if(session('success'))
            <div class="max-w-6xl mx-auto px-4 pt-4">
                <div class="bg-[#B4FF00] border-3 border-[#0A0A0A] p-4 font-bold text-sm shadow-[4px_4px_0_#0A0A0A] flex items-center justify-between">
                    <span>⚡ {{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-black font-extrabold ml-4">✕</button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-6xl mx-auto px-4 pt-4">
                <div class="bg-[#FF3EA5] text-white border-3 border-[#0A0A0A] p-4 font-bold text-sm shadow-[4px_4px_0_#0A0A0A] flex items-center justify-between">
                    <span>⚠️ {{ session('error') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-white font-extrabold ml-4">✕</button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    @auth
        @if(Auth::user()->role === 'siswa')
            @include('components.modal-panduan', ['modalId' => 'modal-panduan-global'])
        @endif
    @endauth
</body>
</html>
