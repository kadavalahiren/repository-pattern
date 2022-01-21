<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Log;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /* ApiCollection - DataFormat is Json / Collection of Data */
        return $this->collection->map(function($record) {
            return([
                'name' => $record->name,
                'email' => $record->email,
            ]);
        });
    }
}
