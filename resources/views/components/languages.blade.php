<div class="hidden sm:flex sm:items-center sm:ml-6 z-50">
    <x-dropdown align="right" width="32">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                <div>{{ Config::get('languages')[App::getLocale()]['display'] }}</div>
                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            @foreach (Config::get('languages') as $lang => $language)
                @if ($lang != App::getLocale())
                    <x-dropdown-link :href="Route('lang.switch', $lang) ">
                        {{ $language['display'] }}
                    </x-dropdown-link>
                @endif
            @endforeach
        </x-slot>
    </x-dropdown>
</div>