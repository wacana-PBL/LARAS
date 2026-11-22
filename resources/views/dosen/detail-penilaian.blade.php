@extends('layouts.dosen')

@section('content')
<div class="mt-2 space-y-6">

    <!-- Back Navigation -->
    <div>
        <a href="javascript:history.back()" class="inline-flex items-center gap-2 text-xs font-medium text-gray-500 hover:text-gray-900 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span>Kembali ke Rubrik Penilaian</span>
        </a>
    </div>

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail Penilaian</h1>
            <p class="text-xs text-gray-500 mt-1">Berikan skor pada setiap kriteria, lalu tinjau ringkasan sebelum mengirim penilaian.</p>
        </div>

        <div>
            <span id="status-badge" class="inline-block border border-[#EE7816] bg-[#FFF6EE] text-[#EE7816] text-xs font-medium px-4 py-1.5 rounded-full">
                Sedang dinilai
            </span>
        </div>
    </div>

    <!-- Student & Research Info Card -->
    <div class="bg-white border border-gray-200 rounded-2xl p-5 sm:p-6 shadow-2xs flex flex-col lg:flex-row lg:items-center justify-between gap-5">
        <div class="shrink-0">
            <span class="block text-xs text-gray-500">Mahasiswa</span>
            <h2 class="text-lg font-bold text-gray-900 mt-0.5">Asfar Azuria</h2>
            <p class="text-xs text-gray-500 mt-0.5">TI 2A &bull; Sidang Skripsi</p>
        </div>

        <div class="bg-[#DFE2E6] rounded-xl px-5 py-3.5 lg:w-[68%]">
            <span class="block text-[11px] text-gray-500">Judul penelitian</span>
            <p class="text-xs sm:text-sm font-semibold text-gray-900 mt-1">
                Implementasi Sistem Manajemen Sidang Skripsi (LARAS) Berbasis Web
            </p>
        </div>
    </div>

    <!-- Main 2-Column Layout -->
    <form id="form-penilaian" action="#" method="POST" class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        @csrf

        <!-- LEFT COLUMN (7 Cols): Penilaian per Kriteria -->
        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-2xl p-6 shadow-2xs">
            <div>
                <h2 class="text-base font-bold text-gray-900">Penilaian per Kriteria</h2>
                <p class="text-xs text-gray-500 mt-0.5">Isi skor 0–100 untuk setiap kriteria. Tanda * wajib diisi.</p>
            </div>

            <!-- Info Banner -->
            <div class="mt-4 bg-[#E5E7EB] rounded-xl px-4 py-2.5 flex items-center gap-2.5 text-xs text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <span>Kriteria dan bobot ditetapkan admin &bull; Total bobot: 100%</span>
            </div>

            <!-- Criteria List -->
            <div class="divide-y divide-gray-200 mt-2">

                <!-- Kriteria 1 -->
                <div class="py-6 first:pt-5">
                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-2.5">
                                <h3 class="text-sm font-bold text-gray-900">Kualitas Konsep & Metodologi</h3>
                                <span class="bg-[#E5E7EB] text-gray-700 text-[11px] font-semibold px-2.5 py-0.5 rounded-md">30%</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1.5 leading-relaxed">
                                Kekuatan ide, relevansi teori, dan konsistensi metodologi penelitian.
                            </p>
                            <p class="text-xs text-gray-800 mt-1">
                                Dinilai dari kejelasan tujuan, keterkaitan teori, dan konsistensi metode.
                            </p>
                        </div>

                        <!-- Input Skor -->
                        <div class="shrink-0">
                            <label class="block text-[11px] font-semibold text-gray-800 mb-1">Skor *</label>
                            <div class="skor-box flex items-center justify-between w-28 border border-gray-300 rounded-xl px-3 py-2 bg-white focus-within:border-[#EE7816] transition">
                                <input type="number" min="0" max="100" value="85" data-weight="30" data-index="0" data-name="Kualitas Konsep & Metodologi"
                                    class="skor-input w-12 text-sm font-semibold text-gray-900 focus:outline-none bg-transparent" placeholder="—">
                                <span class="text-xs text-gray-400">/100</span>
                            </div>
                            <span class="skor-hint block text-[10px] text-gray-400 mt-1">Rentang 0–100</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-[11px] text-gray-500 mb-1.5">Umpan balik kriteria (opsional)</label>
                        <input type="text" value="Perjelas alasan pemilihan metode pengembangan sistem."
                            placeholder="Tambahkan catatan untuk mahasiswa..."
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-xs text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#EE7816] transition">
                    </div>
                </div>

                <!-- Kriteria 2 -->
                <div class="py-6">
                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-2.5">
                                <h3 class="text-sm font-bold text-gray-900">Kemampuan Analisis & Interpretasi</h3>
                                <span class="bg-[#E5E7EB] text-gray-700 text-[11px] font-semibold px-2.5 py-0.5 rounded-md">25%</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1.5 leading-relaxed">
                                Kemampuan menganalisis data, menarik kesimpulan, dan menghubungkan hasil dengan tujuan penelitian.
                            </p>
                            <p class="text-xs text-gray-800 mt-1">
                                Dinilai dari kedalaman analisis, ketepatan interpretasi, dan konsistensi kesimpulan.
                            </p>
                        </div>

                        <!-- Input Skor -->
                        <div class="shrink-0">
                            <label class="block text-[11px] font-semibold text-gray-800 mb-1">Skor *</label>
                            <div class="skor-box flex items-center justify-between w-28 border border-gray-300 rounded-xl px-3 py-2 bg-white focus-within:border-[#EE7816] transition">
                                <input type="number" min="0" max="100" value="80" data-weight="25" data-index="1" data-name="Kemampuan Analisis & Interpretasi"
                                    class="skor-input w-12 text-sm font-semibold text-gray-900 focus:outline-none bg-transparent" placeholder="—">
                                <span class="text-xs text-gray-400">/100</span>
                            </div>
                            <span class="skor-hint block text-[10px] text-gray-400 mt-1">Rentang 0–100</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-[11px] text-gray-500 mb-1.5">Umpan balik kriteria (opsional)</label>
                        <input type="text" value="Tambahkan pembahasan hasil pengujian pada setiap peran pengguna."
                            placeholder="Tambahkan catatan untuk mahasiswa..."
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-xs text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#EE7816] transition">
                    </div>
                </div>

                <!-- Kriteria 3 -->
                <div class="py-6">
                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-2.5">
                                <h3 class="text-sm font-bold text-gray-900">Sistematika & Penulisan</h3>
                                <span class="bg-[#E5E7EB] text-gray-700 text-[11px] font-semibold px-2.5 py-0.5 rounded-md">20%</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1.5 leading-relaxed">
                                Keteraturan struktur, kejelasan kalimat, dan penerapan pedoman penulisan yang konsisten.
                            </p>
                            <p class="text-xs text-gray-800 mt-1">
                                Dinilai dari keteraturan bab, kejelasan kalimat, dan konsistensi format penulisan.
                            </p>
                        </div>

                        <!-- Input Skor -->
                        <div class="shrink-0">
                            <label class="block text-[11px] font-semibold text-gray-800 mb-1">Skor *</label>
                            <div class="skor-box flex items-center justify-between w-28 border border-gray-300 rounded-xl px-3 py-2 bg-white focus-within:border-[#EE7816] transition">
                                <input type="number" min="0" max="100" value="90" data-weight="20" data-index="2" data-name="Sistematika & Penulisan"
                                    class="skor-input w-12 text-sm font-semibold text-gray-900 focus:outline-none bg-transparent" placeholder="—">
                                <span class="text-xs text-gray-400">/100</span>
                            </div>
                            <span class="skor-hint block text-[10px] text-gray-400 mt-1">Rentang 0–100</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-[11px] text-gray-500 mb-1.5">Umpan balik kriteria (opsional)</label>
                        <input type="text" value=""
                            placeholder="Tambahkan catatan untuk mahasiswa..."
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-xs text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#EE7816] transition">
                    </div>
                </div>

                <!-- Kriteria 4 (Belum diisi) -->
                <div class="py-6 pb-2">
                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-2.5">
                                <h3 class="text-sm font-bold text-gray-900">Presentasi & Jawaban Pertanyaan</h3>
                                <span class="bg-[#E5E7EB] text-gray-700 text-[11px] font-semibold px-2.5 py-0.5 rounded-md">25%</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1.5 leading-relaxed">
                                Kemampuan menyampaikan hasil, menjawab pertanyaan, dan menunjukkan penguasaan materi.
                            </p>
                            <p class="text-xs text-gray-800 mt-1">
                                Dinilai dari kejelasan presentasi, ketepatan jawaban, dan kesiapan menghadapi pertanyaan.
                            </p>
                        </div>

                        <!-- Input Skor (Highlight Orange saat kosong) -->
                        <div class="shrink-0">
                            <label class="block text-[11px] font-semibold text-gray-800 mb-1">Skor *</label>
                            <div class="skor-box flex items-center justify-between w-28 border border-[#EE7816] rounded-xl px-3 py-2 bg-white focus-within:border-[#EE7816] transition">
                                <input type="number" min="0" max="100" value="" data-weight="25" data-index="3" data-name="Presentasi & Jawaban Pertanyaan"
                                    class="skor-input w-12 text-sm font-semibold text-gray-900 focus:outline-none bg-transparent" placeholder="—">
                                <span class="text-xs text-gray-400">/100</span>
                            </div>
                            <span class="skor-hint block text-[10px] text-[#EE7816] mt-1">Belum diisi</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-[11px] text-gray-500 mb-1.5">Umpan balik kriteria (opsional)</label>
                        <input type="text" value=""
                            placeholder="Tambahkan catatan untuk mahasiswa..."
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-xs text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#EE7816] transition">
                    </div>
                </div>

            </div>

            <!-- Footer Notice -->
            <p id="left-footer-notice" class="text-xs text-gray-500 mt-5 pt-3 border-t border-gray-100">
                Lengkapi skor Presentasi & Jawaban Pertanyaan untuk mengirim penilaian.
            </p>
        </div>

        <!-- RIGHT COLUMN (5 Cols): Ringkasan, Catatan, & Aksi -->
        <div class="lg:col-span-5 space-y-6">

            <!-- Card 1: Ringkasan Penilaian -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-2xs">
                <h2 class="text-base font-bold text-gray-900">Ringkasan Penilaian</h2>

                <!-- Progress Section -->
                <div class="mt-4">
                    <div class="flex items-center justify-between text-xs font-medium">
                        <span id="summary-count" class="text-gray-800">3 dari 4 kriteria terisi</span>
                        <span id="summary-percent" class="text-[#EE7816] font-semibold">75%</span>
                    </div>
                    <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden mt-2">
                        <div id="summary-bar" class="h-full bg-[#EE7816] rounded-full transition-all duration-300" style="width: 75%"></div>
                    </div>
                    <p class="text-[11px] text-gray-400 mt-2">Perubahan belum disimpan sebagai draf.</p>
                </div>

                <!-- Breakdown List -->
                <div class="mt-5 space-y-3.5 text-xs">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-800">Kualitas Konsep & Metodologi</p>
                            <p id="calc-text-0" class="text-[11px] text-gray-400">85 &times; 30%</p>
                        </div>
                        <span id="calc-val-0" class="font-bold text-gray-900 text-sm">25,50</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-800">Kemampuan Analisis & Interpretasi</p>
                            <p id="calc-text-1" class="text-[11px] text-gray-400">80 &times; 25%</p>
                        </div>
                        <span id="calc-val-1" class="font-bold text-gray-900 text-sm">20,00</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-800">Sistematika & Penulisan</p>
                            <p id="calc-text-2" class="text-[11px] text-gray-400">90 &times; 20%</p>
                        </div>
                        <span id="calc-val-2" class="font-bold text-gray-900 text-sm">18,00</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-800">Presentasi & Jawaban Pertanyaan</p>
                            <p id="calc-text-3" class="text-[11px] text-gray-400">Belum diisi &times; 25%</p>
                        </div>
                        <span id="calc-val-3" class="font-bold text-gray-400 text-sm">&mdash;</span>
                    </div>
                </div>

                <!-- Subtotal & Final Score Box -->
                <div class="mt-5 bg-[#DFE2E6] rounded-xl p-4">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-medium text-gray-700">Subtotal berbobot</span>
                        <span id="subtotal-val" class="text-lg font-bold text-gray-900">63,50</span>
                    </div>

                    <div class="flex items-center justify-between mt-2 pt-2 border-t border-gray-300/80">
                        <span class="text-xs text-gray-500">Nilai akhir / 100</span>
                        <span id="final-val" class="text-sm font-bold text-gray-500">&mdash;</span>
                    </div>

                    <p id="subtotal-desc" class="text-[11px] text-gray-500 mt-2.5 leading-relaxed">
                        Bobot terisi 75% dari total 100%. Nilai akhir akan muncul setelah semua skor diisi.
                    </p>
                </div>

                <!-- Formula Explanation -->
                <div class="mt-4">
                    <p class="text-[11px] font-semibold text-gray-700">Cara menghitung nilai akhir</p>
                    <p class="text-[11px] text-gray-500 mt-0.5 leading-relaxed">
                        Nilai akhir = &Sigma; (skor &times; bobot / 100). Skor yang belum diisi tidak dihitung sebagai 0. Subtotal bukan nilai akhir.
                    </p>
                </div>
            </div>

            <!-- Card 2: Catatan & Rekomendasi -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-2xs">
                <h2 class="text-base font-bold text-gray-900">Catatan & Rekomendasi</h2>
                <p class="text-xs text-gray-500 mt-0.5">Catatan keseluruhan untuk mahasiswa (opsional).</p>

                <textarea rows="4"
                    placeholder="Tulis catatan keseluruhan atau rekomendasi revisi..."
                    class="mt-3 w-full border border-gray-300 rounded-xl p-3.5 text-xs text-gray-800 leading-relaxed focus:outline-none focus:border-[#EE7816] transition">Sistem sudah menjawab kebutuhan alur sidang. Lengkapi pembahasan pengujian dan konsistensi istilah sebelum pengumpulan revisi.</textarea>
            </div>

            <!-- Card 3: Action Buttons -->
            <div class="bg-[#DFE2E6] rounded-2xl p-5 space-y-3">
                <button type="button" id="btn-draft" class="w-full bg-[#EE7816] hover:bg-[#d9690d] text-white text-xs sm:text-sm font-semibold py-3 rounded-xl transition shadow-2xs cursor-pointer">
                    Simpan Draf
                </button>

                <button type="submit" id="btn-submit" disabled class="w-full bg-[#C7C9C5] text-gray-500 text-xs sm:text-sm font-semibold py-3 rounded-xl transition cursor-not-allowed">
                    Kirim Penilaian
                </button>

                <p id="action-hint" class="text-[11px] text-gray-500 leading-relaxed pt-0.5">
                    Lengkapi 1 skor lagi untuk mengirim. Draf dapat disimpan dan dilanjutkan nanti; nilai belum dikirim ke admin.
                </p>
            </div>

        </div>
    </form>

</div>

<!-- Interactive Calculation Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('.skor-input');
    const summaryCount = document.getElementById('summary-count');
    const summaryPercent = document.getElementById('summary-percent');
    const summaryBar = document.getElementById('summary-bar');
    const subtotalVal = document.getElementById('subtotal-val');
    const finalVal = document.getElementById('final-val');
    const subtotalDesc = document.getElementById('subtotal-desc');
    const btnSubmit = document.getElementById('btn-submit');
    const actionHint = document.getElementById('action-hint');
    const leftFooterNotice = document.getElementById('left-footer-notice');

    function formatIndo(num) {
        return num.toFixed(2).replace('.', ',');
    }

    function updateCalculation() {
        let filledCount = 0;
        let filledWeight = 0;
        let subtotal = 0;
        let missingNames = [];

        inputs.forEach((input) => {
            const idx = input.dataset.index;
            const weight = parseFloat(input.dataset.weight);
            const name = input.dataset.name;
            const box = input.closest('.skor-box');
            const hint = box.parentElement.querySelector('.skor-hint');
            const calcText = document.getElementById(`calc-text-${idx}`);
            const calcVal = document.getElementById(`calc-val-${idx}`);

            let raw = input.value.trim();

            if (raw !== '') {
                let score = parseFloat(raw);
                if (score < 0) { score = 0; input.value = 0; }
                if (score > 100) { score = 100; input.value = 100; }

                const weightedScore = (score * weight) / 100;
                filledCount++;
                filledWeight += weight;
                subtotal += weightedScore;

                box.classList.remove('border-[#EE7816]');
                box.classList.add('border-gray-300');
                hint.textContent = 'Rentang 0–100';
                hint.classList.remove('text-[#EE7816]');
                hint.classList.add('text-gray-400');

                calcText.textContent = `${score} × ${weight}%`;
                calcVal.textContent = formatIndo(weightedScore);
                calcVal.classList.remove('text-gray-400');
                calcVal.classList.add('text-gray-900');
            } else {
                missingNames.push(name);

                box.classList.remove('border-gray-300');
                box.classList.add('border-[#EE7816]');
                hint.textContent = 'Belum diisi';
                hint.classList.remove('text-gray-400');
                hint.classList.add('text-[#EE7816]');

                calcText.textContent = `Belum diisi × ${weight}%`;
                calcVal.textContent = '—';
                calcVal.classList.remove('text-gray-900');
                calcVal.classList.add('text-gray-400');
            }
        });

        // Update Progress
        summaryCount.textContent = `${filledCount} dari ${inputs.length} kriteria terisi`;
        summaryPercent.textContent = `${filledWeight}%`;
        summaryBar.style.width = `${filledWeight}%`;

        // Update Subtotal & Final Score
        subtotalVal.textContent = formatIndo(subtotal);

        if (filledCount === inputs.length) {
            finalVal.textContent = formatIndo(subtotal);
            finalVal.classList.remove('text-gray-500');
            finalVal.classList.add('text-[#EE7816]', 'text-base');
            subtotalDesc.textContent = 'Semua kriteria telah diisi (100%). Penilaian siap dikirim.';

            btnSubmit.disabled = false;
            btnSubmit.className = 'w-full bg-[#16A34A] hover:bg-[#15803d] text-white text-xs sm:text-sm font-semibold py-3 rounded-xl transition shadow-2xs cursor-pointer';
            actionHint.textContent = 'Semua skor lengkap. Klik Kirim Penilaian untuk mengirimkan hasil ke admin.';
            leftFooterNotice.textContent = 'Semua kriteria telah dilengkapi. Silakan tinjau ringkasan di sebelah kanan.';
        } else {
            finalVal.textContent = '—';
            finalVal.classList.remove('text-[#EE7816]', 'text-base');
            finalVal.classList.add('text-gray-500');
            subtotalDesc.textContent = `Bobot terisi ${filledWeight}% dari total 100%. Nilai akhir akan muncul setelah semua skor diisi.`;

            const remaining = inputs.length - filledCount;
            btnSubmit.disabled = true;
            btnSubmit.className = 'w-full bg-[#C7C9C5] text-gray-500 text-xs sm:text-sm font-semibold py-3 rounded-xl transition cursor-not-allowed';
            actionHint.textContent = `Lengkapi ${remaining} skor lagi untuk mengirim. Draf dapat disimpan dan dilanjutkan nanti; nilai belum dikirim ke admin.`;
            leftFooterNotice.textContent = `Lengkapi skor ${missingNames.join(', ')} untuk mengirim penilaian.`;
        }
    }

    inputs.forEach(input => {
        input.addEventListener('input', updateCalculation);
    });
});
</script>
@endsection