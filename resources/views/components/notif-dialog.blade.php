@props([
    'id',
    'title',
    'tone' => 'stage',
    'actions' => [],
    'auto' => null,
    'delay' => 1600,
])

@php
    $sizes = [
        'sm' => 'w-[200px]',
        'md' => 'w-[220px]',
        'lg' => 'w-[256px]',
        'xl' => 'w-[280px]',
    ];
@endphp

{{-- Popup mengikuti frame "notif - ..." di Figma: 800x420, tanpa radius, isi rata kiri. --}}
<div class="fixed inset-0 z-[120] items-center justify-center bg-ink/45 p-6 max-[761px]:p-3"
     data-notif-dialog="{{ $id }}"
     @if ($auto) data-notif-auto="{{ $auto }}" data-notif-delay="{{ $delay }}" @endif
     tabindex="-1"
     role="dialog"
     aria-modal="true"
     aria-labelledby="{{ $id }}-title"
     hidden>
    <div data-dialog-panel
         tabindex="-1"
         @class([
             'flex min-h-[420px] w-[800px] max-w-full flex-col px-12 pt-11 pb-[52px] max-[901px]:px-8 max-[761px]:min-h-0 max-[761px]:px-6 max-[761px]:pt-7 max-[761px]:pb-6',
             'bg-stage' => $tone === 'stage',
             'bg-line' => $tone === 'line',
         ])>
        <h2 @class([
            'm-0 text-[28px] font-bold leading-[1.45] max-[761px]:text-[22px] max-[421px]:text-[20px]',
            'text-ink' => $tone === 'stage',
            'text-ink-panel' => $tone === 'line',
        ]) id="{{ $id }}-title">{{ $title }}</h2>

        <div @class([
            'mt-[17px] text-[18px] leading-[32px] max-[761px]:mt-3 max-[761px]:text-[15px] max-[761px]:leading-[26px]',
            'text-ink' => $tone === 'stage',
            'text-[#3f4652]' => $tone === 'line',
        ])>
            {{ $slot }}
        </div>

        @if (count($actions) > 0)
            <div @class([
                'mt-auto flex flex-wrap items-center gap-6 pt-9 max-[761px]:gap-3 max-[421px]:flex-col max-[421px]:items-stretch',
                'justify-between' => count($actions) > 1,
                'justify-end' => count($actions) === 1,
            ])>
                @foreach ($actions as $action)
                    @php
                        $variant = $action['variant'] ?? 'primary';
                        $act = $action['act'] ?? 'close';
                        $size = $sizes[$action['size'] ?? 'md'];
                        $shared = 'inline-flex h-14 shrink-0 cursor-pointer items-center justify-center rounded-lg px-5 text-[18px] font-bold leading-none max-[761px]:h-12 max-[761px]:text-[16px] max-[421px]:w-full '.$size;
                    @endphp

                    @if (! empty($action['href']))
                        <a @class([
                                $shared,
                                'border border-muted bg-white text-ink hover:bg-brand-soft' => $variant === 'secondary',
                                'border-0 btn-primary bg-brand text-ink' => $variant !== 'secondary',
                            ])
                           href="{{ $action['href'] }}">{{ $action['label'] }}</a>
                    @else
                        <button @class([
                                    $shared,
                                    'border border-muted bg-white text-ink hover:bg-brand-soft' => $variant === 'secondary',
                                    'border-0 btn-primary bg-brand text-ink' => $variant !== 'secondary',
                                ])
                                type="button"
                                data-notif-act="{{ $act }}">{{ $action['label'] }}</button>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>
