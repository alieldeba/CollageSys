<section {{ $attributes->merge(['class' => 'text-lg space-y-2'])  }}">
    <h1 class="py-1 px-4 rounded-lg bg-white w-full text-black">
        <span class="font-semibold">
            {{ $head }}: 
        </span>
        {{ $slot }}
    </h1>
</section>
