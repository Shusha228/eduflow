<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Enrollment;
use App\Jobs\SendEnrollmentNotification;

class EnrollmentObserver{

    public function created(Enrollment $enrollment) : void{
        SendEnrollmentNotification::dispatch(
            $enrollment->user,
            $enrollment->course
        );
    }
}
