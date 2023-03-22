<x-guest-layout>
    <div class="sm:max-w-md w-full sm:mt-10 md:mt-8 mx-auto px-6 py-4 bg-white shadow-md  sm:rounded-lg">
        <!-- Form Steps / Progress Bar -->
        <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
            <x-user-normal-infos></x-user-normal-infos>
            <!-- Step 2 Content, default hidden on page load. -->
            <section id="step-2" class="form-step d-none">
                <!-- Step 2 input fields -->
                <div class="mt-1">
                    <!-- Wilaya -->
                    <livewire:wilayas/>
                    <!-- phone -->
                    <div class="mt-1">
                        <x-input-label for="phone" :value="__('Phone Number')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                    {{$slot}}
                </div>
                <div class="mt-3">
                    <button class="button px-2 py-1 btn-navigate-form-step" type="button" step_number="1">{{__('Previous')}}</button>
                    <button class="button px-2 py-1 submit-btn" type="submit">{{__('Save')}}</button>
                </div>
            </section>
        </form>
    </div>
</x-guest-layout>
