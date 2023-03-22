<x-guest-layout>
    <div class="max-w-6xl mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="text-center text-xl mb-1">
            <h1 class="font-bold center"
            >{{__('Select User Type')}}</h1>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            
            <x-user-type userType="Patient" userUrl="{{route('patient.register')}}"></x-user-type>
            <x-user-type userType="Doctor" userUrl="{{route('doctor.register')}}"></x-user-type>
            <x-user-type userType="Pharmacist" userUrl="{{route('pharmacy.register')}}"></x-user-type>
            <x-user-type userType="Laboratory" userUrl="{{route('laboratory.register')}}"></x-user-type>
        </div>
    </div>
</x-guest-layout>