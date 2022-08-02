<x-layout class="">
    <x-slot name='head'>
        Home
    </x-slot>

    @if(auth()->user()->isDoctor())
        @include('doctors/welcome')
    @endif

    @if(auth()->user()->isStudent())
        @include('students/welcome')
    @endif

    {{-- Not doctor or student od admin --}}
    @if (!auth()->user()->isDoctor() && !auth()->user()->isStudent() && !auth()->user()->admin)        
        <h1 class="text-center mt-24 text-2xl font-semibold w-fit mx-auto bg-white p-4 rounded">
            You have to Aplly for a rule in the collage!
        </h1>
    @endif


    {{-- if user only Admin (TODO) --}}
    {{-- @if (!auth()->user()->isDoctor() && !auth()->user()->isStudent() && auth()->user()->admin)        
        {{redirect('/admin')}}
    @endif --}}
    
</x-layout>