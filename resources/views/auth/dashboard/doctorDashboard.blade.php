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
                        <i class="fa-solid fa-magnifying-glass"></i>
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
    </x-slot>
</x-dashboard>