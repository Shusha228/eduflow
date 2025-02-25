<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property-read \App\Models\Course|null $course
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment query()
 * @mixin \Eloquent
 */
class Enrollment extends Model{

    protected $fillable = ['user_id', 'course_id'];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function course() : BelongsTo{
        return $this->belongsTo(Course::class);
    }
}
