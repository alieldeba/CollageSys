
<section {{ $attributes->merge() }} class="my-5 py-1 px-5 text-lg text-black mx-auto w-4/5">

    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" id='{{ $name }}' name="{{ $name }}"
        class="focus:outline-none block mt-2 border w-full p-2 border-gray-300 rounded-lg"
        value="{{$value ?? ''}}" placeholder="{{$holder ?? ''}}">

    @error($name)
        <span
            class="bg-white p-1 text-center w-fit  text-red-600 mx-auto text-sm  block">{{ $message }}
        </span>
    @enderror

</section>