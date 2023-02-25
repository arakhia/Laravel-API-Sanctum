<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'dateOfBirth' => $this->date_of_birth,
            'major' => $this->major,
            'address' => $this->address,
            'status' => $this->status,
            'assignments' => AssignmentResource::collection($this->whenLoaded('assignments'))
            //'createdAt' => $this->id,
            //'updatedAt' => $this->id,
        ];
    }
}
