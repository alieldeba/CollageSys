<nav class="flex items-center justify-between justify-content-between p-3 bg-gray-700 text-white">
    <section class="flex gap-4 items-center">
        <h2 class="font-semibold">
            <a href="{{ auth()->check() ? '/' : 'login' }}">
                CollageSYS
            </a>
        </h2>
        @auth

            @if (auth()->user()->admin)
                <section class="font-semibold transition-all hover:bg-blue-500 px-2 py-1 rounded-md">
                    <a href="/admin" class="flex flex-row gap-1 items-center">
                        <h2>
                            Admin
                        </h2>
                        <img src="/images/admin.png" alt="admin" width="25px">
                    </a>
            @endif

        @endauth
    </section>
    </section>


    <section class="flex items-center space-x-5">
        @auth

            @if (auth()->user()->isStudent())
                @include('doctors/nav')
            @endif


            @if (auth()->user()->isDoctor())
                @include('students/nav')
            @endif


            <form action="/logout" method="POST" class="font-semibold">
                @csrf
                <button type="submit">logout</button>
            </form>

            {{-- not auth --}}
        @else
            <h2
                class="font-semibold {{ request()->routeIs('login') ? 'bg-blue-500 text-white' : '' }}  p-1 rounded-lg px-3 font-semibold">
                <a href="login">
                    Sign in
                </a>
            </h2>

            <h2
                class="font-semibold {{ request()->routeIs('signup') ? 'bg-blue-500 text-white' : '' }} p-1 rounded-lg px-3 font-semibold">
                <a href="signup">
                    Sign up
                </a>
            </h2>

        @endauth

    </section>



</nav>
