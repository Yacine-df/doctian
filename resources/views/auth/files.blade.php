<x-app-layout>
    <div x-data="{ addFile: false }" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-10 mt-6 gap-4">
            <aside
                class="col-span-10  md:col-start-0 md:col-end-0 md:col-span-2 p-2 rounded bg-white text-gray-400 shadow">
                <h1 class="font-bold text-center">Files type</h1>
                <ul class="mt-2">
                    <li
                        class="m-1 hover:text-blue-400 hover:ml-2 transition-all p-1 {{ request()->query('type') == null ? 'rounded bg-blue-500 text-white hover:text-white' : '' }}">
                        <a href="?type=">All</a>
                    </li>
                    <li
                        class="m-1 hover:text-blue-400 hover:ml-2 transition-all p-1 {{ request()->query('type') == 'prescription' ? 'rounded bg-blue-500 text-white hover:text-white' : '' }}">
                        <a href="?type=prescription">Prescriptions</a>
                    </li>
                    <li
                        class="m-1 hover:text-blue-400 hover:ml-2 transition-all p-2 {{ request()->query('type') == 'analysis' ? 'rounded bg-blue-500 text-white hover:text-white' : '' }}">
                        <a href="?type=analysis">Analysis</a>
                    </li>
                    <li
                        class="m-1 hover:text-blue-400 hover:ml-2 transition-all p-2 {{ request()->query('type') == 'test' ? 'rounded bg-blue-500 text-white hover:text-white' : '' }}">
                        <a href="?type=test">Tests</a>
                    </li>
                    <li
                        class="m-1 hover:text-blue-400 hover:ml-2 transition-all p-2 {{ request()->query('type') == 'xray' ? 'rounded bg-blue-500 text-white hover:text-white' : '' }}">
                        <a href="?type=xray">Xrays</a>
                    </li>
                </ul>
            </aside>
            <section class="bg-white col-span-10 md:col-span-8 rounded overflow-x-auto shadow">
                <div class="flex items-center justify-between min-w-max">
                    <div class="flex items-center">
                        <h1 class="font-bold p-4">Add A file</h1>
                        <button @click="addFile = true"
                            class="bg-blue-500 text-white px-2 py-1 rounded text-xs">{{ __('Add') }}</button>
                    </div>
                    <div class="relative mr-2" x-data="">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" style="transition-duration: 500ms" x-show="true" x-transition
                            transition-duration.100ms;
                            @click="$el.classList.add('w-80');
                             $el.classList.remove('w-56');"
                            @click.away="$el.classList.add('w-56');
                            $el.classList.remove('w-80');"
                            id="table-search-users"
                            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-56 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ __('Search') }}">
                    </div>
                </div>
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 overflow-x-auto">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col"
                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <div class="flex items-center gap-x-3">
                                    <span>{{ __('Number') }}</span>
                                </div>
                            </th>

                            <th scope="col"
                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                {{ __('Date') }}
                            </th>

                            <th scope="col"
                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                {{ __('file name') }}
                            </th>

                            <th scope="col"
                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                {{ __('file type') }}
                            </th>

                            <th scope="col"
                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                        @if ($medicalFiles)
                            @foreach ($medicalFiles as $file)
                                <tr>
                                    <td
                                        class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                        <div class="inline-flex items-center gap-x-3">
                                            <span>{{$loop->iteration}}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                        {{$file->created_at}}
                                    </td>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">
                                                {{$file->file_name}}
                                            </h2>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-red-500 bg-red-100/60 dark:bg-gray-800">
                                            <h2 class="text-sm font-normal">
                                                {{$file->file_type}}
                                            </h2>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex items-center gap-x-6">
                                            <a class="text-gray-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none"
                                                href="{{ '/' . auth()->user()->userable_id . '/medicalfiles/' . $file->id .'/show'}}">
                                                {{ __('Show') }}
                                            </a>

                                            <a class="text-red-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none"
                                                href="{{ '/' . auth()->user()->userable_id . '/medicalfiles/' . $file->id .'/delete'}}">
                                                {{ __('Delete') }}
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                                <tr>
                                    there is no file for the moment
                                </tr>
                        @endif
                    </tbody>
                </table>
            </section>
        </div>
        <!--add file modal -->
        <div x-cloak x-show="addFile" @click="addFile = false" x-transition
            class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden bg-gray-100/70 overflow-y-auto md:inset-0 min-h-screen">
            <div class="relative w-full h-full md:h-auto grid place-items-center">
                <!-- Modal content -->
                <div @click.stop class="relative  bg-white rounded-lg shadow dark:bg-gray-700 w-auto">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Add New file
                        </h3>
                        <button @click="addFile = false"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="staticModal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('medicalFiles.store', auth()->user()->userable->id) }}" method="POST"
                        enctype="multipart/form-data" class="p-6 grid grid-cols-2 gap-6">
                        @csrf
                        <div>
                            <x-input-label for="File name" :value="__('File name')" />
                            <x-text-input id="file_name" class=" mt-1 w-full" type="text" name="file_name"
                                :value="old('file_name')" autocomplete="file_name" />
                            <x-input-error :messages="$errors->get('file_name')" class="mt-2" />
                        </div>
                        <div class="m-1">
                            <x-input-label for="date" :value="__('File type')" />
                            <select name="file_type" id="" class="rounded w-full">
                                <option value="prescription">prescription</option>
                                <option value="analysis">Analysis</option>
                                <option value="test">Test</option>
                                <option value="xray">Xray</option>
                            </select>
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>
                        {{-- file input --}}
                        <div class="flex items-center justify-center w-full col-span-2 mt-4">
                            <label for="dropzone-file"
                                class="flex items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop
                                    </p>
                                </div>
                                <input id="dropzone-file" name='file_input' type="file" class="hidden" />
                            </label>
                        </div>
                        <button type="submit"
                            class="col-span-2 mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
