<x-registerForm  action="{{route('patient.store')}}">
    <!-- insurance number -->
    <div class="mt-1">
        <x-input-label for="insurance number" :value="__('insurance number')" />
        <x-text-input id="insurance number" class="block mt-1 w-full" type="text" name="insurance_number" :value="old('insurance number')" required autofocus autocomplete="insurance number" />
        <x-input-error :messages="$errors->get('insurance number')" class="mt-2" />
    </div>
</x-registerForm>