<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('products')->insert([
            [
                'name' => 'Iphone 13',
                'price' => '1399',
                'category' => 'Mobile',
                'description' => 'Description for Product 1',
                'gallery' => 'https://static.wixstatic.com/media/5845cd_abec49d48f964eff93a7b9ebff3bee37~mv2.jpeg/v1/fill/w_507,h_677,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/iPhone%2011%202up%20purple.jpeg',
            ],
            [
                'name' => 'Samsung galaxy s21',
                'price' => '1000',
                'category' => 'Laptop',
                'description' => 'android phone',
                'gallery' => 'https://cdn.vodafone.co.uk/en/assets/images/desktop/Samsung_Galaxy_S21_FE_lavender-full-product-front-600.png',
            ],
            [
                'name' => 'Iphone 13',
                'price' => '1399',
                'category' => 'Console',
                'description' => 'Description for Product 1',
                'gallery' => 'https://static.wixstatic.com/media/5845cd_abec49d48f964eff93a7b9ebff3bee37~mv2.jpeg/v1/fill/w_507,h_677,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/iPhone%2011%202up%20purple.jpeg',
            ],
            [
                'name' => 'Iphone 13',
                'price' => '1399',
                'category' => 'Monitor',
                'description' => 'Description for Product 1',
                'gallery' => 'https://static.wixstatic.com/media/5845cd_abec49d48f964eff93a7b9ebff3bee37~mv2.jpeg/v1/fill/w_507,h_677,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/iPhone%2011%202up%20purple.jpeg',
            ],
            [
                'name' => 'Iphone 13',
                'price' => '1399',
                'category' => 'Tablet',
                'description' => 'Description for Product 1',
                'gallery' => 'https://static.wixstatic.com/media/5845cd_abec49d48f964eff93a7b9ebff3bee37~mv2.jpeg/v1/fill/w_507,h_677,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/iPhone%2011%202up%20purple.jpeg',
            ],
               
            
        ]);

        


    }
}
