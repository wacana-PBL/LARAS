@props([
    'active' => null,
    'paddingBottom' => 'pb-[65px]',
])

<main class="flex min-h-screen bg-white px-[53px] pt-[25px] pl-[60px] font-sans text-ink {{ $paddingBottom }} max-[1101px]:p-[26px_28px_64px] max-[761px]:p-[22px_20px_48px] max-[421px]:p-[20px_16px_40px]">
    <div class="mx-auto flex w-full max-w-[1327px] flex-1 flex-col">
        <x-navbar variant="admin" :active="$active" />

        {{ $slot }}
    </div>
</main>
