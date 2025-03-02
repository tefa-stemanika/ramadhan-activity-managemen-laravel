@props(['title', 'nestedTitle' => null])

<section class="lg:sticky lg:top-0 z-10 lg:ml-80 mb-10 px-4 lg:px-12 mt-28 lg:mt-0 lg:py-7 lg:bg-[#F5F5F5]">
    <div class="flex gap-x-4 lg:gap-x-7 items-center">
        <div class="flex gap-x-7 items-center">
            <a href="{{ url()->previous() }}" class="flex items-center justify-center bg-primary size-7 lg:size-9 rounded-lg">
                <img src="{{ asset('icons/chevron-left.svg') }}" alt="Prev Button" class="size-2.5 lg:w-[9px] lg:h-[15px]">
            </a>
            <h2 class="text-black {{ !empty($nestedTitle) ? 'text-opacity-30' : 'text-opacity-100' }} text-base lg:text-xl font-bold">{{ $title }}</h2>
        </div>
        @if (!empty($nestedTitle))
            <img src="{{ asset('icons/ep_arrow-right-bold.svg') }}" width="16" height="16" alt="Right Arrow Icon">
            <div class="flex gap-x-7 items-center">
                <h2 class="text-black text-base lg:text-xl font-bold">{{ $nestedTitle }}</h2>
            </div>
        @endif
    </div>
</section>