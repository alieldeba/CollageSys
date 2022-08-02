<x-layout class="">
    @slot('head')
        Doctor
    @endslot

    <main
        class="flex flex-col align-items-center justify-content-center sm:w-3/5 py-10 sm:px-10 mx-auto  bg-gray-600 border border-gray-300 rounded-2xl w-11/12 my-6 space-y-4 drop-shadow-xl">

        <x-data-item class="border-b-2 border-opacity-60 border-gray-300 pb-5" head='Name'>
            {{ $doctor->user->name }}
        </x-data-item>

        <x-data-item class="border-b-2 border-opacity-60 border-gray-300 pb-5" head='Email'>
            {{ $doctor->user->email }}
        </x-data-item>

        <x-data-item class="border-b-2 border-opacity-60 border-gray-300 pb-5" head='Age'>
            {{ $doctor->user->age }}
        </x-data-item>

        <x-data-item class="border-b-2 border-opacity-60 border-gray-300 pb-5" head='Admin'>
            {{ $doctor->user->admin ? 'True' : 'False' }}
        </x-data-item>

        <x-data-item class="border-b-2 border-opacity-60 border-gray-300 pb-3" head='Specialize'>
            {{ $doctor->spec->name }}
        </x-data-item>

        <x-data-item class="" head='Join date'>
            {{ $doctor->created_at->format('Y-m') }}
        </x-data-item>

    </main>

    <section class="sm:w-3/5 m-auto p-1 flex justify-between">
        <a href="/doctors/{{ $doctor->id }}/edit" class="block w-fit mx-auto py-2 px-4 bg-blue-500 text-white rounded-md">
            Edit?
        </a>
        <form action="/doctors/{{ $doctor->id }}/delete" method="post" class="block w-fit mx-auto bg-red-500 text-white rounded-md">
            @csrf
            @method('delete')
            <button type="submit" class="py-2 px-4">Delete?</button>
        </form>
    </section>
    
</x-layout>
