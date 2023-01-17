<?php

namespace Modules\Doctor\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'full_name' => "{$this->first_name} {$this->last_name}",
            'photo' => $this->photo,
            'is_verified' => $this->is_verified,
            'type' => 'doctor'
        ];
    }
}
