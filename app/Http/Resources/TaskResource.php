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
            'project' => new ProjectResource($this->project),
            'user' => new UserResource($this->user),
            'manager' => new UserResource($this->manager),
            'is_executed' => $this->is_executed,
            'file' => $this->file,
            'steps'=> StepResource::collection($this->steps)
        ];
    }
}
