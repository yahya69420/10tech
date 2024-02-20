<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create categories
        $mobileCategory = Category::create([
            'name' => 'Mobile',
            'image' => 'https://images.unsplash.com/photo-1589894404892-7310b92ea7a2?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => '199.00',
        ]);

        $consoleCategory = Category::create([
            'name' => 'Console',
            'image' => 'https://images.unsplash.com/photo-1649380932726-869503f7ddf8?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => '299.00',
        ]);

        $monitorCategory = Category::create([
            'name' => 'Monitor',
            'image' => 'https://images.unsplash.com/photo-1545665277-5937489579f2?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => '89.99',
        ]);

        $tabletCategory = Category::create([
            'name' => 'Tablet',
            'image' => 'https://images.unsplash.com/photo-1561154464-82e9adf32764?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => '99.99',
        
        ]);

        $laptopCategory = Category::create([
            'name' => 'Laptop',
            'image' => 'https://images.unsplash.com/photo-1525547719571-a2d4ac8945e2?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => '399.99',
        ]);

        // 5 laptops seeded
        Product::create([
            'name' => 'Macbook Air',
            'price' => 999.00,
            'description' => 'Thin and light MacBook with M1 chip',
            'image' => 'https://images.unsplash.com/photo-1541807084-5c52b6b3adef?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8bWFjYm9vayUyMGFpcnxlbnwwfHwwfHx8MA%3D%3D',
            'stock' => '0',
            'brand' => 'Apel',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'Macbook Pro',
            'price' => 1299.00,
            'description' => 'Thin and light MacBook with M1 chip',
            'image' => 'https://images.unsplash.com/photo-1580522154071-c6ca47a859ad?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8bWFjYm9vayUyMHByb3xlbnwwfHwwfHx8MA%3D%3D',
            'stock' => '1',
            'brand' => 'Apel',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'Dell XPS 13',
            'price' => 1399.00,
            'description' => 'Thin and light MacBook with M1 chip',
            'image' => 'https://www.cnet.com/a/img/resize/51a1873aac8a490cfd677f524a58f6bacf53d07e/hub/2019/01/04/83703cec-9498-4543-9b1f-0a5bc0683763/dell-xps-13-07.jpg?auto=webp&width=1200',
            'stock' => '2',
            'brand' => 'Del',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'HP Spectre x360',
            'price' => 1499.00,
            'description' => 'Thin and light MacBook with M1 chip',
            'image' => 'https://sm.pcmag.com/t/pcmag_uk/review/h/hp-spectre/hp-spectre-x360-135-2022_jt67.3840.jpg',
            'stock' => '3',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'Lenovo ThinkPad X1 Carbon',
            'price' => 1599.00,
            'description' => 'Thin and light MacBook with M1 chip',
            'image' => 'https://p4-ofp.static.pub/fes/cms/2023/02/10/7qjkk7h1a53t8jq5snivyzumxw040v193587.png',
            'stock' => '4',
        ])->categories()->attach($laptopCategory);



        // 5 mobiles seeded
        Product::create([
            'name' => 'iPhunny 13',
            'price' => 1399.00,
            'description' => 'Description for iPhunny 13',
            'image' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'stock' => '0',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'Samsong Galaxy S21',
            'price' => 1000.00,
            'description' => 'Android phone with amazing features',
            'image' => 'https://images.unsplash.com/photo-1610792516307-ea5acd9c3b00?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2Ftc3VuZyUyMHBob25lfGVufDB8fDB8fHwy',
            'stock' => '1',
            'brand' => 'Samsong',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'Google Pixel 5',
            'price' => 699.00,
            'description' => 'Android phone with amazing features',
            'image' => 'https://images.unsplash.com/photo-1612442443556-09b5b309e637?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z29vZ2xlJTIwcGl4ZWx8ZW58MHx8MHx8fDA%3D',
            'stock' => '2',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'OnePlus 9 Pro',
            'price' => 899.00,
            'description' => 'Android phone with amazing features',
            'image' => 'https://www.oneplus.com/content/dam/oasis/page/os/oxygenos/4.png',
            'stock' => '3',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'Huawei P40 Pro',
            'price' => 799.00,
            'description' => 'Android phone with amazing features',
            'image' => 'https://consumer.huawei.com/content/dam/huawei-cbg-site/common/mkt/pdp/phones/p40-pro/images/design/design-intro-e@2x.webp',
            'stock' => '4',
        ])->categories()->attach($mobileCategory);


        // 5 monitors seeded
        Product::create([
            'name' => 'Dell UltraSharp U2720QWERTY',
            'price' => 699.00,
            'description' => '27-inch 4K UHD monitor with HDR support',
            'image' => 'https://gfx3.senetic.com/akeneo-catalog/a/3/d/f/a3dfec2c830f8f76a74f53985ae4ebc65e89bac8_1627564_DELL_U2720Q_image1',
            'stock' => '0',
        ])->categories()->attach($monitorCategory);

        Product::create([
            'name' => 'LG UltraGear 27GN950',
            'price' => 799.00,
            'description' => '27-inch 4K UHD monitor with HDR support',
            'image' => 'https://www.lg.com/content/dam/channel/wcms/uk/images/monitors/27GN950-B_AEK_EEUK_UK_C/MNT-27GN950-Basic.jpg',
            'stock' => '1',
        ])->categories()->attach($monitorCategory);

        Product::create([
            'name' => 'Samsung Odyssey G7',
            'price' => 899.00,
            'description' => '27-inch 4K UHD monitor with HDR support',
            'image' => 'https://image-us.samsung.com/SamsungUS/samsungbusiness/computing/monitors/gaming/32--odyssey-g7-gaming-monitor-lc32g75tqsnxza/LC32G75TQSNXZA_001_Front_Black_1600x1200.jpg?$product-details-jpg$',
            'stock' => '2',
        ])->categories()->attach($monitorCategory);

        Product::create([
            'name' => 'Acer Predator X27',
            'price' => 999.00,
            'description' => '27-inch 4K UHD monitor with HDR support',
            'image' => 'https://i.pcmag.com/imagery/reviews/074fs6JJYgfDgoy3QwAHelw-8.fit_scale.size_760x427.v1569478388.jpg',
            'stock' => '3',
        ])->categories()->attach($monitorCategory);

        Product::create([
            'name' => 'Asus ROG Swift PG27UQ',
            'price' => 1099.00,
            'description' => '27-inch 4K UHD monitor with HDR support',
            'image' => 'https://rog.asus.com/media/1534242864535.jpg',
            'stock' => '4',
        ])->categories()->attach($monitorCategory);


        // 5 tablets seeded
        Product::create([
            'name' => 'Appletizer iPad Air',
            'price' => 599.00,
            'description' => 'Thin and light iPad with A14 Bionic chip',
            'image' => 'https://images.unsplash.com/photo-1604399852419-f67ee7d5f2ef?q=80&w=1931&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'stock' => '10',
            'brand' => 'Apel',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'Samsong Galaxy Tab S7',
            'price' => 499.00,
            'description' => 'Thin and light iPad with A14 Bionic chip',
            'image' => 'https://fdn2.gsmarena.com/vv/pics/samsung/samsung-galaxy-tab-s7-01.jpg',
            'stock' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'Huawei MatePad Pro',
            'price' => 399.00,
            'description' => 'Thin and light iPad with A14 Bionic chip',
            'image' => 'https://fdn2.gsmarena.com/vv/pics/huawei/matepad-11-pro-2022-1.jpg',
            'stock' => '2',
            'brand' => 'Hawai',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'Lenovo Tab P11 Pro',
            'price' => 299.00,
            'description' => 'Thin and light iPad with A14 Bionic chip',
            'image' => 'https://fdn2.gsmarena.com/vv/pics/lenovo/lenovo-tab-p11-pro-2.jpg',
            'stock' => '3',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'Samsung Galaxy Tab S6 Lite',
            'price' => 199.00,
            'description' => 'Thin and light iPad with A14 Bionic chip',
            'image' => 'https://fdn2.gsmarena.com/vv/pics/samsung/galaxy-tab-s6-lite-1.jpg',
            'stock' => '4',
        ])->categories()->attach($tabletCategory);




        // 5 consoles seeded

        Product::create([
            'name' => 'PrayStation 5',
            'price' => 499.00,
            'description' => 'Next-gen gaming console with 4K graphics',
            'image' => 'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'stock' => '0',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'Xbox Series X',
            'price' => 499.00,
            'description' => 'Next-gen gaming console with 4K graphics',
            'image' => 'https://images.unsplash.com/photo-1621259182978-fbf93132d53d?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'stock' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'PrayStation 4',
            'price' => 399.00,
            'description' => 'Next-gen gaming console with 4K graphics',
            'image' => 'https://images.unsplash.com/photo-1507457379470-08b800bebc67?q=80&w=2109&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'stock' => '2',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'Nintendo Switch',
            'price' => 299.00,
            'description' => 'Next-gen gaming console with 4K graphics',
            'image' => 'https://images.unsplash.com/photo-1612036781124-847f8939b154?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'stock' => '3',
        ])->categories()->attach($consoleCategory);


        Product::create([
            'name' => 'Nintendo Switch Lite',
            'price' => 199.00,
            'description' => 'Next-gen gaming console with 4K graphics',
            'image' => 'https://images.unsplash.com/photo-1618556679398-486ba2cf2e89?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'stock' => '4',
        ])->categories()->attach($consoleCategory);

        // A normal discount with %
        Discount::create([
            'code' => '10POFF',
            'type' => 'percentage',
            'value' => 10,
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // A discount with a fixed value
        Discount::create([
            'code' => '20OFF',
            'type' => 'fixed',
            'value' => 20,
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // A discount that has expired
        Discount::create([
            'code' => 'EXPIRED',
            'type' => 'percentage',
            'value' => 10,
            'start_date' => now()->subDays(30),
            'end_date' => now()->subDays(1),
            'active' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // A discount that is not active
        Discount::create([
            'code' => 'INACTIVE',
            'type' => 'percentage',
            'value' => 10,
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'active' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // A discount that is active but has not started
        Discount::create([
            'code' => 'NOTSTARTED',
            'type' => 'percentage',
            'value' => 10,
            'start_date' => now()->addDays(30),
            'end_date' => now()->addDays(60),
            'active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
