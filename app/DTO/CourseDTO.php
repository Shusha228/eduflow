<?php

declare(strict_types=1);

namespace App\DTO;

use Spatie\LaravelData\Data;

class CourseDTO extends Data{

    public string $title;
    public string $description;
    public int $category_id;
    public float $price;
    public int $instructor_id;
}
