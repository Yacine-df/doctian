<x-registerForm>
    <!-- address -->
    <div class="mt-1">
        <x-input-label for="address" :value="__('Address')" />
        <textarea id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address"></textarea>
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
        <span class="text-xs">{{__('You can add google map link for your location')}}</span>
    </div>
</x-registerForm>