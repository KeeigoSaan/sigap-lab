@extends('layouts.app', ['title' => 'Masuk'])

@section('content')
<div class="min-h-screen flex items-center justify-center p-4 bg-[#F5F3EE]">
    <div class="w-full max-w-sm">
        <!-- Logo / Wordmark -->
        <div class="text-center mb-6">
            <div class="flex justify-center mb-3">
                <img src="{{ asset('images/logo_smk5Solo.jpg') }}" alt="Logo SMKN 5 Surakarta" class="w-20 h-20 object-contain rounded-md border-[3px] border-[#0A0A0A] bg-white p-1 shadow-[4px_4px_0_#0A0A0A]">
            </div>
            <div class="inline-block bg-[#FFE500] border-[3px] border-[#0A0A0A] px-4 py-1.5 mb-2 shadow-[3px_3px_0_#0A0A0A]">
                <span class="font-display text-[11px] tracking-[0.15em] text-[#0A0A0A]">
                    SMK NEGERI 5 SURAKARTA
                </span>
            </div>
            <h1 class="font-display text-5xl leading-none tracking-tight text-[#0A0A0A] block">
                SIGAP-LAB
            </h1>
            <p class="text-xs text-[#0A0A0A] mt-1 font-bold tracking-wider">
                SISTEM ADUAN LAB KOMPUTER
            </p>
        </div>

        <!-- Login Card -->
        <div class="neo-box p-8 bg-white">
            <h2 class="font-display text-xl tracking-wide uppercase mb-6 text-[#0A0A0A]">
                MASUK
            </h2>

            @if(isset($errors) && $errors->any())
                <div class="bg-[#FF3EA5] text-white border-2 border-[#0A0A0A] p-3 mb-4 font-bold text-xs shadow-[3px_3px_0_#0A0A0A]">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <div>
                    <label class="block font-display text-[11px] tracking-wider uppercase mb-1.5 text-[#0A0A0A]">
                        NIS ATAU EMAIL
                    </label>
                    <input 
                        type="text" 
                        name="login" 
                        value="{{ old('login') }}" 
                        placeholder="Masukkan NIS (10245) atau Email"
                        required
                        class="w-full bg-[#F5F3EE] border-[3px] border-[#0A0A0A] p-2.5 font-bold text-sm text-[#0A0A0A] focus:outline-none focus:bg-white transition-colors"
                    >
                </div>

                <div>
                    <label class="block font-display text-[11px] tracking-wider uppercase mb-1.5 text-[#0A0A0A]">
                        PASSWORD
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="••••••••"
                        required
                        class="w-full bg-[#F5F3EE] border-[3px] border-[#0A0A0A] p-2.5 font-bold text-sm text-[#0A0A0A] focus:outline-none focus:bg-white transition-colors"
                    >
                </div>

                <div class="flex items-center justify-between mt-1">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="remember" id="remember" class="w-4 h-4 accent-[#0A0A0A] cursor-pointer">
                        <label for="remember" class="text-xs font-bold text-[#0A0A0A] cursor-pointer select-none">
                            Ingat Saya
                        </label>
                    </div>
                    <button type="button" onclick="document.getElementById('modal-lupa-password').classList.remove('hidden')" class="text-xs font-bold text-neutral-600 hover:text-black underline cursor-pointer">
                        Lupa password?
                    </button>
                </div>

                <button type="submit" class="btn-neo btn-neo-yellow w-full py-3 mt-2 text-sm shadow-[4px_4px_0_#0A0A0A]">
                    MASUK KE SISTEM →
                </button>
            </form>

            <!-- Link Registrasi Siswa & Panduan -->
            <div class="mt-6 pt-4 border-t-2 border-neutral-200 text-center space-y-2">
                <p class="text-xs font-semibold text-neutral-600">
                    Siswa belum punya akun?
                </p>
                <a href="{{ route('register') }}" class="btn-neo btn-neo-white w-full py-2.5 text-xs shadow-[2px_2px_0_#0A0A0A] hover:bg-[#FFE500]">
                    ✨ DAFTAR AKUN SISWA DENGAN NIS →
                </a>
                <button type="button" onclick="document.getElementById('modal-lupa-password').classList.remove('hidden')" class="btn-neo btn-neo-lime w-full py-2 text-xs shadow-[2px_2px_0_#0A0A0A]">
                    💡 CARA PAKAI & BANTUAN SISWA
                </button>
            </div>
        </div>

        <!-- Akun Demo Cepat -->
        <div class="mt-6 p-4 border-2 border-[#0A0A0A] bg-white shadow-[4px_4px_0_#0A0A0A]">
            <p class="font-display text-[10px] tracking-wider uppercase text-neutral-500 mb-2">
                AKUN DEMO SEEDER:
            </p>
            <div class="flex flex-col gap-1 text-xs">
                <div class="flex justify-between py-1 border-b border-neutral-200">
                    <span class="font-bold">Admin:</span>
                    <code class="bg-[#F5F3EE] px-1.5 py-0.5 border border-black font-mono text-[11px]">admin@smk.sch.id / admin123</code>
                </div>
                <div class="flex justify-between py-1">
                    <span class="font-bold">Siswa (Keigo):</span>
                    <code class="bg-[#F5F3EE] px-1.5 py-0.5 border border-black font-mono text-[11px]">NIS: 10245 / siswa123</code>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Panduan & Bantuan Lupa Password -->
@include('components.modal-panduan', ['modalId' => 'modal-lupa-password'])
@endsection
