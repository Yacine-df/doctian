@php
    $wilayas = array();
    if (is_array($wilayas)) {
            foreach (config('algerien_cities') as $key => $values) {
            $wilayas[$values['wilaya_code']] = $values['wilaya_name_ascii'];
        }
    }
    $wilayas = array_unique($wilayas);
@endphp
<form class="flex flex-col md:flex-row items-center justify-center" method="GET" action="/doctors">
    <!-- doctor name -->
    <x-text-input id="doctor" class="rounded-full border mx-2 w-64 my-1 md:my-0 border-gray-200 hover:border-blue-600 border-2 transition-all ease-in-out duration-75"
    type="text"
    name="doctor"
    :value="request('doctor')"
    placeholder="{{__('Doctor')}}"
    />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />

    <select name="speciality" class="rounded-full border mx-2 w-64 my-1 md:my-0 border-gray-200 hover:border-blue-600 border-2 transition-all ease-in-out duration-75">
            <option value="">{{__('Choose Speciality')}}</option> 
        @foreach (config('medical_specialities') as $key => $speciality)
             <option value="{{$speciality}}">{{$speciality}}</option>
         @endforeach
    </select>

    <select name="wilaya" class="rounded-full border mx-2 w-64 my-1 md:my-0 border-gray-200 hover:border-blue-600 border-2 transition-all ease-in-out duration-75">
            <option value="">Choose your wilaya</option> 
        @foreach ($wilayas as $key => $wilaya)
             <option value="{{$wilaya}}">{{$wilaya}}</option>
         @endforeach
    </select>
     <button class="rounded-full bg-blue-500 text-white my-1 md:my-0 px-12 w-64 py-2 mx-2 shadow-lg shadow-blue-500/50">
         {{__('Search')}}
     </button>
</form> 