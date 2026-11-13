<!-- Modal Panduan Cara Pakai Website SIGAP-LAB (Neobrutalism Style) -->
<div id="{{ $modalId ?? 'modal-panduan' }}" class="hidden fixed inset-0 bg-black/65 backdrop-blur-[2px] z-[100] flex items-center justify-center p-3 md:p-6 overflow-y-auto">
    <div class="neo-box p-5 md:p-8 bg-white max-w-2xl w-full my-auto relative shadow-[10px_10px_0_#0A0A0A] max-h-[92vh] flex flex-col">
        <!-- Tombol Tutup Silang -->
        <button 
            type="button" 
            onclick="document.getElementById('{{ $modalId ?? 'modal-panduan' }}').classList.add('hidden')" 
            class="absolute top-4 right-4 font-black text-sm bg-[#FFE500] border-2 border-black w-8 h-8 flex items-center justify-center hover:bg-[#FF3EA5] hover:text-white transition-colors cursor-pointer shadow-[2px_2px_0_#0A0A0A]"
            title="Tutup Panduan"
        >
            ✕
        </button>

        <!-- Header Modal -->
        <div class="border-b-3 border-[#0A0A0A] pb-4 mb-4 pr-10">
            <div class="inline-block bg-[#B4FF00] border-2 border-[#0A0A0A] px-3 py-0.5 text-[10px] font-display uppercase tracking-wider mb-1.5 shadow-[2px_2px_0_#0A0A0A]">
                SMK NEGERI 5 SURAKARTA • PANDUAN PENGGUNA
            </div>
            <h2 class="font-display text-xl md:text-2xl text-[#0A0A0A] uppercase tracking-tight">
                💡 CARA PAKAI WEBSITE SIGAP-LAB
            </h2>
            <p class="text-xs text-neutral-600 font-semibold mt-0.5">
                Panduan praktis bagi siswa untuk mengaktifkan akun, melapor kerusakan, dan memantau perbaikan sarana lab komputer.
            </p>
        </div>

        <!-- Konten Panduan (Scrollable) -->
        <div class="overflow-y-auto pr-1 space-y-4 text-xs">
            <!-- 4 Langkah Alur Penggunaan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <!-- Step 1 -->
                <div class="bg-[#F5F3EE] border-2 border-[#0A0A0A] p-3 shadow-[3px_3px_0_#0A0A0A]">
                    <div class="flex items-center gap-2 mb-1.5">
                        <span class="w-5 h-5 bg-[#FFE500] border-2 border-black font-display text-[11px] flex items-center justify-center">1</span>
                        <h4 class="font-display text-xs text-[#0A0A0A] uppercase">AKTIVASI AKUN (REGISTER)</h4>
                    </div>
                    <p class="text-neutral-700 leading-relaxed text-[11px]">
                        Bagi siswa baru, masuk ke menu <strong>Aktivasi Akun</strong>. Masukkan <strong>NIS</strong> dan <strong>Email Belajar</strong> (<code class="bg-white px-1 font-mono">@smk.belajar.id</code>). Sistem akan otomatis mencocokkan identitas dan membuat password akunmu.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="bg-[#F5F3EE] border-2 border-[#0A0A0A] p-3 shadow-[3px_3px_0_#0A0A0A]">
                    <div class="flex items-center gap-2 mb-1.5">
                        <span class="w-5 h-5 bg-[#3D5AFE] text-white border-2 border-black font-display text-[11px] flex items-center justify-center">2</span>
                        <h4 class="font-display text-xs text-[#0A0A0A] uppercase">MASUK (LOGIN)</h4>
                    </div>
                    <p class="text-neutral-700 leading-relaxed text-[11px]">
                        Gunakan <strong>NIS</strong> atau <strong>Email Belajar</strong> beserta password yang sudah kamu daftarkan. Kamu akan langsung diarahkan ke Dashboard Aduan Siswa.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="bg-[#F5F3EE] border-2 border-[#0A0A0A] p-3 shadow-[3px_3px_0_#0A0A0A]">
                    <div class="flex items-center gap-2 mb-1.5">
                        <span class="w-5 h-5 bg-[#B4FF00] border-2 border-black font-display text-[11px] flex items-center justify-center">3</span>
                        <h4 class="font-display text-xs text-[#0A0A0A] uppercase">BUAT LAPORAN KERUSAKAN</h4>
                    </div>
                    <p class="text-neutral-700 leading-relaxed text-[11px]">
                        Klik tombol <strong>+ Buat Aduan Baru</strong>. Pilih ruang lab (Lab RPL 1, 3, 4 atau Lab ASM 1, 2, 3), lalu tentukan nomor komputer (<code class="bg-white px-1 font-mono">PC-01</code> s/d <code class="bg-white px-1 font-mono">PC-40</code>), tulis rincian kendala, dan wajib unggah foto fisik bukti kerusakan.
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="bg-[#F5F3EE] border-2 border-[#0A0A0A] p-3 shadow-[3px_3px_0_#0A0A0A]">
                    <div class="flex items-center gap-2 mb-1.5">
                        <span class="w-5 h-5 bg-[#FF3EA5] text-white border-2 border-black font-display text-[11px] flex items-center justify-center">4</span>
                        <h4 class="font-display text-xs text-[#0A0A0A] uppercase">PANTAU STATUS & DISKUSI</h4>
                    </div>
                    <p class="text-neutral-700 leading-relaxed text-[11px]">
                        Pantau progres perbaikan dari teknisi:
                        <span class="block mt-1 font-bold">
                            ⏳ <span class="text-yellow-600">Pending</span> → 
                            🔧 <span class="text-blue-600">Diproses</span> → 
                            ✅ <span class="text-green-600">Selesai</span>
                        </span>
                        Kamu juga bisa saling berkirim pesan/tanggapan dengan teknisi pada detail tiket laporanmu.
                    </p>
                </div>
            </div>

            <!-- Kontak Bantuan Teknisi -->
            <div class="bg-[#FFE500]/20 border-2 border-[#0A0A0A] p-3.5 shadow-[3px_3px_0_#0A0A0A]">
                <div class="flex items-start gap-3">
                    <span class="text-2xl">👨‍💻</span>
                    <div class="flex-1">
                        <span class="font-display text-[10px] uppercase text-neutral-600 tracking-wider block">
                            BUTUH BANTUAN TEKNISI ATAU LUPA PASSWORD?
                        </span>
                        <h5 class="font-display text-sm text-[#0A0A0A]">
                            Keigo Avrel Purnomo (Teknisi Lab)
                        </h5>
                        <p class="text-[11px] text-neutral-600 font-semibold">
                            📍 Ruang TEFA (SMKN 5 Surakarta) · 📱 WhatsApp: <strong>0812-2660-9314</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi Bawah -->
        <div class="mt-4 pt-3 border-t-2 border-neutral-200 flex flex-col sm:flex-row items-center justify-between gap-2">
            <a 
                href="https://wa.me/6281226609314?text=Halo%20Kak%20Keigo,%20saya%20siswa%20SMKN%205%20Surakarta%20ingin%20bertanya%20seputar%20penggunaan%20web%20SIGAP-LAB." 
                target="_blank"
                class="btn-neo btn-neo-lime w-full sm:w-auto px-4 py-2.5 text-xs text-center shadow-[3px_3px_0_#0A0A0A]"
            >
                💬 TANYA KAK KEIGO VIA WHATSAPP →
            </a>
            <button 
                type="button" 
                onclick="document.getElementById('{{ $modalId ?? 'modal-panduan' }}').classList.add('hidden')"
                class="btn-neo btn-neo-white w-full sm:w-auto px-5 py-2 text-xs text-center shadow-[2px_2px_0_#0A0A0A] hover:bg-[#FFE500]"
            >
                MENGERTI & TUTUP
            </button>
        </div>
    </div>
</div>
