<nav class="flex items-center justify-between justify-content-between p-3 bg-gray-700 text-white">
    <section class="flex gap-4 items-center">
        <h2 class="font-semibold">
            <a href='/'>
                CollageSYS
            </a>
        </h2>
    </section>


    <section class="flex items-center space-x-5">
        <ul class="flex space-x-1 items-center">
            <li
                class="{{ request()->routeIs('admin.home') ? 'bg-blue-500 text-white' : '' }} p-1 rounded-lg px-3 font-semibold">
                <a href="/admin">
                    Home
                </a>
            </li>
            <li
                class="{{ request()->routeIs('admin.doctors.*') ? 'bg-blue-500 text-white' : '' }}
                p-1 rounded-lg px-3 font-semibold">
                <a href="/doctors/all">
                    Doctors
                </a>
            </li>
            <li
                class="{{ request()->routeIs('admin.students.*') ? 'bg-blue-500 text-white' : '' }} p-1 rounded-lg px-3 font-semibold">
                <a href="/admin/{{ auth()->id() }}/students">
                    Students
                </a>
            </li>
        </ul>


        <form action="/logout" method="POST" class="font-semibold">
            @csrf
            <button type="submit">logout</button>
        </form>
    </section>



</nav>
