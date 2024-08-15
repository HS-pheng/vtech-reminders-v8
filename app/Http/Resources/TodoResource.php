<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "todo" => $this->todo,
            "isCompleted" => (bool) ($this->is_completed),
            "createdAt" => $this->created_at,
        ];
    }
}
