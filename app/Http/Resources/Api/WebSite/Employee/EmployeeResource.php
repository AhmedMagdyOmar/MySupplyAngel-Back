<?php

namespace App\Http\Resources\Api\WebSite\Employee;

use App\Http\Resources\Api\WebSite\City\CityResource;
use App\Http\Resources\Api\WebSite\Country\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'id'            => (int) $this->id,
            'name'          => (string) $this->name,
            'phone_code'    => (string) $this->phone_code,
            'phone'         => (string) $this->phone,
            'email'         => (string) $this->email,
            'avatar'        => (string) $this->avatar,
            'country'       => optional($this->profile)->country_id ? new CountryResource($this->profile->country) : null,
            'city'          => optional($this->profile)->city_id ? new CityResource($this->profile->city) : null,
            'gender'        => (string) $this->gender,
            'is_need_job'   => (bool) $this->is_need_job,
            'previous_work' => $this->previous_work,
            'created_at'    => $this->created_at ? $this->created_at->format('Y-m-d') : null,
        ];
    }
}
