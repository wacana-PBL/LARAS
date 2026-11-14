@php
    $admin = $variant === 'admin';
    $orange = $variant === 'orange';
@endphp

<header class="flex min-h-[92px] items-center font-sans max-[1321px]:min-h-0 max-[1321px]:flex-wrap max-[1321px]:gap-x-5 max-[1321px]:gap-y-4 max-[1321px]:pb-2.5">
    <a class="font-display text-[40px] leading-none whitespace-nowrap text-black max-[1101px]:text-[32px] max-[901px]:text-[28px] max-[421px]:text-[22px]"
       href="{{ route('dashboard') }}">LARAS</a>

    <nav @class([
        'flex min-w-0 shrink-0',
        $admin
            ? 'ml-[106px] gap-[36px] max-[1321px]:order-3 max-[1321px]:ml-0 max-[1321px]:flex-[1_0_100%] max-[1321px]:flex-wrap max-[1321px]:gap-x-6 max-[1321px]:gap-y-3 max-[421px]:gap-x-3.5 max-[421px]:gap-y-2.5'
            : 'ml-[109px] gap-[86px] max-[1321px]:order-3 max-[1321px]:ml-0 max-[1321px]:flex-[1_0_100%] max-[1321px]:flex-wrap max-[1321px]:gap-6 max-[421px]:gap-4',
    ])" aria-label="Navigasi utama">
        @foreach ($items as $item)
            <a @class([
                'text-[20px] leading-normal whitespace-nowrap transition-colors max-[1101px]:text-[17px] max-[901px]:text-[15px] max-[421px]:text-[13px]',
                'font-semibold text-brand' => $item['active'],
                'text-ink hover:text-brand' => ! $item['active'],
            ])
               href="{{ $item['href'] }}"
               @if ($item['active']) aria-current="page" @endif>{{ $item['label'] }}</a>
        @endforeach
    </nav>

    <div @class([
        'ml-auto flex h-[92px] items-center gap-[29px] rounded-full pr-[21px] pl-[31px] transition-colors duration-200 max-[1101px]:h-[72px] max-[1101px]:gap-5 max-[1101px]:pr-4 max-[1101px]:pl-[22px] max-[421px]:h-[38px] max-[421px]:gap-2.5 max-[421px]:pr-1 max-[421px]:pl-2',
        'bg-brand hover:bg-brand-dark' => $orange,
        'bg-stage hover:bg-brand' => ! $orange,
    ])>
        <button class="flex size-12 items-center justify-center rounded-lg bg-danger text-white transition-colors hover:bg-danger-dark max-[1101px]:size-10 max-[1101px]:rounded-[7px] max-[421px]:size-7 max-[421px]:rounded-md"
                type="button" aria-label="Keluar">
            <svg class="size-[35px] max-[1101px]:size-[27px] max-[421px]:size-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M9.4 3.9H6.2a1.9 1.9 0 0 0-1.9 1.9v12.4a1.9 1.9 0 0 0 1.9 1.9h3.2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                <path d="M11.4 12h8.4M16.2 8.4 19.8 12l-3.6 3.6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
        @if ($admin)
            <span class="block size-[71px] rounded-full bg-muted max-[1101px]:size-[54px] max-[421px]:size-[30px]" aria-hidden="true"></span>
        @else
            <a class="block size-[71px] shrink-0 rounded-full bg-muted transition duration-200 hover:bg-brand-dark hover:ring-2 hover:ring-white/80 max-[1101px]:size-[54px] max-[421px]:size-[30px]"
               href="{{ route('profile') }}" aria-label="Buka profil" title="Profil"></a>
        @endif
    </div>
</header>
