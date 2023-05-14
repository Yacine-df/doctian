<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <section class="mt-6" x-data="{ open: false, shutdown: false, selectedAppointment: null ,appointmentId:null }">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <div class="flex items-center justify-between">
                        <h1 class="font-bold p-4">My Appointments</h1>
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mr-2">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" style="transition-duration: 500ms" x-show="true" x-transition
                                transition-duration.100ms;
                                @click="$el.classList.add('w-80');
                                 $el.classList.remove('w-56');"
                                @click.away="$el.classList.add('w-56');
                                $el.classList.remove('w-80');"
                                id="table-search-users"
                                class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-56 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="{{ __('Search') }}">
                        </div>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <div class="flex items-center gap-x-3">
                                        <span>{{ __('Number') }}</span>
                                    </div>
                                </th>

                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    {{ __('Date') }}
                                </th>

                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    {{ __('Time') }}
                                </th>

                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    {{ __('Status') }}
                                </th>

                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    {{ __('Doctor') }}
                                </th>

                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    {{ __('type') }}
                                </th>

                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <span>Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @if (count($appointments))
                                @foreach ($appointments as $key => $appointment)
                                    <tr x-data="userInit({{ Js::from($appointment) }})">
                                        <td
                                            class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                            <div class="inline-flex items-center gap-x-3">
                                                <span>{{$key +1 }}</span>
                                            </div>
                                        </td>
                                        <td
                                            class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                            <span class="bg-gray-200 font-bold text-black rounded-full py-1 px-4"
                                                x-text="appointment.appointment_date"></span>
                                        </td>
                                        <td
                                            class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                            <span class="bg-gray-200 font-bold text-black rounded-full py-1 px-4"
                                                x-text="appointment.appointment_time + ':00'"></span>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <div
                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>

                                                <h2 class="text-sm font-normal" x-text="appointment.appointment_status">
                                                </h2>
                                            </div>
                                        </td>
                                        <td
                                            class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                            <div class="flex items-center gap-x-2">
                                                <img class="object-cover w-8 h-8 rounded-full"
                                                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                                    alt="">
                                                <div>
                                                    <h2 class="text-sm font-medium text-gray-800 dark:text-white "
                                                        x-text="'Dr,' + appointment.doctor.user.name"></h2>
                                                    <p class="text-xs font-normal text-gray-600 dark:text-gray-400"
                                                        x-text="appointment.doctor.speciality"></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"
                                            x-text="appointment.appointment_type">
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-6">
                                                <button x-on:click="open = ! open; selectedAppointment = appointment"
                                                    class="text-gray-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none">
                                                    {{ __('Show') }}
                                                </button>

                                                <button x-on:click="shutdown = ! shutdown; appointmentId = appointment.id;"
                                                    class="text-red-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none">
                                                    {{ __('Delete') }}
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center p-4 font-bold">
                                        {{__('there is no appointment')}}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!--show Main modal -->
            <div x-cloak x-show="open" @click="open = false" x-transition
                class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden bg-gray-100/70 overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative w-full h-full md:h-auto grid place-items-center">
                    <!-- Modal content -->
                    <div @click.stop class="relative  bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Appointment Detail
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
                        <template x-if="selectedAppointment">
                            <div class="p-4 mt-2 grid grid-cols-10 gap-2">
                                {{-- doctor Detail --}}
                                <div
                                    class="col-span-4 bg-white w-full py-6 px-2 flex flex-col items-center justify-center rounded shadow">
                                    <img class="object-cover w-24 h-24 rounded-full my-2"
                                        src="https://img.freepik.com/free-photo/attractive-young-male-nutriologist-lab-coat-smiling-against-white-background_662251-2960.jpg?w=2000"
                                        alt="">
                                    <div class="flex flex-col items-start justify-center mx-4 pl-2">
                                        <h1 class="font-bold" x-text="selectedAppointment.doctor.user.name"></h1>
                                        <a :href="'/doctors?speciality=' + selectedAppointment.doctor.speciality"
                                            class="mt-1 bg-blue-200 text-sm py-1 px-2 rounded-full text-blue-800 mb-1"
                                            x-text="selectedAppointment.doctor.speciality">
                                        </a>
                                        <span>Téléconsultation / a domicile</span>
                                    </div>
                                    <div class="ml-2">
                                        <div class="flex mt-2 items-center">
                                            <i class="fa-solid fa-envelope w-4 h-4 mr-2 text-yellow-500"></i>
                                            <span class="font-bold"
                                                x-text="selectedAppointment.doctor.user.email"></span>
                                        </div>
                                        <div class="flex mt-2 items-center">
                                            <i class="fa-solid fa-phone w-4 h-4 mr-2 text-blue-500"></i>
                                            <span class="font-bold"
                                                x-text="selectedAppointment.doctor.user.phone"></span>
                                        </div>
                                        <div class="flex mt-2 items-center">
                                            <i class="fa-solid fa-location-dot w-4 h-4 mr-2 text-red-500"></i>
                                            <span class="font-bold"
                                                x-text="selectedAppointment.doctor.user.wilaya"></span>
                                        </div>
                                    </div>
                                </div>
                                {{-- Appointment and personal infos --}}
                                <section class="col-span-6 flex flex-col shadow py-2 px-4">
                                    <div class="flex flex-col items-center justify-between">
                                        <div class="w-full flex flex-col items-center bg-gray-100 p-2 rounded-md">
                                            <div class="w-full flex items-center justify-between">
                                                <h1 class="font-bold text-2xl">{{ __('Date') }}: </h1>
                                                <span
                                                    class="font-bold text-black text-2xl bg-gray-300 rounded-full px-4 py-1bg-gray-300 "
                                                    x-text="selectedAppointment.appointment_date"></span>
                                            </div>
                                            <div class="w-full flex items-center justify-between mt-2">
                                                <div class="flex items-center mr-2">
                                                    <h1 class="mr-2 font-bold">{{ __('From') }}:</h1>
                                                    <span class="font-bold bg-gray-300 rounded-full px-4"
                                                        x-text="selectedAppointment.appointment_time +':00'"></span>
                                                </div>
                                                <div class="flex items-center ">
                                                    <div class="flex items-center mr-2">
                                                        <h1 class="mr-2 font-bold">{{ __('To') }}:</h1>
                                                        <span class="font-bold bg-gray-300 rounded-full px-4 "
                                                            x-text="parseInt(selectedAppointment.appointment_time)+1 +':00'"></span>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <h1 class="mr-2 font-bold">{{ __('Consultation type') }}:</h1>
                                                        <span class="font-bold bg-gray-300 rounded-full px-4"
                                                            x-text="selectedAppointment.appointment_type"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- personal infos --}}
                                        @auth
                                            <div class="w-full flex flex-col items-center p-2 rounded-md">
                                                <div class="w-full flex items-center justify-between mt-2">
                                                    <div class="flex">
                                                        <h1 class="mr-2 font-bold">{{ __('Name') }}:</h1>
                                                        <span>{{ auth()->user()->name ?? '' }}</span>
                                                    </div>
                                                    <div class="flex">
                                                        <h1 class="mr-2 font-bold">{{ __('famillyName') }}:</h1>
                                                        <span>{{ auth()->user()->famillyName ?? '' }}</span>
                                                    </div>
                                                </div>
                                                <div class="w-full flex items-center justify-between mt-2">
                                                    <div class="flex">
                                                        <h1 class="mr-2 font-bold">{{ __('Phone Number') }}:</h1>
                                                        <span>{{ auth()->user()->phone ?? '' }}</span>
                                                    </div>
                                                    <div class="flex">
                                                        <h1 class="mr-2 font-bold">{{ __('Age') }}:</h1>
                                                        <span>{{ auth()->user()->age ?? '22' }} ans</span>
                                                    </div>
                                                </div>
                                                <div class="w-full flex items-center justify-between mt-2">
                                                    <div class="flex">
                                                        <h1 class="mr-2 font-bold">{{ __('insurance number') }}:</h1>
                                                        <span>{{ auth()->user()->userable->insurance_number ?? '' }}</span>
                                                    </div>
                                                    <div class="flex">
                                                        <h1 class="mr-2 font-bold">{{ __('State') }}:</h1>
                                                        <span>{{ auth()->user()->wilaya ?? '' }}</span>
                                                    </div>
                                                </div>
                                                <div class="w-full  mt-2">
                                                    <div class="flex text-sm">
                                                        <h1 class="mr-2 font-bold">{{ __('Created at') }}:</h1>
                                                        <span x-text="selectedAppointment.created_at"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endauth
                                </section>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            {{-- show alert modal --}}
            <x-alert-button></x-alert-button>
        </section>
    </div>
    <script>
        function userInit(appointment) {
            return {
                appointment: appointment
            };
        }
    </script>
</x-app-layout>
