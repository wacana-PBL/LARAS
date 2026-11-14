@props(['items' => [], 'unread' => 0])

<div data-notif>
    <button class="relative flex size-12 items-center justify-center rounded-lg bg-white text-ink-panel transition-colors hover:bg-brand-soft hover:text-brand max-[1101px]:size-10 max-[1101px]:rounded-[7px] max-[421px]:size-7 max-[421px]:rounded-md"
            type="button"
            data-notif-toggle
            aria-expanded="false"
            aria-controls="notif-panel"
            aria-label="Notifikasi, {{ $unread }} belum dibaca">
        <svg class="size-[22px] max-[1101px]:size-[19px] max-[421px]:size-[15px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M12 3.4a5.6 5.6 0 0 0-5.6 5.6v3.3L4.9 15.4h14.2l-1.5-3.1V9A5.6 5.6 0 0 0 12 3.4Z"
                  stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
            <path d="M9.9 18.4a2.3 2.3 0 0 0 4.2 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
        </svg>

        @if ($unread > 0)
            <span class="absolute -top-1.5 -right-1.5 flex size-[22px] items-center justify-center rounded-full bg-brand text-[11px] font-bold leading-none text-white max-[1101px]:size-[18px] max-[1101px]:text-[10px] max-[421px]:size-4 max-[421px]:text-[9px]"
                  data-notif-badge>{{ $unread }}</span>
        @endif
    </button>

    <div class="absolute top-[calc(100%+14px)] right-0 z-50 w-[336px] max-w-[calc(100vw-32px)] overflow-hidden rounded-[15px] border border-line bg-white shadow-[0_18px_40px_-14px_rgba(2,1,0,0.35)] max-[421px]:top-[calc(100%+10px)]"
         id="notif-panel"
         data-notif-panel
         role="region"
         aria-label="Daftar notifikasi"
         hidden>
        <div class="flex items-center justify-between gap-3 border-b border-line px-[18px] py-[13px]">
            <p class="m-0 text-[15px] font-semibold leading-none text-ink-panel">Notifikasi</p>
            @if ($unread > 0)
                <button class="text-[12px] font-semibold text-brand transition-colors hover:text-brand-dark"
                        type="button" data-notif-read-all>Tandai semua dibaca</button>
            @endif
        </div>

        <ul class="m-0 max-h-[326px] list-none overflow-y-auto p-0">
            @foreach ($items as $notification)
                <li class="flex gap-2.5 border-b border-line px-[18px] py-[13px] last:border-b-0"
                    data-notif-item
                    @if (! $notification['unread']) data-read="true" @endif>
                    <span @class([
                        'mt-[7px] size-2 shrink-0 rounded-full',
                        'bg-brand' => $notification['unread'],
                        'bg-transparent' => ! $notification['unread'],
                    ]) data-notif-dot></span>

                    <div class="min-w-0">
                        <p @class([
                            'm-0 text-[14px] leading-[1.35]',
                            'font-semibold text-ink-panel' => $notification['unread'],
                            'font-normal text-[#3c414a]' => ! $notification['unread'],
                        ]) data-notif-title>{{ $notification['title'] }}</p>
                        <p class="mt-1 mb-0 text-[13px] leading-[1.45] text-[#555b65]">{{ $notification['body'] }}</p>
                        <p class="mt-1.5 mb-0 text-[12px] leading-none text-slate">{{ $notification['time'] }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
