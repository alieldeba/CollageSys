<x-layout>
    @slot('head')
        Admin
    @endslot
    <h2 class="text-center text-2xl my-6">
        welcome {{ auth()->user()->name }}
    </h2>

    <section class="grid sm:grid-cols-6 grid-cols-3 w-10/12 mx-auto my-5 gap-3">

        <section class="col-span-3 bg-gray-300 rounded-lg py-4 px-6 relative">
            <h1 class="font-semibold text-xl mb-3 z-10 ">
                Manage All Doctors
            </h1>
            <section
                class="overflow-hidden m-4 ml-0 rounded-xl relative min-h-[416px] min-w-full flex items-center content-center flex-row">
                <img src="/images/Doctor.jpg" alt="Account" class="object-cover absolute w-full h-full">
                <div class="backdrop-blur-md bg-white/20 w-3/5 mx-auto p-5 space-y-4 rounded">
                    <h1 class="text-lg">
                        - View All Doctors
                    </h1>
                    <h1 class="text-lg">
                        - Update Any Doctor
                    </h1>
                    <h1 class="text-lg">
                        - Create New Doctor
                    </h1>

                    <section class="flex justify-between mt-3">
                        <a href="/doctors/all" class="px-2 py-2 text-white w-fit mx-auto rounded-lg bg-blue-500">
                            All Doctors
                        </a>
                        <a href="/doctors/create" class="px-2 py-2 text-white w-fit mx-auto rounded-lg bg-blue-500">
                            New Doctor
                        </a>

                    </section>
                </div>
            </section>

        </section>


        <section class="col-span-3 bg-gray-300 rounded-lg py-4 px-6 relative">
            <h1 class="font-semibold text-xl mb-3 z-10 ">
                Manage All Students
            </h1>
            <section
                class="overflow-hidden m-4 ml-0 rounded-xl relative min-h-[416px] min-w-full flex items-center content-center flex-row">
                <img src="/images/Student.jpg" alt="Account" class="object-cover absolute w-full h-full">
                <div class="backdrop-blur-md bg-white/20 w-3/5 mx-auto p-5 space-y-4 rounded">
                    <h1 class="text-lg">
                        - View All students
                    </h1>
                    <h1 class="text-lg">
                        - Update Any Student
                    </h1>
                    <h1 class="text-lg">
                        - Create New Student
                    </h1>

                    <section class="flex justify-between mt-3">
                        <a href="/students/all" class="px-2 py-2 text-white w-fit mx-auto rounded-lg bg-blue-500">
                            All Studetn
                        </a>
                        <a href="/students/create" class="px-2 py-2 text-white w-fit mx-auto rounded-lg bg-blue-500">
                            New Studetn
                        </a>

                    </section>
                </div>
            </section>

        </section>

        <section class=" col-span-4 col-start-2 bg-gray-300 rounded-lg py-4 px-6 relative">
            <h1 class="font-semibold text-xl mb-3 z-10 ">
                Manage All Requests
            </h1>
            <section
                class="overflow-hidden m-4 ml-0 rounded-xl relative min-h-[416px] min-w-full flex items-center content-center flex-row">
                <img src="/images/request.png" alt="Account" class="object-cover absolute w-full h-full">
                <div class="backdrop-blur-md bg-white/20 w-3/5 mx-auto p-5 space-y-4 rounded">
                    <h1 class="text-lg">
                        - View All requests
                    </h1>
                    <h1 class="text-lg">
                        - Respond To Any Request
                    </h1>
                    <section class="flex justify-between mt-3">
                        <a href="/Doctors/requests" class="px-2 py-2 text-white w-fit  rounded-lg bg-blue-500">
                            Doctors Requests
                        </a>
                        <a href="/students/requests" class="px-2 py-2 text-white w-fit rounded-lg bg-blue-500">
                            Students Requests
                        </a>

                    </section>
                </div>
            </section>

        </section>



    </section>

</x-layout>
