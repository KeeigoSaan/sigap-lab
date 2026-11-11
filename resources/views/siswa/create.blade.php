@extends('layouts.app', ['title' => 'Buat Laporan Baru'])

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <!-- Back Link -->
    <div class="mb-6">
        <a href="{{ route('siswa.dashboard') }}" class="inline-flex items-center gap-2 font-display text-xs text-[#0A0A0A] hover:underline uppercase tracking-wider">
            ← KEMBALI KE DASHBOARD
        </a>
    </div>

    <!-- Form Card -->
    <div class="neo-box p-6 md:p-8 bg-white">
        <div class="border-b-[3px] border-[#0A0A0A] pb-4 mb-6">
            <span class="inline-block bg-[#FFE500] text-black font-display text-[10px] tracking-widest px-2.5 py-0.5 border-2 border-black mb-2 shadow-[2px_2px_0_#0A0A0A]">
                FORMULIR ADUAN
            </span>
            <h1 class="font-display text-2xl md:text-3xl text-[#0A0A0A] uppercase">
                BUAT LAPORAN KERUSAKAN
            </h1>
            <p class="text-xs font-semibold text-neutral-600 mt-1">
                Isi rincian kendala perangkat komputer lab dengan jelas agar teknisi bisa segera memperbaiki.
            </p>
        </div>

        @if(isset($errors) && $errors->any())
            <div class="bg-[#FF3EA5] text-white border-2 border-[#0A0A0A] p-4 mb-6 font-bold text-xs shadow-[3px_3px_0_#0A0A0A]">
                <p class="font-display text-sm mb-1 uppercase">Periksa kembali inputan kamu:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('siswa.aduan.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
            @csrf

            <!-- Judul -->
            <div>
                <label class="block font-display text-xs tracking-wider uppercase mb-1.5 text-[#0A0A0A]">
                    JUDUL ADUAN <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="judul" 
                    value="{{ old('judul') }}"
                    placeholder="Contoh: Monitor PC-12 Tidak Menyala / Keyboard Rusak"
                    required
                    class="w-full bg-[#F5F3EE] border-[3px] border-[#0A0A0A] p-3 font-bold text-sm text-[#0A0A0A] focus:outline-none focus:bg-white transition-colors"
                >
            </div>

            <!-- Grid: Kategori & Perangkat -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Kategori Kerusakan -->
                <div>
                    <label class="block font-display text-xs tracking-wider uppercase mb-1.5 text-[#0A0A0A]">
                        KATEGORI KERUSAKAN <span class="text-red-500">*</span>
                    </label>
                    <select 
                        name="kategori_id" 
                        required
                        class="w-full bg-[#F5F3EE] border-[3px] border-[#0A0A0A] p-3 font-bold text-sm text-[#0A0A0A] focus:outline-none focus:bg-white transition-colors cursor-pointer"
                    >
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoriList as $k)
                            <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Pilihan Ruang Lab -->
                <div>
                    <label class="block font-display text-xs tracking-wider uppercase mb-1.5 text-[#0A0A0A]">
                        PILIH RUANG LAB <span class="text-red-500">*</span>
                    </label>
                    <select 
                        id="select-lab"
                        class="w-full bg-[#F5F3EE] border-[3px] border-[#0A0A0A] p-3 font-bold text-sm text-[#0A0A0A] focus:outline-none focus:bg-white transition-colors cursor-pointer"
                        onchange="filterLab(this.value)"
                    >
                        <option value="">-- Semua Ruang Lab --</option>
                        @php
                            $uniqueLabs = $perangkatList->pluck('lokasi')->unique();
                        @endphp
                        @foreach($uniqueLabs as $lab)
                            <option value="{{ $lab }}">🏢 {{ $lab }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Pilih Perangkat / Nomor Komputer -->
            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label class="font-display text-xs tracking-wider uppercase text-[#0A0A0A]">
                        PERANGKAT / NOMOR KOMPUTER <span class="text-red-500">*</span>
                    </label>
                    <span id="perangkat-count" class="text-[10px] font-bold text-neutral-500">
                        {{ $perangkatList->count() }} unit terdaftar
                    </span>
                </div>
                <select 
                    name="perangkat_id" 
                    id="select-perangkat"
                    required
                    class="w-full bg-[#F5F3EE] border-[3px] border-[#0A0A0A] p-3 font-bold text-sm text-[#0A0A0A] focus:outline-none focus:bg-white transition-colors cursor-pointer"
                >
                    <option value="">-- Pilih Nomor Komputer / Perangkat --</option>
                    @foreach($perangkatList->groupBy('lokasi') as $lokasi => $items)
                        <optgroup label="🏢 {{ strtoupper($lokasi) }} ({{ $items->count() }} UNIT)" data-lab="{{ $lokasi }}">
                            @foreach($items as $p)
                                <option value="{{ $p->id }}" data-lab="{{ $p->lokasi }}" {{ old('perangkat_id') == $p->id ? 'selected' : '' }}>
                                    {{ $p->kode_perangkat }} - {{ $p->nama_perangkat }} ({{ $p->lokasi }})
                                </option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>

            <!-- Deskripsi -->
            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label class="font-display text-xs tracking-wider uppercase text-[#0A0A0A]">
                        DESKRIPSI KERUSAKAN <span class="text-red-500">*</span>
                    </label>
                    <span class="text-[10px] font-bold text-neutral-500">Min. 20 Karakter</span>
                </div>
                <textarea 
                    name="deskripsi" 
                    rows="4"
                    placeholder="Jelaskan secara rinci kronologi atau masalah yang kamu temukan pada komputer tersebut..."
                    required
                    class="w-full bg-[#F5F3EE] border-[3px] border-[#0A0A0A] p-3 font-bold text-sm text-[#0A0A0A] focus:outline-none focus:bg-white transition-colors"
                >{{ old('deskripsi') }}</textarea>
            </div>

            <!-- Upload Foto Bukti -->
            <div>
                <label class="block font-display text-xs tracking-wider uppercase mb-1.5 text-[#0A0A0A]">
                    FOTO BUKTI KERUSAKAN <span class="text-red-500">*</span>
                </label>
                <div class="border-[3px] border-dashed border-[#0A0A0A] bg-[#F5F3EE] p-4 text-center">
                    <input 
                        type="file" 
                        name="foto_bukti" 
                        accept="image/*"
                        required
                        class="text-xs font-bold text-[#0A0A0A] file:mr-4 file:py-2 file:px-4 file:border-2 file:border-black file:text-xs file:font-display file:bg-[#FFE500] file:text-black hover:file:bg-[#0A0A0A] hover:file:text-white file:cursor-pointer"
                    >
                    <p class="text-[10px] font-bold text-neutral-500 mt-2">Wajib dilampirkan. Maksimal ukuran file: 2 MB (JPG, PNG, WEBP, JFIF)</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center gap-3 pt-4 border-t-2 border-neutral-200">
                <button type="submit" class="btn-neo btn-neo-yellow w-full sm:w-auto px-8 py-3 text-sm shadow-[4px_4px_0_#0A0A0A]">
                    KIRIM ADUAN SEKARANG →
                </button>
                <a href="{{ route('siswa.dashboard') }}" class="btn-neo btn-neo-white w-full sm:w-auto px-6 py-3 text-xs border-2 shadow-[2px_2px_0_#0A0A0A]">
                    BATAL
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function filterLab(selectedLab) {
        const selectPerangkat = document.getElementById('select-perangkat');
        const optgroups = selectPerangkat.querySelectorAll('optgroup');
        let totalVisible = 0;

        optgroups.forEach(group => {
            const labName = group.getAttribute('data-lab');
            if (!selectedLab || labName === selectedLab) {
                group.style.display = '';
                const options = group.querySelectorAll('option');
                options.forEach(opt => opt.disabled = false);
                totalVisible += options.length;
            } else {
                group.style.display = 'none';
                group.querySelectorAll('option').forEach(opt => opt.disabled = true);
            }
        });

        const currentOpt = selectPerangkat.options[selectPerangkat.selectedIndex];
        if (currentOpt && currentOpt.value && selectedLab && currentOpt.getAttribute('data-lab') !== selectedLab) {
            selectPerangkat.value = '';
        }

        const countLabel = document.getElementById('perangkat-count');
        if (countLabel) {
            countLabel.textContent = totalVisible + ' unit tersedia' + (selectedLab ? ' di ' + selectedLab : '');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const selectPerangkat = document.getElementById('select-perangkat');
        const selectedOpt = selectPerangkat.options[selectPerangkat.selectedIndex];
        if (selectedOpt && selectedOpt.value) {
            const lab = selectedOpt.getAttribute('data-lab');
            if (lab) {
                const selectLab = document.getElementById('select-lab');
                if (selectLab) {
                    selectLab.value = lab;
                    filterLab(lab);
                }
            }
        }
    });
</script>
@endsection
