<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Ad extends JsonResource
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
            'id' => $this->id,
            'price' => $this->price,
            'image' => $this->image,
            'phone_no' => $this->phone_no,
            'description' => $this->description,
            'manufacture_date' => $this->manufacture_date,
            'mileage' => $this->mileage,
            'engine_power' => $this->engine_power,
            'engine_volume' => $this->engine_volume,
            'damage' => $this->damage,
            'fuel' => $this->fuel,
            'gearbox' => $this->igearbox_,
            'body_type' => $this->body_type,
            'color' => $this->color,
            'steering_wheel' => $this->steering_wheel,
            'number_of_doors' => $this->number_of_doors,
            'driven_wheels' => $this->driven_wheels,
            'climate_control' => $this->climate_control,
            'euro_standard' => $this->euro_standard,
            'brand' => $this->brand,
            'model' => $this->model,
            'user' => $this->user,
        ];
    }
}
