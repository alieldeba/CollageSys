<x-layout>
    @slot('head')
        Doctor
    @endslot

    <section class="w-4/5 mx-auto mt-3 bg-gray-600 text-white p-3">
        <h2 class="font-semibold text-center text-2xl mb-8">
            Edit account Info
        </h2>
        <table class="table-fixed w-full ">
            <thead class="bg-gray-700">
                <tr>
                    <th class="p-3">Name</th>
                    <th>Email</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <form action="/student/{{ $student->id }}/edit" method="post">
                    @method('patch')
                    @csrf
                    <tr class="text-center">
                        <td class="py-6">
                            <input type="text" name="name" id="name" value="{{ $student->user->name }}"
                                class="text-black p-1.5 w-3/4">
                            @error('name')
                                <span class="text-red-500 block">{{ $message }}</span>
                            @enderror
                        </td>
                        <td class="p-3">
                            <input type="email" name="email" id="email" value="{{ $student->user->email }}"
                                class="text-black p-1.5 w-3/4">
                            @error('email')
                                <span class="text-red-500 block">{{ $message }}</span>
                            @enderror
                        </td>
                        <td class="p-3">
                            <input type="number" name="age" id="age" value="{{ $student->user->age }}"
                                class="text-black p-1.5 w-3/4">
                            @error('age')
                                <span class="text-red-500 block">{{ $message }}</span>
                            @enderror
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
