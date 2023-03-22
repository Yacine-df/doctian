<div>
    <div class="mt-1">
        <x-input-label for="wilaya" :value="__('State')" />
        <select class="border-gray-300 bg-white rounded" name="wilaya" wire:model="chosenWilaya" :value="old('wilaya')" required autofocus autocomplete="wilaya">
            @foreach ($wilayas as $key => $wilaya)
                    <option value="{{$wilaya}}">{{$wilaya}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('wilaya')" class="mt-2" />
    </div>
    <!-- commune -->
    <div class="mt-1">
        <x-input-label for="commune" :value="__('commune')" />
        <select name="commune" class="border-gray-300 bg-white rounded :value="old('commune')" required autofocus autocomplete="commune">
            @if ($chosenWilaya == NULL)
                <option value="Choose">Choose a wilaya first</option>
            @else
            @foreach (config('algerien_cities') as $key => $wilaya)
                @if ($wilaya['wilaya_name_ascii'] == $chosenWilaya)
                    <option value="{{$wilaya['commune_name_ascii']}}">
                        {{$wilaya['commune_name_ascii']}}
                    </option>
                
                @endif
            @endforeach
             
            @endif
        </select>
        <x-input-error :messages="$errors->get('wilaya')" class="mt-2" />
    </div>
</div>
