<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable{

    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = ['password'];

    public function courses() : HasMany{
        return $this->hasMany(Course::class, 'instructor_id');
    }

    public function enrollments() : HasMany{
        return $this->hasMany(Enrollment::class);
    }
}
