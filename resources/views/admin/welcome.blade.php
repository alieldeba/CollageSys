<x-layout>
    @slot('head')
        Admin
    @endslot

    <h2 class="text-center my-4 text-xl py-3 px-6 rounded-md w-fit mx-auto bg-[#ddd]">
        Welcome {{auth()->user()->name}}
    </h2>
    
</x-layout>