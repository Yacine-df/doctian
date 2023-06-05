<x-app-layout>
    <div class="container mt-6 mx-auto">
        <div class="bg-white p-4">
            <h1 class="text-center font-bold">Patient profile</h1>
            <div class="col-span-10 md:col-span-3 flex flex-col items-center justify-center bg-white rounded p-4">
                <img class="rounded-full shadow-lg w-32" src="https://cdn-icons-png.flaticon.com/512/147/147144.png"
                    alt="Thomas Lean image" />
                <h1 class="font-bold mt-2">Yacine Diaf</h1>
                <ul class="grid md:grid-cols-3 gap-2 mt-2">
                    <li class="text-gray-500 text-sm"><span class="font-bold text-base text-black">Insurance Number
                            :</span><span class="bg-gray-200 text-gray-500 py-1 p-2 rounded-full ml-2"> 19999</span>
                    </li>
                    <li class="text-gray-500 text-sm"><span class="font-bold text-base text-black">email:</span><span
                            class="bg-gray-200 text-gray-500 py-1 p-2 rounded-full ml-2">
                            {{ auth()->user()->email }}</span></li>
                    <li class="text-gray-500 text-sm"><span class="font-bold text-base text-black">phone:</span><span
                            class="bg-gray-200 text-gray-500 py-1 p-2 rounded-full ml-2">
                            {{ auth()->user()->phone }}</span></li>
                    <li class="text-gray-500 text-sm"><span class="font-bold text-base text-black">wilaya:</span><span
                            class="bg-gray-200 text-gray-500 py-1 p-2 rounded-full ml-2">
                            {{ auth()->user()->wilaya }}</span></li>
                    <li class="text-gray-500 text-sm"><span class="font-bold text-base text-black">Gender:</span><span
                            class="bg-gray-200 text-gray-500 py-1 p-2 rounded-full ml-2"> Man</span></li>
                    <li class="text-gray-500 text-sm"><span
                            class="font-bold text-base text-black">Birthdate:</span><span
                            class="bg-gray-200 text-gray-500 py-1 p-2 rounded-full ml-2"> 15/10/2000</span></li>
                    <li class="text-gray-500 text-sm"><span class="font-bold text-base text-black">Height:</span><span
                            class="bg-gray-200 text-gray-500 py-1 p-2 rounded-full ml-2"> 1m77</span></li>
                    <li class="text-gray-500 text-sm"><span class="font-bold text-base text-black">weight:</span><span
                            class="bg-gray-200 text-gray-500 py-1 p-2 rounded-full ml-2"> 70kg</span></li>
                </ul>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-2 mt-2" x-data="prescription()">
            <div class="bg-white p-4 shadow-md">
                <h1 class="text-center font-bold w-full bg-blue-500 py-2 px-2 rounded text-white">Add Medication</h1>
                <form @submit.prevent="submit" class="mt-6 space-y-6">
                    @csrf

                    <div class="">
                        <div class="mt-2 px-4">
                            <x-input-label class="font-bold" for="name" :value="__('Medication')" />
                            <i class="fa-solid text-blue-500 fa-pills absolute z-10 mt-3 ml-2  text-base"></i>
                            <x-text-input id="name" x-model="newMedication.name" type="text"
                                class="mt-1 block w-full relative pl-8" :value="old('name')" required autofocus
                                autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="mt-2 px-4">
                            <x-input-label for="name" :value="__('Type')" />
                            <i
                                class="fa-solid text-blue-500 fa-prescription-bottle absolute z-10 mt-3 ml-2 text-base"></i>
                            <select class="rounded mt-1 block w-full relative pl-8" x-model="newMedication.type"
                                id="">
                                <option value="">Select a Duration</option>
                                <option value="Bottle">Bottle(s)</option>
                                <option value="Box">Box(es)</option>
                                <option value="Tube">Tube(s)</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="mt-2 px-4">
                            <x-input-label for="name" :value="__('Dosage')" />
                            <i class="fa-solid text-blue-500 fa-eye-dropper absolute z-10 mt-3 ml-2  text-base"></i>
                            <select class="rounded mt-1 block w-full relative pl-8" x-model="newMedication.dosage"
                                id="">
                                <option value="">Select a Dosage</option>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value={{ $i }}> {{ $i }} </option>
                                @endfor
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="mt-2 px-4">
                            <x-input-label for="name" :value="__('Frequency')" />
                            <i class="fa-solid text-blue-500 fa-notes-medical absolute z-10 mt-3 ml-2  text-base"></i>
                            <select class="rounded mt-1 block w-full relative pl-8" x-model="newMedication.frequency"
                                id="">
                                <option value="">Select a frequency</option>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i . ' times per day' }}"> {{ $i . ' times per day' }} </option>
                                @endfor
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="mt-2 px-4">
                            <x-input-label for="name" :value="__('Duration')" />
                            <i
                                class="fa-solid text-blue-500 fa-clock-rotate-left absolute z-10 mt-3 ml-2 text-base"></i>
                            <select class="rounded mt-1 block w-full relative pl-8" x-model="newMedication.duration"
                                id="">
                                <option value="">Select a Duration</option>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i . ' Day(s)' }}"> {{ $i . ' Day(s)' }} </option>
                                @endfor
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-around">
                        <label class="font-bold" for="note">Notes</label>
                        <textarea class="bg-gray-100 rounded" name="" id="" cols="60" rows="2"></textarea>
                    </div>
                    <div x-cloak class="w-full flex items-center justify-center">
                        <button x-show="show" class="bg-blue-500 rounded px-4 py-1 text-white">Add</button>
                        <button @click.prevent="updateMedication(newMedication.index)" x-show="!show" class="bg-orange-500 rounded px-4 py-1 text-white">update</button>
                    </div>
                </form>
            </div>
            <div class="bg-white px-4">
                <p class="bg-gray-300 mx-2 my-4 p-2 text-sm text-center rounded font-bold">{{\Carbon\Carbon::now()->format('Y-m-d')}}</p>
                <h1 class="mx-2 font-bold">
                    Medications
                    <span x-text="'('+ prescription.medications.length+')'"></span>
                </h1>
                <div class="p-4">
                    <ul class="mb-6">
                        <template x-for="(medication, index) in prescription.medications" :key='index'>
                            <li class="flex items-center justify-between cursor-pointer" @click="editMedication(index)">
                                <div>
                                    <h1 class="font-bold" x-text="medication.name"></h1>
                                    <span class="text-xs block"
                                        x-text="medication.dosage +' '+ medication.type + '(s)'"></span>
                                    <span class="text-xs block"
                                        x-text="medication.frequency + ' for ' + medication.duration "></span>
                                </div>
                                <button @click.prevent='deleteMedication(index)' class="bg-red-500 rounded-full text-white">
                                    <span class=" p-2">x</span>
                                </button>
                            </li>
                        </template>
                    </ul>
                    <template x-if="prescription.medications.length">
                        <button @click="save()" class="bg-green-500 py-1 px-4 text-white rounded ">Save</button>
                    </template>
                </div>
            </div>
        </div>
    </div>
    <script>
        let prescription = () => {
            return {
                prescription: {
                    _token: '{{ csrf_token() }}',
                    doctor : '{{ auth()->user()->userable_id }}',
                    patient : '1',
                    medications: []
                },
                newMedication: {
                    index: '',
                    name: '',
                    type: '',
                    dosage: '',
                    frequency: '',
                    duration: ''
                },
                show: true,
                submit() {    
                    this.prescription.medications.push(this.newMedication);
                    this.newMedication = {};
                },
                deleteMedication(index){
                    this.prescription.medications.splice(index, 1);
                    this.newMedication = {};
                },
                editMedication(index){
                    this.newMedication.index = index;
                    this.newMedication = this.prescription.medications[index];
                    this.show = false;
                },
                updateMedication(index){
                    this.prescription.medications[index] = this.newMedication;
                    this.newMedication = {};
                    this.show = true;
                },
                save(){
                    fetch('{{route('prescription')}}',{
                        method: 'GET',
                        headers: {'Content-Type' : 'application/json'},
                        body : JSON.stringify(this.prescription)
                    })
                    .then(console.log('done'));
                }

            }
        }
    </script>
</x-app-layout>
