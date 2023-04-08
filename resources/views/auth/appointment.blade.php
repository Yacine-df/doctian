<x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="mt-6" x-data="{open : false , shutdown : false}">
               <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <div class="flex items-center justify-between">
                        <h1 class="font-bold p-4">My Appointments</h1>
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mr-2">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" 
                                style="transition-duration: 500ms"
                                x-show="true"
                                x-transition
                                transition-duration.100ms;
                                @click="$el.classList.add('w-80');
                                 $el.classList.remove('w-56');" 
                                @click.away="$el.classList.add('w-56');
                                $el.classList.remove('w-80');" 
                                id="table-search-users" 
                                class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-56 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('Search')}}">
                        </div>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <div class="flex items-center gap-x-3">
                                        <span>{{__('Number')}}</span>
                                    </div>
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    {{__('Date')}}
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    {{__('Status')}}
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    {{__('Doctor')}}
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Purchase
                                </th>

                                <th scope="col" class="relative py-3.5 px-4">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            <tr>
                                <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                    <div class="inline-flex items-center gap-x-3">
                                        <span>#3066</span>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">Jan 6, 2022</td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                        <h2 class="text-sm font-normal">Paid</h2>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                    <div class="flex items-center gap-x-2">
                                        <img class="object-cover w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="">
                                        <div>
                                            <h2 class="text-sm font-medium text-gray-800 dark:text-white ">Arthur Melo</h2>
                                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400">authurmelo@example.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">Monthly subscription</td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center gap-x-6">
                                        <button x-on:click="open = ! open" class="text-gray-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none">
                                            {{__('Show')}}
                                        </button>

                                        <button x-on:click="shutdown = ! shutdown" class="text-red-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none">
                                            {{__('Delete')}}
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                    <div class="inline-flex items-center gap-x-3">
                                       

                                        <span>#3066</span>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">Jan 6, 2022</td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                        <h2 class="text-sm font-normal">Paid</h2>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                    <div class="flex items-center gap-x-2">
                                        <img class="object-cover w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="">
                                        <div>
                                            <h2 class="text-sm font-medium text-gray-800 dark:text-white ">Arthur Melo</h2>
                                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400">authurmelo@example.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">Monthly subscription</td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center gap-x-6">
                                        <button x-on:click="open = ! open" class="text-gray-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none">
                                            {{__('Show')}}
                                        </button>

                                        <button class="text-red-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none">
                                            {{__('Delete')}}
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
               </div>
               <!--show Main modal -->
                <div
                  x-cloak
                  x-show="open"
                  @click="open = false" 
                  x-transition
                   class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden bg-gray-100/70 overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                    <div class="relative w-full h-full md:h-auto grid place-items-center">
                        <!-- Modal content -->
                        <div @click.stop class="relative  bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Appointment Detail
                                </h3>
                                <button @click="open = false" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 grid grid-cols-2 gap-6">
                                <div class="flex items-center justify-center">
                                    <h1 class="font-bold">{{__('Number')}} : </h1>
                                    <span>#22</span>
                                </div>
                                <div class="flex items-center justify-center ">
                                    <h1 class="font-bold">{{__('Date')}} : </h1>
                                    <span>Jan 6, 2022</span>
                                </div>
                                <div class="flex items-center justify-center">
                                    <h1 class="font-bold">{{__('Doctor')}} : </h1>
                                    <span>Arthur Melo</span>
                                </div>
                                <div class="flex items-center justify-center">
                                    <h1 class="font-bold">{{__('Phone Number')}} : </h1>
                                    <span>079696865</span>
                                </div>
                                <div class="flex items-center justify-center">
                                    <h1 class="font-bold">{{__('wilaya')}} : </h1>
                                    <span>Sétif</span>
                                </div>
                                <div class="flex items-center justify-center">
                                    <h1 class="font-bold">{{__('Doctor')}} : </h1>
                                    <span>Arthur Melo</span>
                                </div>
                                <div class="flex items-center justify-center">
                                    <h1 class="font-bold">{{__('speciality')}} : </h1>
                                    <span>generalist</span>
                                </div>
                                <div class="flex items-center justify-center">
                                    <h1 class="font-bold">{{__('Doctor')}} : </h1>
                                    <span>Arthur Melo</span>
                                </div>
                                <div class="flex items-center justify-center">
                                    <h1 class="font-bold">{{__('Speciality')}} : </h1>
                                    <span>generalist</span>
                                </div>
                                <div class="flex items-center justify-center">
                                    <h1 class="font-bold">{{__('Speciality')}} : </h1>
                                    <span>generalist</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- show alert modal --}}
               <x-alert-button></x-alert-button>
            </section>
        </div>
</x-app-layout>