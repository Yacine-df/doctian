<x-guest-layout>
    <div class="mt-4 w-full text-center text-2xl">
        <h1 class="font-bold">Search Result</h1>
    </div>
    <section class="container grid md:grid-cols-2 gap-4 mt-6 p-4 rounded ">
        @foreach ($doctors as $doctor)
            <div
                class="bg-white px-4 py-2 flex flex-col lg:flex-row items-center shadow justify-between transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <img class="object-cover w-24 h-24 rounded-full my-2"
                    src="https://img.freepik.com/free-photo/attractive-young-male-nutriologist-lab-coat-smiling-against-white-background_662251-2960.jpg?w=2000"
                    alt="">
                <div class="flex flex-col items-start justify-center mx-4 pl-2">
                    <a href="{{route('doctors.show',$doctor->id)}}">
                        <h1 class="font-bold">Dr,{{ $doctor->user->name ." ".$doctor->user->famillyName}}</h1>
                    </a>
                    <span class="mt-1 bg-blue-200 text-sm py-1 px-2 rounded-full text-blue-800 mb-1">{{$doctor->speciality}}</span>
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
                <div class="hidden lg:block h-full bg-gray-300" style="width: 1px"></div>
                <div class="ml-2">
                    <div class="flex mt-2 items-center">
                        <i class="fa-solid fa-envelope w-4 h-4 mr-2 text-yellow-500"></i>
                        <span class="font-bold">{{$doctor->user->email}}</span>
                    </div>
                    <div class="flex mt-2 items-center">
                        <i class="fa-solid fa-phone w-4 h-4 mr-2 text-blue-500"></i>
                        <span class="font-bold">{{$doctor->user->phone}}</span>
                    </div>
                    <div class="flex mt-2 items-center">
                        <i class="fa-solid fa-location-dot w-4 h-4 mr-2 text-red-500"></i>
                        <span class="font-bold">{{$doctor->user->wilaya}}, {{$doctor->user->wilaya}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
</x-guest-layout>
