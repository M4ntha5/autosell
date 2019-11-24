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
            'gearbox' => $this->gearbox,
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
            'user_id' => $this->user_id,
            'brand_id' => $this->brand_id,
            'model_id' => $this->model_id,
            'fuel_id' => $this->fuel_id,
            'gearbox_id' => $this->gearbox_id,
            'body_type_id' => $this->body_type_id,
            'color_id' => $this->color_id,
            'steering_wheel_id' => $this->steering_wheel_id,
            'number_of_doors_id' => $this->number_of_doors_id,
            'driven_wheels_id' => $this->driven_wheels_id,
            'climate_control_id' => $this->climate_control_id,
            'euro_standard_id' => $this->euro_standard_id,
            'damage_id' => $this->damage_id

        ];
    }
}
