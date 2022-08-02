<h2 class="text-center text-2xl my-6">
    welcome {{ auth()->user()->name }}
</h2>

<section class="grid sm:grid-cols-6 grid-cols-3 w-10/12 mx-auto my-5 gap-3">

    <section class="col-span-3 bg-gray-300 rounded-lg py-4 px-6 relative">
        <h1 class="font-semibold text-xl mb-3 z-10 ">
            Manage your account
        </h1>
        <section
            class="overflow-hidden m-4 ml-0 rounded-xl relative min-h-[416px] min-w-full flex items-center content-center flex-row">
            <img src="/images/info.jpg" alt="Account" class="object-cover absolute w-full h-full">
            <div class="backdrop-blur-md bg-white/20 w-3/5 mx-auto p-5 space-y-4 rounded">
                <h1 class="text-lg">
                    - View Account Info
                </h1>
                <h1 class="text-lg">
                    - Update Account Info
                </h1>
                <a href="/student/{{ auth()->user()->student->id }}"
                    class="px-4 py-2 block text-white w-fit mx-auto rounded-lg bg-blue-500">
                    account
                </a>
            </div>
        </section>

    </section>


    <section class="col-span-3 bg-gray-300 rounded-lg py-4 px-6 relative">
        <h1 class="font-semibold text-xl mb-3 z-10 ">
            View your history
        </h1>
        <section
            class="overflow-hidden m-4 ml-0 rounded-xl relative min-h-[416px] min-w-full flex items-center content-center flex-row">
            <img src="/images/window.jpg" alt="Account" class="object-cover absolute w-full h-full">
            <div class="backdrop-blur-md bg-white/20 w-3/5 mx-auto p-5 space-y-4 rounded">
                <h1 class="text-lg">
                    - View Your previous subjects
                </h1>
                <a href="/student/{{ auth()->user()->student->id }}/history"
                    class="px-4 py-2 block text-white w-fit mx-auto rounded-lg bg-blue-500">
                    history
                </a>
            </div>
        </section>

    </section>

    <section class=" col-span-4 col-start-2 bg-gray-300 rounded-lg py-4 px-6 relative">
        <h1 class="font-semibold text-xl mb-3 z-10 ">
            Manage your requests
        </h1>
        <section
            class="overflow-hidden m-4 ml-0 rounded-xl relative min-h-[416px] min-w-full flex items-center content-center flex-row">
            <img src="/images/request.png" alt="Account" class="object-cover absolute w-full h-full">
            <div class="backdrop-blur-md bg-white/20 w-3/5 mx-auto p-5 space-y-4 rounded">
                <h1 class="text-lg">
                    - View requests
                </h1>
                <h1 class="text-lg">
                    - Make new request
                </h1>
                <a href="/student/{{ auth()->user()->student->id }}/requests"
                    class="px-4 py-2 block text-white w-fit mx-auto rounded-lg bg-blue-500">
                    Requests
                </a>
            </div>
        </section>

    </section>


</section>
