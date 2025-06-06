<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;
use App\Models\Course;

class CoursePolicy{

    public function update(User $user, Course $course) : bool{
        return $user->id === $course->instructor_id;
    }

    public function delete(User $user, Course $course) : bool{
        return $user->id === $course->instructor_id;
    }
}
