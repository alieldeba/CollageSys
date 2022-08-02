<section class="">

    <form action="{{$action ?? '/'}}" method="{{$method ?? 'post'}}"
    
    {{ $attributes->merge(['class' => "flex flex-col align-items-center justify-content-center sm:w-3/5 py-10 sm:px-10 mx-auto  bg-white border border-gray-300 rounded-2xl w-11/12"])}} >
    
        <h2 class="text-center font-semibold text-2xl">
            {{ $head ?? '' }}
        </h2>
        @csrf

        {{ $slot }}

    </form>

    {{ $msg ?? '' }}

</section>
