<x-dashboard>
    <x-slot:content>
        <section class="mt-6">
            <div class="grid md:grid-cols-4 md:gap-2">
                <div class="bg-white p-4 rounded shadow flex items-center justify-around m-1 md:m-0 relative">
                    <div class="bg-purple-50 rounded-md ">
                        <i class="p-3 fa-solid fa-user-group text-purple-500"></i>
                    </div>
                    <div class="flex flex-col items-start justify-center">
                        <h2 class="font-bold flex mb text-gray-400">
                            {{ __('Patients') }}
                        </h2>
                        <h1 class="mt-2 font-bold text-3xl">100</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded shadow flex items-center justify-around m-1 md:m-0 relative">
                    <div class="bg-blue-50 rounded-md ">
                        <i class="p-3 fa-solid fa-wallet text-blue-500"></i>
                    </div>
                    <div class="flex flex-col items-start justify-center">
                        <h2 class="font-bold flex mb text-gray-400">
                            {{ __('Income') }}
                        </h2>
                        <h1 class="mt-2 font-bold text-3xl">1000 DA</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded shadow flex items-center justify-around m-1 md:m-0 relative">
                    <div class="bg-green-50 rounded-md ">
                        <i class="p-3 fa-regular fa-calendar text-green-500"></i>
                    </div>
                    <div class="flex flex-col items-start justify-center">
                        <h2 class="font-bold flex mb text-gray-400">
                            {{ __('Appointments') }}
                        </h2>
                        <h1 class="mt-2 font-bold text-3xl">222</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded shadow flex items-center justify-around m-1 md:m-0 relative">
                    <div class="bg-red-50 rounded-md ">
                        <i class="p-3 fa-solid fa-stethoscope text-red-300"></i>
                    </div>
                    <div class="flex flex-col items-start justify-center">
                        <h2 class="font-bold flex mb text-gray-400">
                            {{ __('Online Sessions') }}
                        </h2>
                        <h1 class="mt-2 font-bold text-3xl">100</p>
                    </div>
                </div>
            </div>
        </section>
        {{-- tadays appointments --}}
        <section x-data="{ open: false }" class="mt-6 grid md:grid-cols-2 gap-4">
            <div>
                <div class="flex items-center justify-between">
                    <h1 class="font-bold">{{ __('Next') }} {{ __('Appointments') }} </h1>
                    <span class="font-bold text-blue-500 cursor-pointer" @click="open = true">
                        {{ __('See All') }}
                    </span>
                </div>
                <div class="bg-white rounded-md p-4 mt-2">
                    <ul>
                        <li class="flex items-center justify-between py-2 px-1 bg-blue-100 rounded-md">
                            <div class="mx-2">
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                    alt="">
                            </div>
                            <div class="flex-1 ml-2">
                                <h1 class="font-bold text-blue-500">Jeff Maccoy</h1>
                                <span class="text-blue-500 text-sm">Online</span>
                            </div>
                            <div class="mr-4 font-bold">
                                <span class="text-blue-500">12:00</span>
                            </div>
                        </li>
                        <li class="flex items-center justify-between py-2 px-1 my-2 rounded-md hover:bg-blue-100">
                            <div class="mx-2">
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                    alt="">
                            </div>
                            <div class="flex-1 ml-2">
                                <h1 class="font-bold">Jeff Maccoy</h1>
                                <span>Online</span>
                            </div>
                            <div class="mr-4 font-bold">
                                <span>12:00</span>
                            </div>
                        </li>
                        <li class="flex items-center justify-between py-2 px-1 my-2 rounded-md">
                            <div class="mx-2">
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                    alt="">
                            </div>
                            <div class="flex-1 ml-2">
                                <h1 class="font-bold">Jeff Maccoy</h1>
                                <span>Online</span>
                            </div>
                            <div class="mr-4 font-bold">
                                <span>12:00</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- Request appointments --}}
            <div>
                <div class="flex items-center justify-between">
                    <h1 class="font-bold">{{ __('Requests') }} {{ __('Appointments') }} </h1>
                </div>
                <div class="bg-white rounded-md p-4 mt-2  h-64 overflow-y-auto">
                    <ul>
                        <li class="flex items-center justify-between py-2 px-1 mb-2 rounded-md hover:bg-blue-100">
                            <div class="mx-2">
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                    alt="">
                            </div>
                            <div class="flex-1 ml-2">
                                <h1 class="font-bold">Jeff Maccoy</h1>
                                <span class="block text-xs">Online</span>
                                <span> 29 February - 10:00 am</span>
                            </div>
                            <div class="mr-4 font-bold">
                                <span class="mx-1 cursor-pointer">
                                    <i class="fa-regular fa-circle-check text-blue-500 text-xl"></i>
                                </span>
                                <span class="mx-1 cursor-pointer">
                                    <i class="fa-regular fa-circle-xmark text-red-500 text-xl"></i>
                                </span>
                            </div>
                        </li>
                        <li class="flex items-center justify-between py-2 px-1 mb-2 rounded-md hover:bg-blue-100">
                            <div class="mx-2">
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                    alt="">
                            </div>
                            <div class="flex-1 ml-2">
                                <h1 class="font-bold">Jeff Maccoy</h1>
                                <span class="block text-xs">Online</span>
                                <span> 29 February - 10:00 am</span>
                            </div>
                            <div class="mr-4 font-bold">
                                <span class="mx-1 cursor-pointer">
                                    <i class="fa-regular fa-circle-check text-blue-500 text-xl"></i>
                                </span>
                                <span class="mx-1 cursor-pointer">
                                    <i class="fa-regular fa-circle-xmark text-red-500 text-xl"></i>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--show All Appointments for today -->
            <div x-cloak x-show="open" @click="open = false" x-transition
                class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden bg-gray-100/70 overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative w-full h-full md:h-auto grid place-items-center">
                    <!-- Modal content -->
                    <div @click.stop class="relative  bg-white rounded-lg shadow dark:bg-gray-700  md:w-1/2">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                All Appointments for today
                            </h3>
                            <button @click="open = false"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="staticModal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="bg-white rounded-md  p-4 mt-2">
                            <ul>
                                <li class="flex items-center justify-between py-2 px-1 bg-blue-100 rounded-md">
                                    <div class="mx-2">
                                        <img class="object-cover w-8 h-8 rounded-full"
                                            src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                            alt="">
                                    </div>
                                    <div class="flex-1 ml-2">
                                        <h1 class="font-bold text-blue-500">Jeff Maccoy</h1>
                                        <span class="text-blue-500 text-sm">Online</span>
                                    </div>
                                    <div class="mr-4 font-bold">
                                        <span class="text-blue-500">12:00</span>
                                    </div>
                                </li>
                                <li
                                    class="flex items-center justify-between py-2 px-1 my-2 rounded-md hover:bg-blue-100">
                                    <div class="mx-2">
                                        <img class="object-cover w-8 h-8 rounded-full"
                                            src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                            alt="">
                                    </div>
                                    <div class="flex-1 ml-2">
                                        <h1 class="font-bold">Jeff Maccoy</h1>
                                        <span>Online</span>
                                    </div>
                                    <div class="mr-4 font-bold">
                                        <span>12:00</span>
                                    </div>
                                </li>
                                <li class="flex items-center justify-between py-2 px-1 my-2 rounded-md">
                                    <div class="mx-2">
                                        <img class="object-cover w-8 h-8 rounded-full"
                                            src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                            alt="">
                                    </div>
                                    <div class="flex-1 ml-2">
                                        <h1 class="font-bold">Jeff Maccoy</h1>
                                        <span>Online</span>
                                    </div>
                                    <div class="mr-4 font-bold">
                                        <span>12:00</span>
                                    </div>
                                </li>
                                <li class="flex items-center justify-between py-2 px-1 my-2 rounded-md">
                                    <div class="mx-2">
                                        <img class="object-cover w-8 h-8 rounded-full"
                                            src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                            alt="">
                                    </div>
                                    <div class="flex-1 ml-2">
                                        <h1 class="font-bold">Jeff Maccoy</h1>
                                        <span>Online</span>
                                    </div>
                                    <div class="mr-4 font-bold">
                                        <span>12:00</span>
                                    </div>
                                </li>
                                <li class="flex items-center justify-between py-2 px-1 my-2 rounded-md">
                                    <div class="mx-2">
                                        <img class="object-cover w-8 h-8 rounded-full"
                                            src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                            alt="">
                                    </div>
                                    <div class="flex-1 ml-2">
                                        <h1 class="font-bold">Jeff Maccoy</h1>
                                        <span>Online</span>
                                    </div>
                                    <div class="mr-4 font-bold">
                                        <span>12:00</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Log history --}}
        <section class="mt-6">
            <h1 class="p-4 font-bold">{{ __('Activity History') }}</h1>
            <ol class="relative border-l border-gray-200 dark:border-gray-700">
                <li class="mb-10 ml-6">
                    <span
                        class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <img class="rounded-full shadow-lg"
                            src="https://cdn-icons-png.flaticon.com/512/147/147144.png" alt="Bonnie image" />
                    </span>
                    <div
                        class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">
                        <time class="mb-1 text-xs font-normal sm:order-last sm:mb-0 text-blue-500">just now</time>
                        <div class="text-sm font-normal text-gray-500 dark:text-gray-300">
                            you have just logged In
                        </div>
                    </div>
                </li>
                <li class="mb-10 ml-6">
                    <span
                        class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <img class="rounded-full shadow-lg"
                            src="https://cdn-icons-png.flaticon.com/512/147/147144.png" alt="Thomas Lean image" />
                    </span>
                    <div
                        class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                        <div class="items-center justify-between mb-3 sm:flex">
                            <time class="mb-1 text-xs font-normal text-blue-500 sm:order-last sm:mb-0">2 hours
                                ago</time>
                            <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">You have taken an
                                appointment with Dr <a href="#"
                                    class="font-semibold text-gray-900 dark:text-white hover:underline">Ahmed</a> on
                                saturday</div>
                        </div>

                    </div>
                </li>
            </ol>
        </section>

        </x-slot>
</x-dashboard>
