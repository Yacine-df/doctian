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
                    <h1 class="font-bold mt-2">{{auth()->user()->name ." ". auth()->user()->famillyName }}</h1>
                    <span class="text-gray-500">{{auth()->user()->userable->insurance_number}}</span>
                    <span class="text-gray-500 text-sm">{{auth()->user()->email}}</span>
                    <span class="text-gray-500 text-sm">{{auth()->user()->wilaya}}</span>
                </div>
                <div class="bg-white col-span-10 md:col-span-7 rounded flex items-center">
                    <form action="{{route('medicalProfile.update')}}" class="grid w-full grid-cols-12 gap-4 p-4" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-span-4">
                            <x-input-label for="gender" :value="__('Gender')" />
                            <select value="{{auth()->user()->userable->medicalRecord->gender ?? 'choose'}}" name="gender" id="" class="w-full rounded mt-1 border-none bg-slate-100">
                                <option value="man">{{ __('Man') }}</option>
                                <option value="woman">{{ __('Woman') }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>
                        <div class="col-span-4">
                            <x-input-label for="Birthday" :value="__('Birthday')" />
                            <x-text-input id="birthday" class="block mt-1 w-full border-none bg-slate-100"
                                type="date" name="date_of_birth" :value="auth()->user()->userable->date_of_birth ?? old('date_of_birth')" required autofocus
                                autocomplete="birthday" />
                            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                        </div>
                        <div class="col-span-4">
                            <x-input-label for="phone" :value="__('Phone Number')" />
                            <x-text-input id="phone" class="block mt-1 w-full border-none bg-slate-100"
                                type="text" name="phone" :value="auth()->user()->phone" required autofocus
                                autocomplete="phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        <div class="col-span-4">
                            <x-input-label for="height" :value="__('height')" />
                            <x-text-input min="1.00" id="height"
                                class="block mt-1 w-full border-none bg-slate-100 relative" type="number" name="height"
                                :value="auth()->user()->userable->medical_record->height ?? old('height')" required autofocus autocomplete="height" />
                            <x-input-error :messages="$errors->get('height')" class="mt-2" />
                        </div>
                        <div class="col-span-4">
                            <x-input-label for="weight" :value="__('weight')" />
                            <x-text-input min="20.00" id="weight"
                                class="block mt-1 w-full border-none bg-slate-100" type="number" name="weight"
                                :value="auth()->user()->userable->medical_record->weight ?? old('weight')" required autofocus autocomplete="weight" />
                            <x-input-error :messages="$errors->get('weight')" class="mt-2" />
                        </div>
                        <div class="col-span-4">
                            <x-input-label for="gender" :value="__('Pharmacy')" />
                            <select name="pharmacy" id="" class="w-full rounded mt-1 border-none bg-slate-100">
                                <option value="">choose your pharmacy</option>
                                <option value="man">{{ __('benmalek') }}</option>
                                <option value="woman">{{ __('ouchen') }}</option>
                            </select>
                        </div>
                        <div class="col-span-12 flex items-end justify-center">
                            <button class="rounded  w-full bg-blue-500 text-white px-4 py-2"
                                type="submit">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </section>
            <aside class="col-span-12 md:col-span-4 bg-white rounded shadow-md p-4">
                <h1 class="font-bold">
                    {{ __('Notes') }}
                </h1>
                <div class="md:h-52 overflow-y-auto">
                    <div class="mt-2">
                        <p class="bg-gray-100 rounded-md p-4">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores eius officiis cum
                            quibusdam odio,
                            illo incidunt minus? Excepturi saepe nostrum doloremque illum
                        </p>
                        <div class="flex items-center justify-between p-2">
                            <span class="text-gray-300 text-sm">Dr Chemali</span>
                            <span class="text-gray-300 text-sm">19 Nov 2022</span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="bg-gray-100 rounded-md p-4">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores eius officiis cum
                            quibusdam odio,
                            illo incidunt minus? Excepturi saepe nostrum doloremque illum
                        </p>
                        <div class="flex items-center justify-between p-2">
                            <span class="text-gray-400 text-sm">Dr Chemali </span>
                            <span class="text-gray-400 text-sm">19 Nov 2022</span>
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
                                    2023
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
                                    2023
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
                    <li class="my-2 w-full rounded shadow py-3 px-2">prescription 05-06-2023</li>
                    <li class="my-2 w-full rounded shadow py-3 px-2">analysis 05-06-2023</li>
                    <li class="my-2 w-full rounded shadow py-3 px-2">prescription 01-06-2023</li>
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>
