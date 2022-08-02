<x-layout>
    @slot('head')
        Doctor
    @endslot

    <section class="w-4/5 mx-auto mt-3 bg-gray-600 text-white p-3">
        <h2 class="font-semibold text-center text-2xl mb-8">
            Account Info
        </h2>
        <table class="table-fixed w-full ">
            <thead class="bg-gray-700">
                <tr>
                    <th class="p-3">
                        Name
                    </th>
                    <th>
                        Subject
                    </th>
                    <th>
                        Term
                    </th>
                </tr>
            </thead>
            <tbody>
                <form action="/doctor/{{$doctor->id}}/request" method="post">
                    @method('post')
                    @csrf
                    <tr class="text-center">
                        <td class="py-6">
                            {{ $doctor->user->name }}
                        </td>
                        <td class="p-3">
                            <select name="subject" id="subject" class="text-black">
                                @foreach ($subs as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                @endforeach
                            </select>
                            @error('subject')
                                <span class="text-red-500 block">{{ $message }}</span>
                            @enderror
                        </td>
                        <td class="p-3">
                            {{ $term->name . ': ' . $term->created_at->format('Y-m-d') }}
                            <input type="text" hidden value="{{$term->id}}" name="term">
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <button type="submit" class="py-2 px-4 bg-blue-500 rounded-xl">Loking good</button>
                        </th>
                    </tr>
                </form>
            </tbody>
        </table>
    </section>

    {{-- <a href="/doctor/{{$doctor->id}}/edit"
                class="py-2 px-6 bg-blue-500 rounded-xl block w-fit mx-auto mt-6 text-white font-semibold"
                >Edit ?</a> --}}
</x-layout>
