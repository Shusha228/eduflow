<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class CourseRequest extends FormRequest{

    public function authorize() : bool{
        /** @var User $user */
        $user = $this->user();
        return $user->role === 'instructor';
    }

    public function rules() : array{
        return [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
        ];
    }
}
