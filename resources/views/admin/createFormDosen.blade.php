@extends('layouts.dosen')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6">
    <!-- Banner Header -->
    <div class="bg-[#DFE2E6] rounded-2xl p-6 shadow-sm">
        <h1 class="text-xl font-bold text-gray-900">Tambah Data Dosen</h1>
        <p class="text-sm text-gray-600 mt-1">Tambahkan akun dosen pembimbing atau penguji baru ke sistem LARAS.</p>
    </div>

    <!-- Alert Error Validasi -->
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-xs space-y-1">
            @foreach ($errors->all() as $error)
                <p>&bull; {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!-- Form Tambah Dosen -->
    <form method="POST" action="{{ Route::has('store.dosen') ? route('store.dosen') : '#' }}" class="bg-[#DFE2E6] rounded-2xl p-8 shadow-sm space-y-5">
        @csrf
        <div>
            <label class="block text-xs font-semibold text-gray-800 mb-1.5">Nama Lengkap &amp; Gelar Dosen</label>
            <input type="text" name="nama_dosen" value="{{ old('nama_dosen') }}" required placeholder="Contoh: Dr. Ahmad Fauzi, M.Kom."
                class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-sm text-gray-800 focus:outline-none focus:border-[#EE7816]">
        </div>

        <div>
            <label class="block text-xs font-semibold text-gray-800 mb-1.5">Email Akun Dosen</label>
            <input type="email" name="email" value="{{ old('email') }}" required placeholder="dosen@laras.ac.id"
                class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-sm text-gray-800 focus:outline-none focus:border-[#EE7816]">
        </div>

        <div>
            <label class="block text-xs font-semibold text-gray-800 mb-1.5">Password Awal</label>
            <input type="password" name="password" required placeholder="Minimal 8 karakter"
                class="w-full bg-white border border-gray-300 rounded-xl px-4 py-3 text-sm text-gray-800 focus:outline-none focus:border-[#EE7816]">
        </div>

        <div class="flex items-center justify-end gap-3 pt-2">
            <a href="{{ url()->previous() }}" class="bg-white hover:bg-gray-50 text-gray-700 font-semibold text-xs px-5 py-2.5 rounded-xl border border-gray-200 transition">
                Batal
            </a>
            <button type="submit" class="bg-[#EE7816] hover:bg-[#d96a0e] text-white font-semibold text-xs px-6 py-2.5 rounded-xl shadow-sm transition cursor-pointer">
                Simpan Dosen
            </button>
        </div>
    </form>
</div>
@endsection