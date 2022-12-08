<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'image/user.png',
            'role' => 'admin'
        ]);


        User::create([
            'name' => 'Chan Hein Kyaw',
            'email' => 'chk@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'image/user.png',
            'role' => 'user'
        ]);


        Category::create([
            'name' => 'Shoe',
            'slug' => 'shoe',
        ]);

        Category::create([
            'name' => 'Shirt',
            'slug' => 'shirt',
        ]);
        
        Category::create([
            'name' => 'Hat',
            'slug' => 'hat',
        ]);
        
        Category::create([
            'name' => 'Laptop',
            'slug' => 'laptop',
        ]);
        
        Category::create([
            'name' => 'Phone',
            'slug' => 'phone',
        ]);


        Product::factory(50)->create();
        // \App\Models\User::factory(10)->create();
    }
}
