<x-layout>
    @slot('head')
        Doctor Requests
    @endslot

    <section class="w-4/5 mx-auto mt-3 bg-gray-600 text-white p-3">
        <h2 class="font-semibold text-center text-2xl mb-8">
            History
        </h2>

        @if ($reqs->count())
            {{-- x-show="open" --}}
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

                <section class="col-span-2 w-4/5 grid grid-cols-2 mx-auto" x-show="open" x-transition>

                    <h2 class="text-lg ">
                        Status :
                    </h2>
                    <select name="status" id="status" class="text-black p-1 status-select">
                        <option value="" selected>All</option>
                        @foreach (['open', 'rejected', 'pending', 'accssepted'] as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach

                    </select>
                    <h2 class="text-lg my-3">
                        Subject :
                    </h2>
                    <select name="subject" id="subject" class="text-black my-3 p-1 subject-select">

                        <option value="" selected>All</option>

                        @foreach ($allReqs as $item)
                            <option value="{{ $item->subject_id }}">{{ $item->subject->name }}</option>
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

            <table class="table-fixed w-full ">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="p-3">Doctor</th>
                        <th>Subject</th>
                        <th>Term</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reqs as $item)
                        @php
                            $class = '';
                            if ($item->status == 'open' || $item->status == 'pending') {
                                $class = ' text-blue-500 ';
                            } elseif ($item->status == 'rejected') {
                                $class = ' bg-red-500 ';
                            } else {
                                $class = ' bg-green-500 ';
                            }
                        @endphp
                        <tr class="text-center">
                            <td class="p-3">{{ $doctor->user->name }}</td>
                            <td class="p-3">{{ $item->subject->name }}</td>
                            <td class="p-3">{{ $item->term->name }}</td>
                            <td class="p-3 rounded-lg font-semibold {{ $class }}">{{ $item->status }}</td>
                            <td class="p-3">{{ $item->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h4 class="font-semibold text-center text-xl mb-8">
                There is no records yet.
            </h4>

        @endif
    </section>

    <a href="/doctor/{{ $doctor->id }}/request"
        class="py-2 px-6 bg-blue-500 rounded-xl block w-fit mx-auto mt-6 text-white font-semibold">new request ?</a>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="/script.js" defer></script>
</x-layout>
