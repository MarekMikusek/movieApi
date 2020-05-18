<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movie extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title' =>$this->title,
            'film_genre' =>$this->film_genre,
            'description' =>$this->description,
            'country' =>$this->country,
            'cover' => $this->cover
        ];
    }
}
