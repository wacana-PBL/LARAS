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
    }

    /** @var array<int, array{label: string, href: string, active: bool}> */
    public array $items;

    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
