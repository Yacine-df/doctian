<x-guest-layout>
    <section x-data="appointmentApp()" class="grid md:grid-cols-12 gap-2 mt-4">
        <aside class="col-span-12 md:col-span-4 rounded first-line:flex flex-col items-center justify-center">
            <div class="bg-white w-full py-6 px-2 flex flex-col items-center justify-center rounded shadow">
                <img class="object-cover w-24 h-24 rounded-full my-2"
                    src="https://img.freepik.com/free-photo/attractive-young-male-nutriologist-lab-coat-smiling-against-white-background_662251-2960.jpg?w=2000"
                    alt="">
                <div class="flex flex-col items-start justify-center mx-4 pl-2">
                    <h1 class="font-bold">Dr,{{ $doctor->user->name . ' ' . $doctor->user->famillyName }}</h1>
                    <a href="/doctors?speciality={{ $doctor->speciality }}"
                        class="mt-1 bg-blue-200 text-sm py-1 px-2 rounded-full text-blue-800 mb-1">
                        {{ $doctor->speciality }}
                    </a>
                    <span>Téléconsultation / a domicile</span>
                    {{-- <div x-data="{rateValue : 0}">
                <input type="text" hidden x-bind:value="rateValue">
                <i class="fa-solid text-gray-200 fa-star hover:text-yellow-400 object-fill" @click="rateValue = 1"></i>
                <i class="fa-solid text-gray-200 fa-star hover:text-yellow-400 object-fill" @click="rateValue = 2"></i>
                <i class="fa-solid text-gray-200 fa-star hover:text-yellow-400 object-fill" @click="rateValue = 3"></i>
                <i class="fa-solid text-gray-200 fa-star hover:text-yellow-400 object-fill" @click="rateValue = 4"></i>
                <i class="fa-solid text-gray-200 fa-star hover:text-yellow-400 object-fill" @click="rateValue = 5"></i>
            </div> --}}
                </div>
                <div class="ml-2">
                    <div class="flex mt-2 items-center">
                        <i class="fa-solid fa-envelope w-4 h-4 mr-2 text-yellow-500"></i>
                        <span class="font-bold">{{ $doctor->user->email }}</span>
                    </div>
                    <div class="flex mt-2 items-center">
                        <i class="fa-solid fa-phone w-4 h-4 mr-2 text-blue-500"></i>
                        <span class="font-bold">{{ $doctor->user->phone }}</span>
                    </div>
                    <div class="flex mt-2 items-center">
                        <i class="fa-solid fa-location-dot w-4 h-4 mr-2 text-red-500"></i>
                        <span class="font-bold">{{ $doctor->user->wilaya }} , {{ $doctor->user->commune }}</span>
                    </div>
                </div>
                <div>
                    <button class="bg-red-500 text-white px-4 py-2 rounded mt-2">
                        <a href="#">Video chat</a>
                    </button>
                </div>
            </div>
        </aside>
        <div class="col-span-12 md:col-span-8">
            @if (auth()->user())
                @auth
                    <div
                        class="col-span-12 md:col-span-8 text-white bg-blue-900 p-2 rounded shadow h-full flex flex-col items-center ">
                        <h1 class="font-bold text-2xl text-center mt-2">
                            {{ __('Take an Appointment') }}
                        </h1>
                        <span class="my-4 pt-4">
                            {{ __('Choose day and date for your appointment') }}
                        </span>
                        <form action="">
                            <div class="flex items-center justify-center text-black">
                                <input name="appointment_date" type="date" class="rounded mr-2" x-model="appointment.appointment_date"
                                    min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                <select class="rounded mr-2" name="appointment_time" x-model="appointment.appointment_time">
                                    <option value="">Select a hour</option>
                                    @for ($i = 8; $i <= 20; $i++)
                                        <option value="{{ $i }}">{{ $i . ':00' }}</option>
                                    @endfor
                                </select>
                                <select name="appointment_type" class="rounded" x-model="appointment.appointment_type">
                                    <option value="">Select consultation Type</option>
                                    <option value="online">{{ __('Teleconsultation') }}</option>
                                    <option value="home">{{ __('At Home') }}</option>
                                    <option value="clinic">{{ __('At Clinic') }}</option>
                                </select>
                            </div>

                            <div x-show="appointment.appointment_date == '' || appointment.appointment_time == ''  || appointment.appointment_type == '' ? false : true"
                                x-cloak class="flex items-center mt-6 justify-around">
                                <x-primary-button class="text-black mt-4 rounded py-2 px-6 font-bold"
                                    @click.prevent="submit">
                                    Send Demand
                                </x-primary-button>
                                <x-primary-button @click.prevent="open = true"
                                    class=" text-black mt-4 rounded py-2 px-6 font-bold">
                                    Show Appointment Details
                                </x-primary-button>
                            </div>
                        </form>

                        <div class="mt-6"
                            x-show="appointment.appointment_date == '' || appointment.appointment_time == ''  || appointment.appointment_type == '' ? false : true"
                            x-cloak>
                            Your appointment will be confirmed by the doctor
                        </div>
                        <div class="">

                        </div>
                    </div>
                @endauth
            @endif
            @guest
                <div
                    class="grif place-content-center col-span-12 md:col-span-8 text-white bg-blue-900 p-2 rounded shadow h-full flex flex-col items-center">
                    <h1 class="font-bold text-2xl text-center mt-2">
                        {{ __('If you want to be able to take an appointment you should') }}
                        <a href="/login" class="text-blue-500">{{ __('Login') }}</a>
                        {{ __('Or') }}
                        <a href="/register" class="text-blue-500">{{ __('Register') }}</a>
                    </h1>
                </div>
            @endguest
        </div>
        <aside class="col-span-12 md:col-span-4">
            <div class="rounded mt-4 bg-white py-6 px-2 shadow">
                <h1 class="font-bold text-center ">
                    {{ __('Working Hours') }}
                </h1>
                <p class="py-2 px-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque alias adipisci laudantium aper
                    iam voluptatibus libero incidunt nulla doloremque, repellendus minima?
                </p>
            </div>
            {{-- comments --}}
            <div class="col-span-4 border bg-white border-gray-200 p-6 rounded-xl mt-2">
                <article class="flex space-x-4">
                    <div class="flex-shrink-0">
                        <img src="https://i.pravatar.cc/60?u=12" alt="" width="60" height="60"
                            class="rounded-xl">
                    </div>

                    <div>
                        <header class="mb-4">
                            <h3 class="font-bold">Yacine</h3>

                            <p class="text-xs">
                                Posted
                                <time>12/&é/&é</time>
                            </p>
                        </header>

                        <p>
                            Good doctor
                        </p>
                    </div>
                </article>
            </div>
            <div class="col-span-4 border bg-white border-gray-200 p-6 rounded-xl mt-2">
                <article class="flex space-x-4">
                    <div class="flex-shrink-0">
                        <img src="https://i.pravatar.cc/60?u=1" alt="" width="60" height="60"
                            class="rounded-xl">
                    </div>

                    <div>
                        <header class="mb-4">
                            <h3 class="font-bold">Yacine</h3>

                            <p class="text-xs">
                                Posted
                                <time>12/&é/&é</time>
                            </p>
                        </header>

                        <p>
                            Good doctor
                        </p>
                    </div>
                </article>
            </div>
            {{-- form --}}
            <div class="col-span-4 border bg-white border-gray-200 p-6 rounded-xl mt-2">
                <form method="POST" action="/doctors/comments">
                    @csrf

                    <header class="flex items-center">
                        <img src="https://i.pravatar.cc/60?u=2" alt="" width="40" height="40"
                            class="rounded-full">

                        <h2 class="ml-4">Want to participate?</h2>
                    </header>

                    <div class="mt-6">
                        <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                            placeholder="Quick, thing of something to say!" required></textarea>

                        @error('body')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                        <button
                            class="rounded-full bg-blue-500 text-white my-1 md:my-0 px-12 py-2 mx-2 shadow-lg shadow-blue-500/50">Submit</button>
                    </div>
                </form>
            </div>
        </aside>
        <div class="col-span-12 md:col-span-8">
            <iframe class="w-full"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51600.90532356116!2d4.7674095!3d36.06772395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128c913befaefcf7%3A0x2bf41af2fb4d69b3!2sBordj%20Bou%20Arreridj!5e0!3m2!1sfr!2sdz!4v1680888788712!5m2!1sfr!2sdz"
                height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        {{-- info pop up afterappointment has been set --}}
        <x-info-button>
            Appointment Set successfully,
            <br> Your appointment will be confirmed by the doctor<br>
            You Can visit your appointment schedule

        </x-info-button>
        <!--show  Appointment Detail -->
        <div x-show="open" x-cloak @click="open = false" x-transition
            class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden bg-gray-100/70 overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full md:h-auto grid place-items-center">
                <!-- Modal content -->
                <div @click.stop class="relative  bg-white rounded-lg shadow dark:bg-gray-700 w-full md:w-3/4">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Appointments Detail
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
                    <div class="p-4 mt-2 grid grid-cols-10 gap-2">
                        {{-- doctor Detail --}}
                        <div
                            class="col-span-4 bg-white w-full py-6 px-2 flex flex-col items-center justify-center rounded shadow">
                            <img class="object-cover w-24 h-24 rounded-full my-2"
                                src="https://img.freepik.com/free-photo/attractive-young-male-nutriologist-lab-coat-smiling-against-white-background_662251-2960.jpg?w=2000"
                                alt="">
                            <div class="flex flex-col items-start justify-center mx-4 pl-2">
                                <h1 class="font-bold">{{$doctor->user->name}}, {{$doctor->user->famillyName}}</h1>
                                <a href="/doctors?speciality={{ $doctor->speciality }}"
                                    class="mt-1 bg-blue-200 text-sm py-1 px-2 rounded-full text-blue-800 mb-1"
                                   >{{ $doctor->speciality }}
                                </a>
                                <span>Téléconsultation / a domicile</span>
                            </div>
                            <div class="ml-2">
                                <div class="flex mt-2 items-center">
                                    <i class="fa-solid fa-envelope w-4 h-4 mr-2 text-yellow-500"></i>
                                    <span class="font-bold">{{ $doctor->user->email }}</span>
                                </div>
                                <div class="flex mt-2 items-center">
                                    <i class="fa-solid fa-phone w-4 h-4 mr-2 text-blue-500"></i>
                                    <span class="font-bold">{{ $doctor->user->phone}}</span>
                                </div>
                                <div class="flex mt-2 items-center">
                                    <i class="fa-solid fa-location-dot w-4 h-4 mr-2 text-red-500"></i>
                                    <span class="font-bold">
                                        {{ $doctor->user->wilaya }} , {{ $doctor->user->commune }}
                                    </span>
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
                                            x-text="appointment.date"></span>
                                    </div>
                                    <div class="w-full flex items-center justify-between mt-2">
                                        <div class="flex items-center">
                                            <h1 class="mr-2 font-bold">{{ __('From') }}:</h1>
                                            <span class="font-bold bg-gray-300 rounded-full px-4 py-1"
                                                x-text="appointment.time +':00'"></span>
                                        </div>
                                        <div class="flex items-center">
                                            <h1 class="mr-2 font-bold">{{ __('To') }}:</h1>
                                            <span class="font-bold bg-gray-300 rounded-full px-4 py-1"
                                                x-text="parseInt(appointment.time)+1 +':00'"></span>
                                        </div>
                                        <div class="flex items-center">
                                            <h1 class="mr-2 font-bold">{{ __('Consultation type') }}:</h1>
                                            <span class="font-bold bg-gray-300 rounded-full px-4 py-1"
                                                x-text="appointment.type"></span>
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
                                                <span>{{ auth()->user()->famillyName ?? ''  }}</span>
                                            </div>
                                        </div>
                                        <div class="w-full flex items-center justify-between mt-2">
                                            <div class="flex">
                                                <h1 class="mr-2 font-bold">{{ __('Phone Number') }}:</h1>
                                                <span>{{ auth()->user()->phone ?? '' }}</span>
                                            </div>
                                            <div class="flex">
                                                <h1 class="mr-2 font-bold">{{ __('Age') }}:</h1>
                                                <span>{{auth()->user()->age ?? '22' }} ans</span>
                                            </div>
                                        </div>
                                        <div class="w-full flex items-center justify-between mt-2">
                                            <div class="flex">
                                                <h1 class="mr-2 font-bold">{{ __('insurance number') }}:</h1>
                                                <span>{{auth()->user()->userable->insurance_number ?? '' }}</span>
                                            </div>
                                            <div class="flex">
                                                <h1 class="mr-2 font-bold">{{ __('State') }}:</h1>
                                                <span>{{ auth()->user()->wilaya ?? '' }}</span>
                                            </div>
                                        </div>
                                        <div class="w-full  mt-2">
                                            <div class="flex text-sm">
                                                <h1 class="mr-2 font-bold">{{ __('Created at') }}:</h1>
                                                <span x-text="appointment.createdAt"></span>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        </section>
                    </div>
    </section>
    <script>
        let appointmentApp = () => {
            return {
                open: false,
                shutdown : false,
                appointment: {
                    _token: '{{ csrf_token() }}',
                    appointment_date: '',
                    appointment_time: '',
                    appointment_type: '',
                    createdAt: '{{ \Carbon\Carbon::now() }}',
                    doctor_id: '{{ $doctor->id }}',
                    patient_id: '{{ auth()->user()->userable_id ?? '' }}',
                },
                submit() {
                    try {
                        fetch('{{route('appointments.store')}}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(this.appointment)
                        })
                        .then(this.shutdown = true)
                        .then(this.appointment.appointment_date,this.appointment.appointment_time,this.appointment.appointment_type = '')
                    } catch (error) {
                        console.log('There was an error', error);
                    }
                }

            }
        }
    </script>
</x-guest-layout>
