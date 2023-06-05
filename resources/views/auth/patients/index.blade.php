<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <section class="mt-6" x-data="{ shutdown: false }" x-cloak>
            <div class="grid md:grid-cols-3 gap-3">
                <div x-data="{ open: false }"  class="flex flex-col items-center pb-10 bg-white relative">
                    <img class="w-20 h-20 mt-4 rounded-full shadow-lg"
                        src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                        alt="Bonnie image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Yacine Diaf</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Patient</span>
                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Medical Record</a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Message</a>
                    </div>
                    <button @click="open = !open"
                        class="absolute origin-top-right right-0 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                        type="button">
                        <i class="fa-solid fa-ellipsis w-6 h-6 text-lg"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div x-show="open" @click.outside="open = false" x-transition
                        class="z-10 absolute origin-top-right right-0 mt-10 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li class="block cursor-pointer px-2 py-1 text-sm text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <a href="/d/dashboard/patients/a/precription">
                                    {{ __('Create Prescription') }}
                                </a>
                            </li>
                            <li @click.prevent="shutdown = true"
                                class="block cursor-pointer px-2 py-1 text-sm text-red-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                {{ __('Delete') }}
                            </li>
                    </div>
                </div>
                <div x-data="{ open: false }" class="flex flex-col items-center pb-10 bg-white relative">
                    <img class="w-20 h-20 mt-4 rounded-full shadow-lg"
                        src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                        alt="Bonnie image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Yacine Diaf</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Patient</span>
                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Medical Record</a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Message</a>
                    </div>
                    <button @click="open = !open"
                        class="absolute origin-top-right right-0 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                        type="button">
                        <i class="fa-solid fa-ellipsis w-6 h-6 text-lg"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div x-show="open" @click.outside="open = false" x-transition
                        class="z-10 absolute origin-top-right right-0 mt-10 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li class="block cursor-pointer px-2 py-1 text-sm text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <a href="/d/dashboard/patients/a/precription">
                                    {{ __('Create Prescription') }}
                                </a>
                            </li>
                            <li @click.prevent="shutdown = true"
                                class="block cursor-pointer px-2 py-1 text-sm text-red-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                {{ __('Delete') }}
                            </li>
                    </div>
                </div>
                <div x-data="{ open: false }" class="flex flex-col items-center pb-10 bg-white relative">
                    <img class="w-20 h-20 mt-4 rounded-full shadow-lg"
                        src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                        alt="Bonnie image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Yacine Diaf</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Patient</span>
                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Medical Record</a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Message</a>
                    </div>
                    <button @click="open = !open"
                        class="absolute origin-top-right right-0 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                        type="button">
                        <i class="fa-solid fa-ellipsis w-6 h-6 text-lg"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div x-show="open" @click.outside="open = false" x-transition
                        class="z-10 absolute origin-top-right right-0 mt-10 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li class="block cursor-pointer px-2 py-1 text-sm text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <a href="/d/dashboard/patients/a/precription">
                                    {{ __('Create Prescription') }}
                                </a>
                            </li>
                            <li @click.prevent="shutdown = true"
                                class="block cursor-pointer px-2 py-1 text-sm text-red-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                {{ __('Delete') }}
                            </li>
                    </div>
                </div>
            </div>
                {{-- show alert modal --}}
                <x-alert-button></x-alert-button>
        </section>
    </div>
</x-app-layout>
