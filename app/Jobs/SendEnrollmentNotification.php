<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\User;
use App\Models\Course;
use App\Notifications\CourseEnrolled;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEnrollmentNotification implements ShouldQueue{

    use Queueable;

    public function __construct(
        public User $user,
        public Course $course
    ){
    }

    public function handle() : void{
        $this->user->notify(new CourseEnrolled($this->course));
    }
}
