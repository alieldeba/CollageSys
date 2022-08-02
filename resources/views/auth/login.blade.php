<x-layout class=" max-h-screen ">
    <x-slot name='head'>
        login
    </x-slot>

        <x-form.formLayout head='Sign in' action='/login' method='post' class="mt-16">
            <x-form.input type='email' name='email' label='Email' />
            <x-form.input type='password' name='password' label='Password' />
            <x-form.submit action='Login' />

            <x-slot name='msg'>
                <h3 class="text-center font-semibold text-base mt-5">
                    or make a new account form <a href="signup" class="text-blue-600 my-1 inline-block">here</a>
                </h3>
            </x-slot>

        </x-form.formLayout>


</x-layout>
