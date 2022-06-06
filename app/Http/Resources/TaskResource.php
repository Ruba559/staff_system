<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'title' => $this->title,
            'specified_time' => $this->specified_time,
            'project_id' => new ProductResource($this->project),
            'user_id' => new UserResource($this->user),
            'is_executed' => $this->is_executed,
            'file' => $this->file,
            
        ];
    }
}
