<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * @param  array<int, array{label: string, href?: string}>  $items
     */
    public function __construct(public ?string $active = null, public string $variant = 'default', array $items = [])
    {
        $items = $items ?: ($variant === 'admin' ? [
            ['label' => 'Dashboard', 'href' => route('admin.dashboard')],
            ['label' => 'Verifikasi', 'href' => route('admin.verifikasi')],
            ['label' => 'Jadwal', 'href' => route('admin.jadwal')],
            ['label' => 'Berita Acara', 'href' => route('admin.berita-acara')],
            ['label' => 'Manajemen Data', 'href' => route('admin.plotting')],
        ] : [
            ['label' => 'Dashboard', 'href' => route('dashboard')],
            ['label' => 'Bimbingan', 'href' => route('bimbingan')],
            ['label' => 'Pengajuan', 'href' => route('pengajuan')],
            ['label' => 'Jadwal', 'href' => route('jadwal')],
        ]);

        $this->items = array_map(fn (array $item) => [
            'label' => $item['label'],
            'href' => $item['href'] ?? '#',
            'active' => $active !== null && strcasecmp($item['label'], $active) === 0,
        ], $items);

        $this->notifications = $variant === 'admin' ? [
            [
                'title' => 'Pengajuan judul baru',
                'body' => 'Nadra Saputra mengajukan judul skripsi dan menunggu verifikasi.',
                'time' => '30 menit lalu',
                'unread' => true,
            ],
            [
                'title' => 'Berkas sempro masuk',
                'body' => 'Tiga mahasiswa mengunggah berkas pendaftaran seminar proposal.',
                'time' => '2 jam lalu',
                'unread' => true,
            ],
            [
                'title' => 'Berita acara belum lengkap',
                'body' => 'Sempro 18 Nov 2026 belum memiliki berita acara yang diunggah.',
                'time' => '1 hari lalu',
                'unread' => false,
            ],
            [
                'title' => 'Permintaan ganti jadwal',
                'body' => 'Bambang Warsuta mengajukan penggeseran jadwal bimbingan.',
                'time' => '2 hari lalu',
                'unread' => false,
            ],
        ] : [
            [
                'title' => 'Pendaftaran sempro perlu diperbaiki',
                'body' => 'Baca catatan pemeriksa, lalu kirim ulang pendaftaranmu.',
                'time' => '20 menit lalu',
                'unread' => true,
                'href' => route('pendaftaran.sempro').'#notif-perbaikan-sempro',
            ],
            [
                'title' => 'Pendaftaran sidang perlu diperbaiki',
                'body' => 'Lampiran hasil pengujian belum diunggah.',
                'time' => '6 jam lalu',
                'unread' => false,
                'href' => route('pendaftaran.skripsi').'#notif-perbaikan-skripsi',
            ],
            [
                'title' => 'Pengajuan pembimbing perlu diperbaiki',
                'body' => 'Urutan usulan dosen belum sesuai bidang topik.',
                'time' => '2 hari lalu',
                'unread' => false,
                'href' => route('pengajuan').'#notif-perbaikan-pengajuan',
            ],
            [
                'title' => 'Judul proposal disetujui',
                'body' => 'Pengajuan judul kamu sudah diverifikasi Koordinator Program Studi.',
                'time' => '2 jam lalu',
                'unread' => true,
            ],
            [
                'title' => 'Jadwal sempro ditetapkan',
                'body' => 'Seminar proposal: 24 November 2026, 09.00 WIB, Ruang 3.2.',
                'time' => '5 jam lalu',
                'unread' => true,
            ],
            [
                'title' => 'Catatan bimbingan baru',
                'body' => 'Bambang Warsuta meminta revisi Bab 2 sebelum bimbingan berikutnya.',
                'time' => '1 hari lalu',
                'unread' => false,
            ],
            [
                'title' => 'Berkas terverifikasi',
                'body' => 'KRS dan transkrip nilai semester 5 sudah diterima bagian akademik.',
                'time' => '3 hari lalu',
                'unread' => false,
            ],
        ];
    }

    /** @var array<int, array{label: string, href: string, active: bool}> */
    public array $items;

    /** @var array<int, array{title: string, body: string, time: string, unread: bool, href?: string}> */
    public array $notifications;

    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
