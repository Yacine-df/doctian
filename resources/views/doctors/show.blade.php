<x-guest-layout>
    <section class="grid md:grid-cols-12 gap-2 mt-4">
        <aside class="col-span-12 md:col-span-4 rounded first-line:flex flex-col items-center justify-center">
            <div class="bg-white w-full py-6 px-2 flex flex-col items-center justify-center rounded shadow">
                <img class="object-cover w-24 h-24 rounded-full my-2"
                    src="https://img.freepik.com/free-photo/attractive-young-male-nutriologist-lab-coat-smiling-against-white-background_662251-2960.jpg?w=2000"
                    alt="">
                <div class="flex flex-col items-start justify-center mx-4 pl-2">
                    <a href="#">
                        <h1 class="font-bold">Dr, Mohammed Mansouri</h1>
                    </a>
                    <span class="mt-1">Cardiologue</span>
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
                        <span class="font-bold">doc@gmail.com</span>
                    </div>
                    <div class="flex mt-2 items-center">
                        <i class="fa-solid fa-phone w-4 h-4 mr-2 text-blue-500"></i>
                        <span class="font-bold">0694345839</span>
                    </div>
                    <div class="flex mt-2 items-center">
                        <i class="fa-solid fa-location-dot w-4 h-4 mr-2 text-red-500"></i>
                        <span class="font-bold">Bordj bou arreridj, BBA</span>
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
            <div x-data="{ date: '', time: '' }"
                class="col-span-12 md:col-span-8 text-white bg-blue-900 p-2 rounded shadow h-full flex flex-col items-center ">
                <h1 class="font-bold text-2xl text-center mt-2">
                    {{ __('Take an Appointment') }}
                </h1>
                <span class="my-4 pt-4">
                    {{ __('Choose day and date for your appointment') }}
                </span>
                <div class="flex items-center justify-center text-black">
                    <input type="date" class="rounded w-1/2 mr-2" x-model="date">
                    <select class="rounded w-1/2 mr-2" name="hour" id="" x-model="time">
                        <option value="">Select a hour</option>
                        @for ($i = 8; $i <= 20; $i++)
                            <option value="{{ $i }}">{{ $i . ':00' }}</option>
                        @endfor
                    </select>
                </div>
                <div class="mt-6" x-show="date || time ? true : false">
                    You have chosen appointment in <span x-text="date"></span> at <span x-text="time + ':00'">9:00
                    </span>
                    <br>
                    Your appointment will be confirmed by the doctor
                </div>
                <div x-show="date || time ? true : false">
                    <button class="bg-white text-black mt-4 rounded py-2 px-6 font-bold"
                        @click="alert(date + '/' + time)">Send Demand</button>
                </div>
            </div>
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
                        <img src="https://i.pravatar.cc/60?u=12" alt="" width="60" height="60" class="rounded-xl">
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
                        <img src="https://i.pravatar.cc/60?u=12" alt="" width="60" height="60" class="rounded-xl">
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

    </section>
</x-guest-layout>
