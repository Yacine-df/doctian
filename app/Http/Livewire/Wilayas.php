<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Wilayas extends Component
{
    public $chosenWilaya;
    public function render()
    {
        $wilayas = array();
        if (is_array($wilayas)) {
                foreach (config('algerien_cities') as $key => $values) {
                $wilayas[$values['wilaya_code']] = $values['wilaya_name_ascii'];
            }
        }
        $wilayas = array_unique($wilayas);
        return view('livewire.wilayas', compact('wilayas'));
    }
}
