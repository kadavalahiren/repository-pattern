<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        /* ApiResource  - DataFormat is Json / Single Data GET */
        return([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        // return parent::toArray($request);
    }
}
