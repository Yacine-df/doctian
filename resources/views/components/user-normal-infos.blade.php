@props(['action'])
<!-- Step 1 -->
<li class="form-stepper-active text-center form-stepper-list" step="1">
    <a class="mx-2">
        <span class="form-stepper-circle">
            <span>1</span>
        </span>
    </a>
</li>
<!-- Step 2 -->
<li class="form-stepper-unfinished text-center form-stepper-list" step="2">
    <a class="mx-2">
        <span class="form-stepper-circle text-muted">
            <span>2</span>
        </span>

    </a>
</li>
</ul>
<!-- Step Wise Form Content -->
<form enctype="multipart/form-data" method="POST" action="{{$action}}" class="bg-white">
    @csrf
    <!-- Step 1 Content -->
    <section id="step-1" class="form-step">
        <!-- Step 1 input fields -->
        <div class="mt-1">
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- Familly Name -->
            <div class="mt-2">
                <x-input-label for="famillyName" :value="__('famillyName')" />
                <x-text-input id="famillyName" class="block mt-1 w-full" type="text" name="famillyName" :value="old('famillyName')" required autofocus autocomplete="famillyName" />
                <x-input-error :messages="$errors->get('famillyName')" class="mt-2" />
            </div>
            <!-- Email Address -->
            <div class="mt-2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
                <div class="mt-2">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-2">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        </div>
        <div class="mt-3">
            <button class="button px-4 py-2 btn-navigate-form-step" type="button" step_number="2">{{__('Next')}}</button>
        </div>
    </section>