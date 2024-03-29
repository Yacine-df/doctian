<x-dashboard>
    <x-slot:content>
        <section class="mt-6">
            <div class="grid md:grid-cols-2 md:gap-2">
                <div class="bg-white p-4 rounded shadow  m-1 md:m-0 relative">
                    <h2 class="font-bold flex mb">
                        <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
                        </span>
                        Coming Appointment
                    </h2>
                    <p class="text-sm mt-2 pl-2">Today with Dr ahmed at 11:00 am</p>
                </div>
                <div class="bg-white p-4 rounded shadow  m-1 md:m-0 ">
                    <h2 class="font-bold">Last Appointment</h2>
                    <p class="text-sm mt-2 pl-2">Yesterday with Dr ahmed at 11:00 am</p>
                </div>
            </div>
        </section>
        <section class="mt-6">
            <h1 class="p-4 font-bold">{{__('Activity History')}}</h1>
            <ol class="relative border-l border-gray-200 dark:border-gray-700">                  
                @foreach ($activities as $log)
                    <li class="mb-10 ml-6">            
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <img class="rounded-full shadow-lg" src="https://cdn-icons-png.flaticon.com/512/147/147144.png" alt="Bonnie image"/>
                        </span>
                        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">
                            <time class="mb-1 text-xs font-normal sm:order-last sm:mb-0 text-blue-500">{{$log->created_at->diffForHumans()}}</time>
                            <div class="text-sm font-normal text-gray-500 dark:text-gray-300">
                                {{$log->activity}}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ol>
        </section>
    </x-slot>
</x-dashboard>