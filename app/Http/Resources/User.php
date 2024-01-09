<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed phone
 * @property mixed user_name
 * @property mixed name
 * @property mixed province_label
 * @property mixed city_label
 * @property mixed email
 * @property mixed status_label
 * @property mixed profile_image
 * @property mixed description
 * @property mixed score
 * @property mixed status
 * @property mixed baned
 * @property mixed ban
 * @property mixed balance
 */
class User extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

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
            'name' => $this->name,
			'family' => $this->family,
            'email' => $this->email,
        ];
    }
}