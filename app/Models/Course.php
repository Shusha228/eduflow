<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Enrollment> $enrollments
 * @property-read int|null $enrollments_count
 * @property-read \App\Models\User|null $instructor
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course query()
 * @mixin \Eloquent
 */
class Course extends Model{

    protected $fillable = [
        'title', 'description', 'category_id', 'instructor_id', 'price'
    ];

    public function instructor() : BelongsTo{
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function category() : BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function enrollments() : HasMany{
        return $this->hasMany(Enrollment::class);
    }
}
