<x-layout>
    @slot('head')
        Student History
    @endslot

    <section class="w-4/5 mx-auto mt-3 bg-gray-600 text-white p-3">
        <h2 class="font-semibold text-center text-2xl mb-8">
            History
        </h2>

        @if ($history->count())

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
                        Term :
                    </h2>
                    <select name="term" id="term" class="text-black p-1 term-select">
                        <option value="" selected>All</option>
                        @foreach ($allHistory as $item)
                            <option value="{{ $item->term_id }}">{{ $item->term->name . ' ' . $item->term->created_at->format('Y-m') }}</option>
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
                        <th>Doctor</th>
                        <th class="p-3">Subject</th>
                        <th>Code</th>
                        <th>Result</th>
                        <th>Hours</th>
                        <th>Term</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($history as $item)
                        <tr class="text-center">
                            <td class="p-3">{{ $item->doctor_of_subject->doctor->user->name }}</td>
                            <td class="p-3">{{ $item->doctor_of_subject->subject->name }}</td>
                            <td class="p-3">{{ $item->doctor_of_subject->subject->code }}</td>
                            <td class="p-3">{{ $item->result }}</td>
                            <td class="p-3">{{ $item->doctor_of_subject->subject->hours }}</td>
                            <td class="p-3">{{ $item->term->name }}</td>
                            <td class="p-3">{{ $item->created_at->format('Y-m') }}</td>
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

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="/script.js" defer></script>

</x-layout>
