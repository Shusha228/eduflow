<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\CourseDTO;
use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Models\Course;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CourseService{

    public function __construct(
        private CourseRepositoryInterface $courseRepo
    ){
    }

    public function createCourse(CourseDTO $dto) : Course{
        return $this->courseRepo->create($dto->toArray());
    }

    public function getCourseById(int $id) : ?Course{
        return $this->courseRepo->find($id);
    }

    public function updateCourse(int $id, CourseDTO $dto) : ?Course{
        return $this->courseRepo->update($id, $dto->toArray());
    }

    public function deleteCourse(int $id) : bool{
        return $this->courseRepo->delete($id);
    }

    public function getPaginatedCourses(int $perPage = 10) : LengthAwarePaginator{
        return $this->courseRepo->paginate($perPage);
    }

    public function getCoursesByInstructor(int $instructorId) : Collection{
        return $this->courseRepo->findByField('instructor_id', $instructorId);
    }
}
