<x-registerForm action="{{route('doctors.store')}}">
    <!-- address -->
    <div class="mt-1">
        <x-input-label for="address" :value="__('Address')" />
        <textarea id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address"></textarea>
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
        <span class="text-xs">{{__('You can add google map link for your location')}}</span>
    </div>
    <!-- Speciality -->
    <div class="mt-1">
        <x-input-label for="speciality" :value="__('speciality')" />
        <select class="border-gray-300 bg-white rounded" name="speciality"  :value="old('speciality')" required autofocus autocomplete="speciality">
            @foreach (config('medical_specialities') as $speciality)
                    <option value="{{$speciality}}">{{$speciality}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('speciality')" class="mt-2" />
    </div>
</x-registerForm>