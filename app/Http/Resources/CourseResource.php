<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource{

    public function toArray($request) : array{
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'instructor' => $this->instructor->name,
            'category' => $this->category->name,
        ];
    }
}
