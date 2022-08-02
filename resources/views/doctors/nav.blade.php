<ul class="flex space-x-1">
    <li
        class="{{ request()->routeIs('home') ? 'bg-blue-500 text-white' : '' }} p-1 rounded-lg px-3 font-semibold">
        <a href="/">
            Home
        </a>
    </li>
    <li class="{{ request()->routeIs('student.acc.*') ? 'bg-blue-500 text-white' : '' }} p-1 rounded-lg px-3 font-semibold">
        <a href="/student/{{ auth()->user()->student->id }}">
            account
        </a>
    </li>
    <li
        class="{{ request()->routeIs('student.history') ? 'bg-blue-500 text-white' : '' }} p-1 rounded-lg px-3 font-semibold">
        <a href="/student/{{ auth()->user()->student->id }}/history">
            history
        </a>
    </li>
    <li class="{{ request()->routeIs('student.request.*') ? 'bg-blue-500 text-white' : '' }} p-1 rounded-lg px-3 font-semibold">
        <a href="/student/{{auth()->user()->student->id}}/requests">
            requests
        </a>
    </li>
</ul>