<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Course;
use App\Repositories\Contracts\CourseRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CourseRepository implements CourseRepositoryInterface{

    protected Course $model;

    public function __construct(Course $model){
        $this->model = $model;
    }

    public function all() : Collection{
        return Cache::remember('courses.all', 3600, function(){
            return $this->model->with('category', 'instructor')->get();
        });
    }

    public function find(int $id) : ?Course{
        return $this->model->find($id);
    }

    public function create(array $data) : Course{
        return $this->model->create($data);
    }

    public function update(int $id, array $data) : ?Course{
        $course = $this->model->find($id);
        if($course){
            $course->update($data);
            Cache::forget('courses.all');
        }
        return $course;
    }

    public function delete(int $id) : bool{
        $course = $this->model->find($id);
        if($course){
            $course->delete();
            Cache::forget('courses.all');
            return true;
        }
        return false;
    }

    public function paginate(int $perPage = 10) : LengthAwarePaginator{
        return $this->model->with('category', 'instructor')->paginate($perPage);
    }

    public function findByField(string $field, $value) : Collection{
        return $this->model->where($field, $value)->get();
    }
}
