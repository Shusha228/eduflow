<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
