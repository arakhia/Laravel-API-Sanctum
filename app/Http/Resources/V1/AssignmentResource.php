<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
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
            'courseId' => $this->course_id,
            'studentId' => $this->student_id,
            'grade' => $this->grade,
            'openedAt' => $this->opened_at,
            'solvedAt' => $this->solved_at,
            //'createdAt' => $this->id,
            //'updatedAt' => $this->id,
        ];
    }
}
