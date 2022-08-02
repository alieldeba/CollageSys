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
                <th class="p-3">Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Specialize</th>
                <th>Join date</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center">
                <td class="p-3">{{ $doctor->user->name }}</td>
                <td>{{ $doctor->user->email }}</td>
                <td>{{ $doctor->user->age }}</td>
                <td>{{ $doctor->spec->name }}</td>
                <td>{{ $doctor->created_at->diffForHumans() }}</td>
              </tr>
            </tbody>
          </table>
        </section>

        <a href="/doctor/{{$doctor->id}}/edit"
            class="py-2 px-6 bg-blue-500 rounded-xl block w-fit mx-auto mt-6 text-white font-semibold"
            >Edit ?</a>

</x-layout>