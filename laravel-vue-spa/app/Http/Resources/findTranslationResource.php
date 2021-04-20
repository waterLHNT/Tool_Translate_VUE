<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class findTranslationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'id'                 => $this->id,
            'assignee_id'        => $this->assignee_id,
            'created_by'         => $this->created_by,
            'updated_by'         => $this->updated_by,
            'title'              => $this->title,
            'content_default'    => $this->content_default,
            'content_translated' => $this->content_translated,
            'status'             => $this->status,
            'type'               => $this->type,
            'start_date'         => $this->start_date,
            'end_date'           => $this->end_date,
            'created_at'         => $this->created_at,
            'updated_at'         => $this->updated_at,
            ];
    }
}
