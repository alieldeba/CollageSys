<x-layout>

    @slot('head')
        Edit
    @endslot

    <x-form.formLayout action='/doctors/{{ $doctor->id }}/edit' method='post' class="my-6">
        @method('patch')

        @slot('head')
            Edit Doctor
        @endslot

        <x-form.input name='name' label='Name' type='text' holder='new name' value='{{ $doctor->user->name }}' />
        <x-form.input name='email' label='Email' type='email' holder='new email' value='{{ $doctor->user->email }}' />
        <x-form.input name='age' label='Age' type='number' holder='new name' value='{{ $doctor->user->age }}' />

        <section class="my-5 py-1 px-5 text-lg text-black mx-auto w-4/5">

            <label for="spec">Specialize</label>

            <select name="spec" id="spec"
                class="focus:outline-none block mt-2 border w-full p-2 border-gray-300 rounded-lg">

                @foreach ($specs as $spec)
                    <option value="{{ $spec->id }}" 
                        {{$spec->id == $doctor->spec->id ? 'selected' : ''}}>
                        {{ $spec->name }}
                    </option>
                @endforeach

            </select>

            @error('admin')
                <span class="bg-white p-1 text-center w-fit  text-red-600 mx-auto text-sm  block">{{ $message }}
                </span>
            @enderror
        </section>

        <section class="my-5 py-1 px-5 text-lg text-black mx-auto w-4/5">

            <label for="admin">Make Doc.{{ $doctor->user->name }} Admin?</label>

            <select name="admin" id="admin"
                class="focus:outline-none block mt-2 border w-full p-2 border-gray-300 rounded-lg">
                <option value="0" {{$doctor->user->admin == 0 ? 'selected' : '' }} >False</option>
                <option value="1" {{$doctor->user->admin == 1 ? 'selected' : '' }} >True</option>
            </select>
            @error('admin')
                <span class="bg-white p-1 text-center w-fit  text-red-600 mx-auto text-sm  block">{{ $message }}
                </span>
            @enderror

        </section>

        <x-form.submit action='Looks good' />

    </x-form.formLayout>

</x-layout>
