<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->user->name,
            'famillyName' => $this->user->famillyName,
            'email' => $this->user->email,
            'password' => $this->user->password,
            'wilaya' => $this->user->wilaya,
            'commune' => $this->user->commune,
            'phone' => $this->user->phone,
            'insurance_number' => $this->insurance_number,
            'avatar_url' => env('APP_URL') . Storage::url($this->user->avatar)
        ];
    }
}
