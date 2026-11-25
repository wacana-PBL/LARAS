@extends('layouts.dosen')

@section('content')
<div class="mt-4 max-w-2xl mx-auto space-y-6">
    <div class="bg-[#DFE2E6] rounded-2xl px-6 py-5 shadow-sm">
        <h1 class="text-lg sm:text-xl font-bold text-gray-900">Detail & Edit Data Dosen</h1>
        <p class="text-xs sm:text-sm text-gray-700 mt-1">Perbarui informasi nama maupun kredensial akun dosen.</p>
    </div>

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl p-4 text-xs font-medium">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('update.dosen', data_get($dosen ?? [], 'id', 1)) }}" class="bg-[#DFE2E6] rounded-2xl p-6 shadow-sm space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-xs font-semibold text-gray-800 mb-1.5">Nama Lengkap & Gelar Dosen</label>
            <input type="text" name="nama_dosen" value="{{ old('nama_dosen', data_get($dosen ?? [], 'nama_dosen', '')) }}" required
                class="w-full bg-white border border-gray-300 rounded-xl px-4 py-2.5 text-xs text-gray-800 focus:outline-none focus:border-[#EE7816]">
        </div>

        <div>
            <label class="block text-xs font-semibold text-gray-800 mb-1.5">Email Akun Dosen</label>
            <input type="email" name="email" value="{{ old('email', data_get($dosen ?? [], 'user.email', '')) }}" required
                class="w-full bg-white border border-gray-300 rounded-xl px-4 py-2.5 text-xs text-gray-800 focus:outline-none focus:border-[#EE7816]">
        </div>

        <div>
            <label class="block text-xs font-semibold text-gray-800 mb-1.5">Password Baru</label>
            <input type="password" name="password" required placeholder="Masukkan password baru (min. 8 karakter)"
                class="w-full bg-white border border-gray-300 rounded-xl px-4 py-2.5 text-xs text-gray-800 focus:outline-none focus:border-[#EE7816]">
        </div>

        <div class="flex items-center justify-end gap-3 pt-2">
            <a href="{{ route('dosen.dashboard') }}" class="bg-white border border-gray-300 text-gray-700 text-xs font-semibold px-4 py-2.5 rounded-xl">
                Kembali
            </a>
            <button type="submit" class="bg-[#EE7816] hover:bg-[#d9690d] text-white text-xs font-semibold px-5 py-2.5 rounded-xl transition cursor-pointer">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection