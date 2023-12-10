<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            'name' => 'Console'
        ]);

        DB::table('category')->insert([
            'name' => 'Mobile'
        ]);
    
        DB::table('category')->insert([
            'name' => 'Monitor'
        ]);
    
        DB::table('category')->insert([
            'name' => 'Tablet'
        ]);

        DB::table('category')->insert([
            'name' => 'Laptop'
        ]);
    }
}
