<ul class="flex space-x-1 items-center">
    <li class="{{ request()->routeIs('home') ? 'bg-blue-500 text-white' : '' }} p-1 rounded-lg px-3 font-semibold">
        <a href="/">
            Home
        </a>
    </li>
    <li
        class="{{ request()->routeIs('doctor.account.*') ? 'bg-blue-500 text-white' : '' }}
        p-1 rounded-lg px-3 font-semibold">
        <a href="/doctor/{{ auth()->user()->doctor->id }}">
            account
        </a>
    </li>
    <li
        class="{{ request()->routeIs('doctor.history') ? 'bg-blue-500 text-white' : '' }} p-1 rounded-lg px-3 font-semibold">
        <a href="/doctor/{{ auth()->user()->doctor->id }}/history">
            history
        </a>
    </li>

    <li
        class="{{ request()->routeIs('doctor.request') ? 'bg-blue-500 text-white' : '' }} p-1 rounded-lg px-3 font-semibold">
        <a href="/doctor/{{ auth()->user()->doctor->id }}/requests">
            requests
        </a>
    </li>
</ul>
