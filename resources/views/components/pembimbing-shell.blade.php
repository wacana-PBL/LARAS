@props([
    'active' => 'Pengajuan',
    'step' => 'pembimbing',
    'title',
    'subtitle' => null,
])

@php
    $tabs = [
        'pembimbing' => ['label' => 'Pembimbing', 'route' => 'pengajuan'],
        'sempro' => ['label' => 'Seminar Proposal', 'route' => 'pendaftaran.sempro'],
        'skripsi' => ['label' => 'Sidang Skripsi', 'route' => 'pendaftaran.skripsi'],
    ];
@endphp

<main class="flex min-h-screen bg-white px-[53px] pt-[25px] pb-32 pl-[60px] font-sans text-ink max-[1101px]:p-[26px_28px_64px] max-[761px]:p-[22px_20px_48px] max-[421px]:p-[20px_16px_40px]">
    <div class="mx-auto flex w-full max-w-[1327px] flex-1 flex-col">

        <x-navbar :active="$active" />

        <div class="pr-[27px] pl-5 max-[1101px]:pr-0 max-[1101px]:pl-0">
            <nav class="mt-[43px] flex h-12 items-end gap-[51px] border-b border-stage max-[1101px]:mt-[26px] max-[1101px]:h-11 max-[1101px]:gap-6 max-[1101px]:overflow-x-auto max-[761px]:mt-[22px] max-[761px]:gap-[18px] max-[421px]:gap-3.5"
                 aria-label="Tahap pembimbing">
                @foreach ($tabs as $key => $tab)
                    <a @class([
                        'relative pb-1.5 text-[20px] leading-6 whitespace-nowrap transition-colors max-[1101px]:text-[16px] max-[421px]:text-[14px]',
                        'font-semibold text-brand after:absolute after:inset-x-0 after:-bottom-[7px] after:h-0.5 after:bg-brand' => $step === $key,
                        'text-ink hover:text-brand' => $step !== $key,
                    ])
                       href="{{ route($tab['route']) }}"
                       @if ($step === $key) aria-current="page" @endif>{{ $tab['label'] }}</a>
                @endforeach
            </nav>

            <h1 class="mt-[52px] text-[28px] font-semibold leading-[1.5] max-[1101px]:mt-7 max-[1101px]:text-[23px] max-[761px]:mt-[22px] max-[761px]:text-[20px] max-[421px]:text-[18px]">{{ $title }}</h1>

            @if ($subtitle)
                <p class="mt-2 text-base leading-[1.5] max-[1101px]:text-[14px] max-[421px]:text-[13px]">{{ $subtitle }}</p>
            @endif

            {{ $slot }}
        </div>
    </div>
</main>
