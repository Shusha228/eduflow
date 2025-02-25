<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Course;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CourseRepositoryInterface{

    public function all() : Collection;

    public function find(int $id) : ?Course;

    public function create(array $data) : Course;

    public function update(int $id, array $data) : ?Course;

    public function delete(int $id) : bool;

    public function paginate(int $perPage = 10) : LengthAwarePaginator;

    public function findByField(string $field, $value) : Collection;
}
