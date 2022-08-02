<x-layout>
    @slot('head')
        Doctor History
    @endslot

    <section class="w-4/5 mx-auto mt-3 bg-gray-600 text-white p-3">
        <h2 class="font-semibold text-center text-2xl mb-8">
            History
        </h2>

        @if ($history->count())

            <table class="table-fixed w-full ">
                <thead class="bg-gray-700">
                    <tr>
                        <th>Doctor</th>
                        <th class="p-3">Subject</th>
                        <th>Code</th>
                        <th>Hours</th>
                        <th>Term</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($history as $item)
                        <tr class="text-center">
                            <td class="p-3">{{ $doctor->user->name }}</td>
                            <td class="p-3">{{ $item->subject->name }}</td>
                            <td class="p-3">{{ $item->subject->code }}</td>
                            <td class="p-3">{{ $item->subject->hours }}</td>
                            <td class="p-3">{{ $item->term->name }}</td>
                            <td class="p-3">{{ $item->created_at }}</td>
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


</x-layout>
