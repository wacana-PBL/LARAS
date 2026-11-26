<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePengajuanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', $this->route('Pengajuan'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'semester' => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:255',
            'status_pengajuan' => 'required|in:pending, approved, rejected',
            'judul_penelitian' => 'required|string|max:255',
            'jenis_pengajuan' => 'required|in:bimbingan, sidang skripsi, seminar proposal, preferensi, skripsi, dokumen',
            'id_mahasiswa' =>'required|exists:mahasiswa, id',
            'usulan_dosen_pembimbing' => 'string|max:255',
        ];
    }
}
