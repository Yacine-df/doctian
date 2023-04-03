<x-guest-layout>

    <div class="grid place-items-center">
        <img class="absolute w-24 left-10 bottom-10 " src="{{asset('images/medicine.png')}}" alt="">
        <img class="absolute w-24 right-10 bottom-10 " src="https://cdn3d.iconscout.com/3d/premium/thumb/biology-7162294-5818793.png?f=webp" alt="">
        <div class="font-bold text-2xl">
            <h1>Find and consult your doctor online </h1>
        </div>
        <div class="mt-6">
           <x-doctor-search></x-doctor-search>
        </div>
    </div>
</x-guest-layout>
