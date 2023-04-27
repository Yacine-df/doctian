<div class="bg-white rounded-md p-4 mt-2  h-64 overflow-y-auto">
    <ul>
        @if (count($appointments))
            @foreach ($appointments as $appointment)
                @if ($appointment->appointment_status == 'not confirmed')
                    <li class="flex items-center justify-between py-2 px-1 mb-2 rounded-md hover:bg-blue-100 transii">
                        <div class="mx-2">
                            <img class="object-cover w-8 h-8 rounded-full"
                                src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                alt="">
                        </div>
                        <div class="flex-1 ml-2">
                            <div class="flex flex-col mb-1">
                                <h1 class="font-bold">{{ $appointment->patient->user->name }}
                                    {{ $appointment->patient->user->famillyName }}</h1>
                                <div class="flex items-center justify-arround">
                                    <span class="mr-2 text-xs">{{ __('Appointment type') }} :</span>
                                    <span class="block text-xs text-green-500 font-bold">
                                        {{ $appointment->appointment_type }}</span>
                                </div>
                                <div class="flex">
                                    <span class="mr-2 text-xs">{{ __('Appointment status') }} :</span>
                                    <span class="block text-xs text-green-500 font-bold">
                                        {{ $appointment->appointment_status }}</span>
                                </div>
                            </div>
                            <span
                                class="bg-red-200 text-red-600 rounded-full px-2 py-1">{{ $appointment->appointment_date }}</span>
                            <span
                                class="bg-red-200 text-red-600 rounded-full px-2 py-1">{{ $appointment->appointment_time . ':00' }}</span>
                        </div>
                        <div class="mr-4 font-bold">
                            <button wire:click="accept({{ $appointment->id }})" class="mx-1 cursor-pointer">
                                <i class="fa-regular fa-circle-check text-blue-500 text-xl"></i>
                            </button>
                            <button wire:click="delete({{ $appointment->id }})" class="mx-1 cursor-pointer">
                                <i class="fa-regular fa-circle-xmark text-red-500 text-xl"></i>
                            </button>
                        </div>
                    </li>
                
                @endif
            @endforeach
        @else
            <li class="p-2 font-bold text-center text-gray-600">
                There is no request at the moment
            </li>
        @endif
    </ul>
</div>
