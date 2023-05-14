<x-navigation>
    <x-slot:navLinks>
        <x-nav-link :href="route('patientDashboard')" :active="request()->routeIs('patientDashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('appointments.index')" :active="request()->routeIs('appointments.index')">
            {{ __('Appointments') }}
        </x-nav-link>
        <x-nav-link href="/medicalfiles" :href="route('medicalFiles.index', auth()->user()->userable->id)" :active="request()->routeIs('medicalFiles.index')">
            {{ __('Medical files') }}
        </x-nav-link>
        </x-slot>
        <x-slot:settingsDropDown>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>
                            {{ Auth::user()->name . ' ' . Auth::user()->famillyName }}
                        </div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    {{-- medical record --}}
                    <x-dropdown-link :href="route('medicalProfile.show')">
                        {{ __('Medical Record') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
            </x-slot>
            <x-slot:responsivNavigationMenu>
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('patientDashboard')" :active="request()->routeIs('patientDashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('medicalProfile.show')" :active="request()->routeIs('medicalProfile.show')">
                            {{ __('Medical Record') }}
                        </x-responsive-nav-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
                </x-slot>
</x-navigation>
