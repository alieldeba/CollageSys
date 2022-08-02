<x-layout class="">
    @slot('head')
        Admin
    @endslot

    <main class="max-w-6xl mx-auto p-4 text-center bg-gray-600 my-3 text-white">
        
        <h1 class="text-center text-2xl font-semibold">
            All Doctors
        </h1>
        
        @if ($doctors->count())
        {{-- filters --}}
        <section class="my-3 px-5 grid grid-cols-2"  x-data="{ open: false }">
            <section class="text-2xl col-span-2 mb-12 flex items-center justify-around"  
            x-data="{ text: open ? 'hide' : 'show' }">
              <h2>
                Filters
              </h2>
                 <button class="py-2 px-4 bg-blue-500 rounded-xl text-base" 
                 x-on:click="open = ! open"
                 @click="$event.target.innerHTML = open ? 'hide' : 'show' "
                 >show</button>
            </section>

            <section class="col-span-2 w-full grid grid-cols-2 mx-auto" x-show="open" x-transition>

                <h2 class="text-lg ">
                    Name :
                </h2>
                <input type="text" name="name" id="name" class="text-black p-1 w-4/5 name-select focus:outline-none " placeholder="Search for name" />
                <h2 class="text-lg my-3">
                    Specialize :
                </h2>
                <select name="spec" id="spec" class="text-black my-3 p-1 w-4/5 focus:outline-none spec-select">

                    <option value="" selected>All</option>

                    @foreach ($doctors->unique('specialize') as $doctor)
                        <option value="{{ $doctor->specialize }}">{{ $doctor->spec->name }}</option>
                    @endforeach

                </select>
                <section class="flex content-center justify-center my-4">
                    <button class=" submit bg-blue-500 px-5 py-2 rounded-xl inline-block">Apply</button>
                </section>
                <section class="flex content-center justify-center my-4">
                    <button class=" reset bg-green-500 px-5 py-2 rounded-xl inline-block">Reset</button>
                </section>
            </section>
        </section>

        {{-- headder --}}
        <section class="grid grid-cols-4 text-lg font-semibold mt-4 py-4 bg-gray-700">
            <h1>Name</h1>
            <h1>Specialize</h1>
            <h1>Admin</h1>
            <h1>Join Date</h1>
        </section>

        {{-- items --}}
            @foreach ($doctors as $doctor)
                @php
                    $spec = $doctor->user->admin ? 'True' : 'False';
                    // $bg = $loop->odd ? 'bg-[#586474] ' : '';
                @endphp
                <section
                    class="grid grid-cols-4 p-2 border-white border-opacity-50 {{ $loop->last ? '' : 'border-b-2' }}
                    hover:bg-[#586474] transition-all">
                    <h1 class="hover:text-blue-400 transition-all">
                        <a href="/doctors/{{ $doctor->id }}">
                            {{ $doctor->user->name }}
                        </a>
                    </h1>
                    <h1>{{ $doctor->spec->name }}</h1>
                    <h1>{{ $spec }}</h1>
                    <h1>{{ $doctor->created_at->format('Y-m') }}</h1>
                </section>
            @endforeach

        </main>
        @else
        <h1 class="text-center text-xl my-5">
            No Doctors to show yet.
        </h1>
        @endif
        
        @if ($doctors->count())
            <section class="max-w-screen-lg mx-auto">
                {{ $doctors->links() }}
            </section>
        @endif

        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="/script.js" defer></script>
</x-layout>
