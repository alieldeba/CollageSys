<x-layout>
    @slot('head')
        Create Request
    @endslot

    <x-form.formLayout head='New Requst' action='/student/{{ auth()->user()->student->id }}/request/create'
        method='post' class="mt-16">


        @isset($subjects)
            <section class="my-5 py-1 px-5 text-lg text-black mx-auto w-4/5">
                <select name="doctorOfSubject" id="doctorOfSubject" class="p-2 w-full">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">
                            {{ $subject->doctor->user->name . ' : ' . $subject->subject->name }}</option>
                    @endforeach
                </select>
                @error('doctorOfSubject')
                    <span class="bg-white p-1 text-center w-fit  text-red-600 mx-auto text-sm  block">
                        {{ $message }}
                    </span>
                @enderror
            </section>

            <input type="hidden" name="term_id" value="{{ $subject->term_id }}">

            <x-form.submit action='Supmit' />
        @else
            <h1>No Supjects to select yet!</h1>
        @endisset

    </x-form.formLayout>

</x-layout>
