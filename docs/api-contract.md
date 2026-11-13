# LARAS — API Contract (Draft)

Dokumen ini adalah **kontrak awal** untuk backend LARAS. Disusun dari layar frontend yang sudah dibangun
(`resources/views/mahasiswa`, `resources/views/admin`, `resources/views/dosen`), jadi setiap endpoint di sini
punya layar yang memakainya. Belum ada implementasi backend/DB — semua angka dan nama field masih bisa berubah,
tapi bentuk request/response dianggap kesepakatan awal antara frontend dan backend.

---

## 1. Konvensi umum

| Aspek | Ketentuan |
|---|---|
| Base URL | `/api/v1` |
| Auth | Laravel Sanctum, header `Authorization: Bearer <token>` |
| Content-Type | `application/json` (kecuali upload: `multipart/form-data`) |
| Envelope sukses | `{ "data": ..., "meta": { ... } }` |
| Envelope error | `{ "message": "...", "errors": { "field": ["..."] } }` |
| Paginasi | `?page=1&per_page=15` → `meta.current_page, meta.last_page, meta.total` |
| Filter/pencarian | `?q=<kata kunci>&status=<enum>` |
| Tanggal | `YYYY-MM-DD` |
| Waktu | `HH:mm` (24 jam) |
| Nilai | numerik `0–100`, dua desimal (`85.00`) |
| Zona waktu | `Asia/Jakarta` |

### Role

`mahasiswa`, `dosen`, `admin`. Satu user punya tepat satu role. Endpoint di bawah `/mahasiswa/*`, `/dosen/*`,
`/admin/*` hanya boleh diakses role yang sesuai; data mahasiswa hanya boleh dibaca pemiliknya.

### Enum status

| Domain | Nilai |
|---|---|
| Pendaftaran (sempro/skripsi) | `draft`, `diajukan`, `diverifikasi`, `ditolak`, `dijadwalkan`, `selesai` |
| Logbook bimbingan | `draft`, `dikirim`, `perlu_perbaikan`, `valid` |
| Peran dosen | `pembimbing_1`, `pembimbing_2`, `penguji_1`, `penguji_2`, `belum_ditetapkan` |
| Berita acara | `menunggu`, `draft`, `terbit` |
| Jenis sidang | `sempro`, `skripsi` |
| Keputusan sidang | `lulus`, `lulus_dengan_revisi`, `tidak_lulus` |

### Kode status HTTP

`200` OK · `201` dibuat · `204` tanpa isi · `400` payload salah · `401` belum login · `403` role tidak berhak ·
`404` tidak ditemukan · `409` konflik status (mis. verifikasi berkas yang sudah diverifikasi) · `422` validasi gagal ·
`429` rate limit.

---

## 2. Auth

| Method | Endpoint | Body | Response |
|---|---|---|---|
| POST | `/auth/login` | `identity`, `password`, `consent: true` | `token`, `user` |
| POST | `/auth/logout` | – | `204` |
| GET | `/auth/me` | – | `user` |
| POST | `/auth/forgot-password` | `email` | `message` |
| POST | `/auth/reset-password` | `token`, `email`, `password` | `message` |

`identity` = NIM (mahasiswa) atau email/NIDN (dosen & admin). `consent` wajib `true` sesuai checkbox pernyataan
kepemilikan akun di halaman login.

```json
// POST /auth/login → 200
{
  "data": {
    "token": "12|xxxxxxxx",
    "user": {
      "id": 1,
      "nama": "Nadra Saputra",
      "email": "nadrasaputra@gmail.com",
      "role": "mahasiswa",
      "nim": "2507411071",
      "program_studi": "SI Teknik Informatika"
    }
  }
}
```

---

## 3. Mahasiswa

### 3.1 Dashboard — `GET /mahasiswa/dashboard`

Kartu nilai sempro, status ACC sidang, progres logbook, jadwal sidang, pembimbing, dan dewan penguji.

```json
{
  "data": {
    "nilai_sempro": 88.5,
    "status_acc": "ACC FULL",
    "logbook": { "selesai": 8, "total": 8 },
    "jadwal_sidang": {
      "id": 12,
      "jenis": "skripsi",
      "tanggal": "2026-10-22",
      "mulai": "09:00",
      "selesai": "10:30",
      "ruangan": "Ruang Sidang TIK 2"
    },
    "pembimbing": [
      { "nidn": "0412088501", "nama": "Bambang Warsuta, S.Kom., M.T.I.", "peran": "pembimbing_1" },
      { "nidn": "0315098802", "nama": "Faisal Oktavian, SS., M.T.I.", "peran": "pembimbing_2" }
    ],
    "penguji": [
      { "nidn": "0011016001", "nama": "Prof. Dr. Irwan Santosa", "peran": "penguji_1", "label": "Ketua Penguji" },
      { "nidn": "0022027501", "nama": "Dr. Hendra Saputra, M.Sc.", "peran": "penguji_2", "label": "Anggota Penguji" },
      { "nidn": "0033038001", "nama": "Dr. Anika Wijaya, M.M.", "peran": "penguji_3", "label": "Anggota Penguji" }
    ]
  }
}
```

### 3.2 Profil — `GET /mahasiswa/profile`, `PUT /mahasiswa/profile`

Body `PUT`: `nama`, `nim` (read-only setelah diset), `program_studi`, `jurusan`, `email`, `no_hp`, `kontak_darurat`,
`alamat`, plus `tugas_akhir { tahap, judul, pembimbing[] }` pada response.

`PUT /mahasiswa/profile/password` → `current_password`, `password`, `password_confirmation`.

### 3.3 Logbook bimbingan

| Method | Endpoint | Body / Query | Catatan |
|---|---|---|---|
| GET | `/mahasiswa/bimbingan/logbook` | `?status` | riwayat + filter status |
| POST | `/mahasiswa/bimbingan/logbook` | `tanggal`, `dosen_id`, `topik`, `catatan`, `file` (pdf/docx ≤ 10 MB) | tersimpan sebagai `draft` |
| PUT | `/mahasiswa/bimbingan/logbook/{id}` | field sama | hanya `draft` / `perlu_perbaikan` |
| DELETE | `/mahasiswa/bimbingan/logbook/{id}` | – | hanya `draft` |
| POST | `/mahasiswa/bimbingan/logbook/{id}/submit` | – | `draft`/`perlu_perbaikan` → `dikirim` |
| GET | `/mahasiswa/bimbingan/logbook/{id}/file` | – | signed URL / stream |

Item logbook: `id, sesi_ke, tanggal, dosen{nidn,nama}, topik, catatan, file{url,nama}, status, review{dosen_catatan, reviewed_at}`.

### 3.4 Pengajuan pembimbing

| Method | Endpoint | Body |
|---|---|---|
| GET | `/mahasiswa/pengajuan` | – (list + status aktif) |
| POST | `/mahasiswa/pengajuan` | `jenis` (`pembimbing`), `judul`, `abstrak`, `referensi`, `usulan_dosen_ids[]` |
| PUT | `/mahasiswa/pengajuan/{id}` | field sama (draft) |
| POST | `/mahasiswa/pengajuan/{id}/submit` | – |

### 3.5 Pendaftaran sempro / skripsi

| Method | Endpoint | Body |
|---|---|---|
| GET | `/mahasiswa/pendaftaran/{sempro\|skripsi}` | – |
| POST | `/mahasiswa/pendaftaran/{sempro\|skripsi}` | `documents[]` (multipart), `catatan` opsional |
| GET | `/mahasiswa/pendaftaran/{sempro\|skripsi}/riwayat` | – |

Response memuat blok "Kesiapan Pendaftaran" (checklist syarat beserta `terpenuhi`/`belum`) dan "Informasi
Penjadwalan" yang diisi admin:

```json
{
  "data": {
    "status": "diverifikasi",
    "syarat": [
      { "kode": "logbook_8", "label": "Logbook bimbingan minimal 8 sesi", "terpenuhi": true },
      { "kode": "acc_pembimbing", "label": "ACC kedua pembimbing", "terpenuhi": true },
      { "kode": "bebas_teori", "label": "Bebas mata kuliah teori", "terpenuhi": false, "catatan": "3 SKS tersisa" }
    ],
    "data_pengajuan": {
      "nama": "Nadra Saputra", "nim": "2507411071",
      "judul": "…", "pembimbing": [{ "nama": "Bambang Warsuta, S.Kom., M.T.I." }]
    },
    "jadwal": { "tanggal": null, "waktu": null, "tempat": null, "terjadwal": false }
  }
}
```

### 3.6 Jadwal & notifikasi

| Method | Endpoint | Keterangan |
|---|---|---|
| GET | `/mahasiswa/jadwal?bulan=2026-09` | agenda bulanan: `bimbingan`, `sempro`, `sidang`, `preferensi` |
| GET | `/mahasiswa/notifikasi` | list notifikasi (modal 800×420) |
| POST | `/mahasiswa/notifikasi/{id}/read` | tandai dibaca |
| POST | `/mahasiswa/notifikasi/read-all` | – |

---

## 4. Dosen

> Halaman dosen belum dibangun, kontrak ini disiapkan agar backend dan UI berikutnya seirama.

| Method | Endpoint | Keterangan |
|---|---|---|
| GET | `/dosen/dashboard` | jadwal terdekat, logbook menunggu review, penilaian belum diisi |
| GET | `/dosen/jadwal-sidang?bulan` | sidang sebagai pembimbing/penguji |
| GET | `/dosen/jadwal-sidang/{id}` | detail + daftar mahasiswa |
| GET | `/dosen/bimbingan` | mahasiswa bimbingan + logbook masuk |
| POST | `/dosen/bimbingan/{logbook_id}/review` | `status` (`disetujui`/`perlu_perbaikan`), `catatan` |
| POST | `/dosen/bimbingan/{logbook_id}/presensi` | konfirmasi kehadiran sesi |
| GET | `/dosen/rubrik?jenis=skripsi` | kriteria + bobot yang berlaku |
| GET | `/dosen/penilaian/{sidang_id}` | nilai tersimpan (jika ada) + rubrik |
| POST | `/dosen/penilaian/{sidang_id}` | `kriteria[{kriteria_id,nilai}], catatan, keputusan` |
| GET | `/dosen/penilaian/{sidang_id}/rekap` | nilai gabungan dewan penguji (read-only) |
| GET/PUT | `/dosen/profile` | biodata, NIDN, keahlian |
| GET | `/dosen/notifikasi` · POST `/{id}/read` | – |

`POST /dosen/penilaian/{sidang_id}` — bobot diambil dari rubrik aktif, backend menghitung `nilai_akhir`:

```json
{
  "kriteria": [
    { "kriteria_id": 1, "nilai": 85 },
    { "kriteria_id": 2, "nilai": 80 },
    { "kriteria_id": 3, "nilai": 90 },
    { "kriteria_id": 4, "nilai": 88 }
  ],
  "catatan": "Metodologi kuat, sistematika perlu dirapikan.",
  "keputusan": "lulus_dengan_revisi"
}
```

---

## 5. Admin

### 5.1 Dashboard — `GET /admin/dashboard`

`statistik { menunggu_verifikasi, sidang_bulan_ini, berita_acara_terbit, total_mahasiswa }`,
`aktivitas[]` (5 terbaru: `tipe, aktor, subjek, waktu`), `agenda[]` (sidang terdekat).

### 5.2 Verifikasi pendaftaran

| Method | Endpoint | Body / Query |
|---|---|---|
| GET | `/admin/verifikasi?status&q&page` | antrean + counter "12 Menunggu Verifikasi" |
| GET | `/admin/verifikasi/{id}` | detail: mahasiswa, judul, dokumen, checklist syarat |
| POST | `/admin/verifikasi/{id}/approve` | `catatan` opsional → `diverifikasi` |
| POST | `/admin/verifikasi/{id}/reject` | `alasan` (wajib) → `ditolak` |

Detail item: `id, mahasiswa{nama,nim,prodi}, jenis, judul, pembimbing[], dokumen[{nama,url}], syarat[{label,terpenuhi}], status, submitted_at`.

### 5.3 Penjadwalan

| Method | Endpoint | Body / Query |
|---|---|---|
| GET | `/admin/jadwal?bulan=2026-10` | papan jadwal per hari |
| GET | `/admin/jadwal/antrean` | pendaftaran `diverifikasi` yang siap dijadwalkan |
| POST | `/admin/jadwal` | `pendaftaran_id`, `tanggal`, `mulai`, `selesai`, `ruangan_id`, `penguji_ids[]` |
| PUT | `/admin/jadwal/{id}` | field sama |
| DELETE | `/admin/jadwal/{id}` | – |

Validasi: `selesai > mulai`, bentrok ruangan/penguji → `422` dengan `errors.jadwal`.
`409` bila pendaftaran sudah punya jadwal.

### 5.4 Plotting peran dosen & rubrik

| Method | Endpoint | Body / Query |
|---|---|---|
| GET | `/admin/plotting?q&peran&page` | daftar dosen + peran + status penetapan |
| PUT | `/admin/plotting` | bulk `[{ dosen_id, peran, mahasiswa_ids[] }]` |
| GET | `/admin/rubrik?jenis=skripsi` | daftar kriteria + total bobot |
| POST | `/admin/rubrik` | `jenis`, `nama`, `deskripsi`, `bobot` |
| PUT | `/admin/rubrik/{id}` | field sama |
| DELETE | `/admin/rubrik/{id}` | – |
| POST | `/admin/rubrik/simpan` | bulk simpan; `422` bila total bobot ≠ 100 |

`PUT /admin/plotting` mengembalikan `{ "data": { "perubahan": 3, "tersimpan": 3 } }` dan menggantikan
save bar "1 perubahan belum disimpan".

### 5.5 Berita acara

| Method | Endpoint | Body / Query |
|---|---|---|
| GET | `/admin/berita-acara?status&page` | antrean "Menunggu Diterbitkan" |
| GET | `/admin/berita-acara/{id}/preview` | data dokumen (nama, NIM, judul, keputusan, nilai) |
| POST | `/admin/berita-acara/{id}/generate` | buat PDF draft → `status: draft` |
| POST | `/admin/berita-acara/{id}/publish` | → `terbit`, hanya bila `nilai_lengkap: true` |
| GET | `/admin/berita-acara/{id}/download` | stream PDF |

### 5.6 Manajemen akun (halaman belum dibuat)

| Method | Endpoint | Body |
|---|---|---|
| GET | `/admin/users?role&q&page` | – |
| POST | `/admin/users` | `nama`, `email`, `role`, `nim`/`nidn`, `program_studi` |
| PUT | `/admin/users/{id}` | field sama |
| PATCH | `/admin/users/{id}/status` | `aktif` / `nonaktif` |
| POST | `/admin/users/{id}/reset-password` | kirim tautan reset |

### 5.7 Master data

| Method | Endpoint | Keterangan |
|---|---|---|
| GET | `/master/dosen?q` | dropdown plotting & penguji |
| GET | `/master/ruangan` | dropdown ruangan sidang |
| GET | `/master/program-studi` | – |

---

## 6. Peta layar → endpoint

| Layar | Endpoint utama |
|---|---|
| `mahasiswa/dashboard` | `GET /mahasiswa/dashboard` |
| `mahasiswa/profile` | `GET|PUT /mahasiswa/profile` |
| `mahasiswa/bimbingan` | `GET|POST /mahasiswa/bimbingan/logbook`, `POST …/{id}/submit` |
| `mahasiswa/pengajuan` | `GET|POST /mahasiswa/pengajuan`, `POST …/{id}/submit` |
| `mahasiswa/pendaftaran-sempro` | `GET|POST /mahasiswa/pendaftaran/sempro` |
| `mahasiswa/pendaftaran-skripsi` | `GET|POST /mahasiswa/pendaftaran/skripsi` |
| `mahasiswa/jadwal` | `GET /mahasiswa/jadwal` |
| `admin/dashboard` | `GET /admin/dashboard` |
| `admin/verifikasi` | `GET /admin/verifikasi`, `POST …/approve`, `POST …/reject` |
| `admin/jadwal` | `GET /admin/jadwal`, `GET /admin/jadwal/antrean`, `POST /admin/jadwal` |
| `admin/plotting` (tabel + rubrik) | `GET|PUT /admin/plotting`, `GET|POST /admin/rubrik`, `POST /admin/rubrik/simpan` |
| `admin/berita-acara` | `GET /admin/berita-acara`, `POST …/generate`, `POST …/publish` |
| `auth/login` | `POST /auth/login` |

---

## 7. Alur yang belum tertutup

1. **Role dosen belum punya UI** — folder `resources/views/dosen/` masih kosong; tanpa layar ACC logbook
   dan penilaian, status berita acara "Nilai Lengkap" tidak punya sumber data.
2. **Login belum memilih role** — belum ada redirect per role setelah `POST /auth/login`.
3. **Plotting belum terhubung ke penjadwalan** — `penguji_ids` di form jadwal idealnya terisi otomatis dari
   hasil `PUT /admin/plotting`.
4. **Halaman pendukung belum dibuat** — Form Manajemen Akun, Form Isi Biodata, varian "Pendaftaran Sempro –
   Syarat Belum Lengkap", ±20 modal notifikasi, dan dropdown dosen.
5. **Belum ada backend/DB** — seluruh form frontend masih mock (`onsubmit="return false"`).
