<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MedicalProfile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-12 gap-6 bg-gray-100 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="col-span-12 md:col-span-8 gap-2 rounded shadow-md grid grid-cols-10 ">
                <div class="col-span-10 md:col-span-3 flex flex-col items-center justify-center bg-white rounded p-4">
                    <img class="rounded-full shadow-lg w-32" src="https://cdn-icons-png.flaticon.com/512/147/147144.png"
                        alt="Thomas Lean image" />
                    <h1 class="font-bold mt-2">Temothy Aegri</h1>
                    <span class="text-gray-500">75090988</span>
                    <span class="text-gray-500 text-sm">email@email.com</span>
                    <span class="text-gray-500 text-sm">Bordj Bou Arreridj</span>
                </div>
                <div class="bg-white col-span-10 md:col-span-7 rounded flex items-center">
                    
                    <div class="grid w-full grid-cols-12 gap-4 p-4" >
                        <div class="col-span-4 bg-blue-500 text-white p-2 rounded-md">
                            <h1 class="font-bold">{{__('Gender')}}</h1>
                            <div>
                                <span>Man</span>
                            </div>
                        </div>
                        <div class="col-span-4 bg-blue-500 text-white p-2 rounded-md">
                            <h1 class="font-bold">{{__('Birthday')}}</h1>
                            <div>
                                <span>15 February 2000</span>
                            </div>
                        </div>
                        <div class="col-span-4 bg-blue-500 text-white p-2 rounded-md">
                            <h1 class="font-bold">{{__('Phone Number')}}</h1>
                            <div>
                                <span>069735695</span>
                            </div>
                        </div>
                        <div class="col-span-4 bg-blue-500 text-white p-2 rounded-md">
                            <h1 class="font-bold">{{__('height')}}</h1>
                            <div>
                                <span>1.75 m</span>
                            </div>
                        </div>
                        <div class="col-span-4 bg-blue-500 text-white p-2 rounded-md">
                            <h1 class="font-bold">{{__('weight')}}</h1>
                            <div>
                                <span>70kg</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <aside class="col-span-12 md:col-span-4 bg-white rounded shadow-md p-4">
                <h1 class="font-bold">
                    {{ __('Notes') }}
                </h1>
                <div class="md:h-52 overflow-y-auto">
                    <div class="mt-2">
                        <p class="bg-blue-500 text-white rounded-md p-4">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores eius officiis cum
                            quibusdam odio,
                            illo incidunt minus? Excepturi saepe nostrum doloremque illum
                        </p>
                        <div class="flex items-center justify-between p-2">
                            <span class="text-gray-300 text-sm">Dr Chemali </span>
                            <span class="text-gray-300 text-sm">19 Nov 2022</span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="bg-blue-500 text-white rounded-md p-4">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores eius officiis cum
                            quibusdam odio,
                            illo incidunt minus? Excepturi saepe nostrum doloremque illum
                        </p>
                        <div class="flex items-center justify-between p-2">
                            <span class="text-gray-300 text-sm">Dr Chemali </span>
                            <span class="text-gray-300 text-sm">19 Nov 2022</span>
                        </div>
                    </div>
                </div>
            </aside>
            <section class="col-span-12 md:col-span-8 gap-2 rounded shadow-md bg-white p-4">
                <h1 class="font-bold">{{ __('Medical history') }}</h1>
                <div class="mt-4">
                    <ol class="relative ml border-l-2 border-gray-200 dark:border-gray-700 h-64 pr-2 overflow-y-auto">
                        <li class="mb-10 ml-6 bg-gray-100 p-4 rounded-md flex items-center justify-between">
                            <div
                                class="absolute w-10 h-3 bg-gray-100 rounded-full -left-1.5 dark:border-gray-900 dark:bg-gray-700">
                            </div>
                            <div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">February
                                    2022
                                </time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Visiting the doctor for consultation
                                </h3>
                            </div>
                            <span class="font-bold text-blue-500 hover:cursor-pointer">Note</span>
                        </li>
                        <li class="mb-10 ml-6 bg-gray-100 p-4 rounded-md flex items-center justify-between">
                            <div
                                class="absolute w-10 h-3 bg-gray-100 rounded-full -left-1.5 dark:border-gray-900 dark:bg-gray-700">
                            </div>
                            <div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">February
                                    2022
                                </time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Visiting the doctor for consultation
                                </h3>
                            </div>
                            <span class="font-bold text-blue-500 hover:cursor-pointer">Note</span>
                        </li>
                    </ol>
                </div>
            </section>
            <aside class="bg-white col-span-12 md:col-span-4 rounded shadow-md p-4">
                <h1 class="font-bold">{{ __('Files') ." / ".__('Documents') }}</h1>
                <ul class="mt-4 text-gray-600">
                    <li class="my-2 w-full rounded shadow py-3 px-2">first</li>
                    <li class="my-2 w-full rounded shadow py-3 px-2">second</li>
                    <li class="my-2 w-full rounded shadow py-3 px-2">third</li>
                    <li class="my-2 w-full rounded shadow py-3 px-2">fourth</li>
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>
