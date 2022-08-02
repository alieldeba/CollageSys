<x-layout class="mb-3">
    <x-slot name='head'>
        login
    </x-slot>

        <x-form.formLayout head='Sign up' action='/signup' method='post' class="mt-5">
            <x-form.input type='text' name='name' label='Name' />
            <x-form.input type='email' name='email' label='Email' />
            <x-form.input type='number' name='age' label='Age' />
            <x-form.input type='password' name='password' label='Password' />
            <x-form.submit action='Login' />
            
            <x-slot name='msg'>
                <h3 class="text-center font-semibold text-base mt-5">
                    Alrady hava an account? sign in from <a href="login" class="text-blue-600 my-1 inline-block">here</a>
                </h3>
            </x-slot>

        </x-form.formLayout>


</x-layout>
