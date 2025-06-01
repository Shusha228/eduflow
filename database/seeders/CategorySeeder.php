<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder{

    public function run() : void{
        $categories = [
            ['name' => 'Программирование'],
            ['name' => 'Дизайн'],
            ['name' => 'Маркетинг'],
            ['name' => 'Бизнес'],
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
