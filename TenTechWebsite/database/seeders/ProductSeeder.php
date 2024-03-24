<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\UserAddress;
use App\Models\UserPayments;
use App\Models\Review;
use App\Models\Rating;

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
            'image' => 'phone5.png',
            'price' => '199.00',
        ]);

        $consoleCategory = Category::create([
            'name' => 'Console',
            // 'image' => 'https://images.unsplash.com/photo-1649380932726-869503f7ddf8?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'image' => 'console3.png',
            'price' => '299.00',
        ]);

        $monitorCategory = Category::create([
            'name' => 'Monitor',
            // 'image' => 'https://images.unsplash.com/photo-1545665277-5937489579f2?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'image' => 'monitor4.png',
            'price' => '89.99',
        ]);

        $tabletCategory = Category::create([
            'name' => 'Tablet',
            // 'image' => 'https://images.unsplash.com/photo-1561154464-82e9adf32764?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'image' => 'Tablet5.png',
            'price' => '99.99',

        ]);

        $laptopCategory = Category::create([
            'name' => 'Laptop',
            // 'image' => 'https://images.unsplash.com/photo-1525547719571-a2d4ac8945e2?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'image' => 'laptop4.png',
            'price' => '399.99',
        ]);

        // 5 laptops seeded
        Product::create([
            'name' => 'Macpad Air',
            'price' => 999.00,
            'description' => 'Thin and light Macpad with S45 chip',
            'image' => 'top1.webp',
            'stock' => '0',
            'brand' => "Apel",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'Macpad Pro',
            'price' => 1299.00,
            'description' => 'Thin and light Macpad with S42 chip',
            'image' => 'top2.webp',
            'stock' => '1',
            'brand' => "Apel",
            'release' => "2020",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'IDall XPS 13',
            'price' => 1399.00,
            'description' => 'Thin and light IDall with XPS13 chip',
            'image' => 'top3.webp',
            'stock' => '2',
            'brand' => "Dell",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'Lumina FlexPro',
            'price' => 1499.00,
            'description' => 'Experience the sleek and versatile Lumina FlexPro, a cutting-edge device designed to adapt to your every need. Equipped with advanced Lumina technology, this device seamlessly blends power and portability, providing an unparalleled computing experience. Whether you\'re unleashing creativity, tackling productivity tasks, or immersing yourself in entertainment, the Lumina FlexPro is your ultimate companion.',
            'image' => 'top4.webp',
            'stock' => '32',
            'brand' => "HP",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'Aurora ZenBook Ultra',
            'price' => 1699.00,
            'description' => 'Sleek and powerful ZenBook with Aurora chip',
            'image' => 'top5.webp',
            'stock' => '35',
            'brand' => "Aurora",
            'release' => "2023",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'NeuroPad X',
            'price' => 2499.99,
            'description' => 'Advanced NeuroPad with AI-enhanced neural processor',
            'image' => 'WpO0in1e.jpg',
            'stock' => '10',
            'brand' => "Apel",
            'release' => "2024",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'NeuroPad X: Business Edition V2 2023',
            'price' => 2499.99,
            'description' => 'Introducing the NeuroPad X: Business Edition V2 2023, a quantum leap in computing technology. Equipped with an AI-enhanced neural processor, it redefines productivity and innovation. Seamlessly blending elegance with power, it\'s the ultimate tool for professionals navigating the digital landscape of tomorrow.',
            'image' => 'YKMCT0uu.jpg',
            'stock' => '15',
            'brand' => "NeuroPad",
            'release' => "2023",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'NeuroPad X: Collector\'s Edition',
            'price' => 2499.99,
            'description' => 'Introducing the NeuroPad X: Collector\'s Edition, a timeless masterpiece for enthusiasts and collectors. With its vintage-inspired design and cutting-edge technology, this laptop pays homage to the golden era of computing. Experience the nostalgia of yesteryears while enjoying modern functionality. Limited edition, seize the opportunity to own a piece of history.',
            'image' => 'fb-5UF6k.jpg',
            'stock' => '3',
            'brand' => "NeuroPad",
            'release' => "2023",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'SleekBook Pro X1',
            'price' => 2799.99,
            'description' => 'Introducing the SleekBook Pro X1, the epitome of elegance and performance. Crafted with precision engineering and advanced materials, this slim and sleek laptop sets a new standard for high-performance computing. With lightning-fast processing power and stunning visuals, it\'s designed to empower you in every task. Elevate your productivity and style with the SleekBook Pro X1.',
            'image' => 'wqNcH9TY.jpg',
            'stock' => 19,
            'brand' => "TechGenius",
            'release' => "2024",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'GamerXtreme RGB 5000',
            'price' => 3299.99,
            'description' => 'Introducing the GamerXtreme RGB 5000, the ultimate gaming powerhouse with mesmerizing RGB lighting. Engineered for extreme performance, this laptop is equipped with cutting-edge hardware to handle the most demanding games with ease. Immerse yourself in stunning visuals and lightning-fast gameplay. Dominate the competition and unleash your full gaming potential with the GamerXtreme RGB 5000.',
            'image' => 'zWtNvp1t.jpg',
            'stock' => 15,
            'brand' => "GamingTech",
            'release' => "2024",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'Futurix Quantum X1',
            'price' => 3599.99,
            'description' => 'Introducing the Futurix Quantum X1, a glimpse into the future of computing. With its avant-garde design and state-of-the-art technology, this laptop pushes the boundaries of innovation. Experience unparalleled performance and efficiency with quantum computing capabilities. Immerse yourself in a world where science fiction becomes reality. Embrace the future today with the Futurix Quantum X1.',
            'image' => 'KzuO4ruv.jpg',
            'stock' => 20,
            'brand' => "Futurix",
            'release' => "2025",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'Intelissence Quantum Fusion X1',
            'price' => 3899.99,
            'description' => 'Introducing the Intelissence Quantum Fusion X1, a paradigm shift in computing technology. With its sleek design and cutting-edge Intelissence processor, this laptop redefines the boundaries of high-tech innovation. Experience unparalleled speed and efficiency, powered by Intelissence\'s latest advancements. Immerse yourself in a futuristic computing experience, where every task is executed with precision and speed. Embrace the power of Intelissence and step into the future with the Quantum Fusion X1.',
            'image' => '1rFbFQXc.jpg',
            'stock' => 25,
            'brand' => "Intelissence",
            'release' => "2026",
            'available' => '1',
        ])->categories()->attach($laptopCategory);


        Product::create([
            'name' => 'Dall HyperXcel X1',
            'price' => 3899.99,
            'description' => 'Introducing the Dall HyperXcel X1, a cutting-edge marvel in computing technology. With its sleek design and powerful Intel processor, this laptop sets the standard for high-tech innovation. Experience lightning-fast performance and seamless multitasking, powered by Dall\'s latest advancements. Immerse yourself in a futuristic computing experience where every task is executed with precision and speed. Elevate your productivity and embrace the future with the Dall HyperXcel X1.',
            'image' => 'PwXt_i_a.jpg',
            'stock' => 25,
            'brand' => "Dall",
            'release' => "2026",
            'available' => '1',
        ])->categories()->attach($laptopCategory);


        Product::create([
            'name' => 'Minimalist Pro X1',
            'price' => 2899.99,
            'description' => 'Introducing the Minimalist Pro X1, a sleek and understated masterpiece in computing. With its minimalist design and powerful Intel processor, this laptop embodies simplicity and elegance. Experience seamless performance and effortless multitasking, powered by the latest advancements in computing technology. Dive into a distraction-free computing experience where every interaction is intuitive and clutter-free. Embrace the essence of minimalism and elevate your productivity with the Minimalist Pro X1.',
            'image' => 'VE8CNdqS.jpg',
            'stock' => 30,
            'brand' => "MinimalTech",
            'release' => "2025",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'Executive GlassBook X1',
            'price' => 3299.99,
            'description' => 'Introducing the Executive GlassBook X1, a sophisticated companion for professionals in modern glass apartments. With its sleek design and premium craftsmanship, this laptop seamlessly blends into your upscale workspace. Powered by cutting-edge technology, it ensures smooth multitasking and efficient workflow management. Elevate your productivity with its intuitive interface and crystal-clear display. Make a statement of elegance and professionalism with the Executive GlassBook X1.',
            'image' => 'KHopzK0D.jpg',
            'stock' => 25,
            'brand' => "ExecuTech",
            'release' => "2024",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'GlassMate Pro X2',
            'price' => 3499.99,
            'description' => 'Introducing the GlassMate Pro X2, an elegant solution for professionals in contemporary glass apartments. With its refined aesthetics and superior craftsmanship, this laptop seamlessly integrates into your upscale workspace. Powered by advanced technology, it delivers seamless performance and efficient multitasking. Elevate your productivity with its intuitive interface and crystal-clear display. Redefine elegance and professionalism with the GlassMate Pro X2.',
            'image' => 'Ngo0A37F.jpg',
            'stock' => 30,
            'brand' => "ExecuTech",
            'release' => "2025",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'CrystalEdge Elite X3',
            'price' => 3699.99,
            'description' => 'Introducing the CrystalEdge Elite X3, an exquisite choice for professionals seeking sophistication in contemporary glass apartments. With its impeccable design and top-tier craftsmanship, this laptop seamlessly enhances your upscale workspace. Powered by cutting-edge technology, it delivers exceptional performance and seamless multitasking. Elevate your productivity with its intuitive interface and crystal-clear display. Redefine elegance and professionalism with the CrystalEdge Elite X3.',
            'image' => 'k48JcywU.jpg',
            'stock' => 35,
            'brand' => "ExecuTech",
            'release' => "2025",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'ApexX Pro Gaming Beast',
            'price' => 3999.99,
            'description' => 'Introducing the ApexX Pro Gaming Beast, the ultimate choice for gamers seeking unparalleled performance and immersive gaming experiences. With its sleek design and cutting-edge components, this laptop takes gaming to new heights. Powered by the latest technology and high-performance hardware, it delivers blistering speeds and seamless gameplay. Dominate the competition with lightning-fast response times and crystal-clear visuals. Elevate your gaming prowess with the ApexX Pro Gaming Beast.',
            'image' => 'fJXrjE3e.jpg',
            'stock' => 40,
            'brand' => "ApexTech",
            'release' => "2026",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'ApexX Pro Performance Laptop',
            'price' => 3999.99,
            'description' => 'Introducing the ApexX Pro Performance Laptop, a versatile powerhouse designed for gamers who demand top-tier performance and professionals who require productivity on-the-go. With its sleek and professional design, this laptop seamlessly transitions from intense gaming sessions to productive work environments. Powered by cutting-edge components and the latest technology, it delivers blistering speeds, seamless multitasking, and crystal-clear visuals. Elevate your gaming prowess and productivity with the ApexX Pro Performance Laptop.',
            'image' => 'fbyvwJU.jpg',
            'stock' => 40,
            'brand' => "ApexTech",
            'release' => "2026",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'EverGreen Executive Notebook',
            'price' => 4299.99,
            'description' => 'Introducing the EverGreen Executive Notebook, a harmonious blend of nature-inspired aesthetics and professional functionality. Crafted with sustainability in mind, this laptop embodies the tranquility of nature while catering to the demands of modern professionals. With its sleek design and eco-friendly materials, it seamlessly integrates into any business environment. Powered by cutting-edge components and innovative technology, it delivers exceptional performance, seamless multitasking, and stunning visuals. Embrace the synergy of nature and productivity with the EverGreen Executive Notebook.',
            'image' => 'znDHq5Y4.jpg',
            'stock' => 50,
            'brand' => "EcoTech",
            'release' => "2026",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'EcoSavvy Executive Laptop',
            'price' => 4499.99,
            'description' => 'Introducing the EcoSavvy Executive Laptop, a symbol of eco-consciousness and professional excellence. Crafted with sustainability at its core, this laptop blends nature-inspired aesthetics with high-performance functionality. Its sleek design and eco-friendly materials resonate with modern professionals seeking harmony with nature. Powered by cutting-edge components and innovative technology, it ensures seamless multitasking and delivers stunning visuals for productivity-driven tasks. Embrace sustainability without compromising on performance with the EcoSavvy Executive Laptop.',
            'image' => '0u8xw80S.jpg',
            'stock' => 60,
            'brand' => "EcoTech",
            'release' => "2026",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'GreenHarmony Business Notebook',
            'price' => 4599.99,
            'description' => 'Introducing the GreenHarmony Business Notebook, a testament to eco-consciousness and professional refinement. Crafted with sustainability in focus, this laptop seamlessly merges nature-inspired aesthetics with high-performance functionality. Its sleek and eco-friendly design resonates with modern professionals seeking harmony with the environment. Powered by cutting-edge components and innovative technology, it ensures seamless multitasking and delivers stunning visuals for productivity-driven tasks. Embrace sustainability while achieving peak performance with the GreenHarmony Business Notebook.',
            'image' => 'zoLCiGzf.jpg',
            'stock' => 70,
            'brand' => "EcoTech",
            'release' => "2026",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'FusionSpark Spectra Notebook',
            'price' => 4699.99,
            'description' => 'Introducing the FusionSpark Spectra Notebook, an embodiment of dynamic energy and vibrant aesthetics. Crafted to ignite creativity and excitement, this laptop features a sleek and modern design with mesmerizing colors and captivating patterns. Its lively appearance evokes a sense of inspiration and enthusiasm, making it the perfect companion for those who seek to stand out and embrace innovation. Powered by cutting-edge technology, it ensures seamless performance and delivers stunning visuals for both work and play. Unleash your creativity and ignite your passion with the FusionSpark Spectra Notebook.',
            'image' => 'l8TYzzKP.jpg',
            'stock' => 80,
            'brand' => "SparkTech",
            'release' => "2026",
            'available' => '1',
        ])->categories()->attach($laptopCategory);



        Product::create([
            'name' => 'CaféElite Business Laptop',
            'price' => 4999.99,
            'description' => 'Introducing the CaféElite Business Laptop, designed for professionals seeking sophistication in a coffee shop setting. With its sleek and minimalist design, this laptop exudes elegance and professionalism, making it the perfect companion for entrepreneurs and freelancers alike. Crafted with precision and attention to detail, it seamlessly integrates into any business environment, providing the power and performance needed to tackle demanding tasks. Powered by cutting-edge technology, it ensures seamless multitasking and delivers crisp visuals for productivity-driven work. Elevate your business experience with the CaféElite Business Laptop.',
            'image' => 'NuvsXmI1.jpg',
            'stock' => 60,
            'brand' => "EliteTech",
            'release' => "2026",
            'available' => '1',
        ])->categories()->attach($laptopCategory);
        Product::create([
            'name' => 'MetroPro Executive Laptop',
            'price' => 5299.99,
            'description' => 'Introducing the MetroPro Executive Laptop, meticulously crafted for professionals navigating the bustling streets of New York City. With its sleek and urban design, this laptop exudes sophistication and versatility, making it the perfect companion for entrepreneurs and executives on the go. Engineered with precision and attention to detail, it seamlessly integrates into the dynamic business landscape of the city, providing the power and performance needed to excel in demanding environments. Powered by cutting-edge technology, it ensures seamless multitasking and delivers crisp visuals for productivity-driven work. Elevate your business experience with the MetroPro Executive Laptop.',
            'image' => 'TvMAI08O.jpg',
            'stock' => 70,
            'brand' => "MetroTech",
            'release' => "2026",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'EcoVintage Collectivers Laptop',
            'price' => 6999.99,
            'description' => 'Introducing the EcoVintage Collector\'s Laptop, a timeless piece meticulously curated for enthusiasts in the green eco space. Inspired by minimalist design principles of bygone eras, this laptop embodies simplicity and elegance. Crafted with reclaimed materials and eco-friendly components, it reflects a commitment to sustainability and environmental consciousness. A true collector\'s item, it carries the charm of yesteryears while embracing modern eco-technology. Limited in availability, seize the opportunity to own a piece of sustainable computing history with the EcoVintage Collector\'s Laptop.',
            'image' => 'TARX4DA_.jpg',
            'stock' => 5,
            'brand' => "EcoTech",
            'release' => "2025",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'NeoGamer RGB Pro Laptop',
            'price' => 7999.99,
            'description' => 'Introducing the NeoGamer RGB Pro Laptop, a cutting-edge gaming machine designed for enthusiasts seeking the ultimate gaming experience. With its sleek and modern design, this laptop combines high-performance gaming capabilities with mesmerizing RGB backlighting. Crafted with the latest technology and premium components, it delivers blistering speeds and immersive visuals, ensuring you stay ahead of the competition. Customize the RGB lighting to match your gaming setup and elevate your gaming experience to new heights with the NeoGamer RGB Pro Laptop.',
            'image' => 'cQ5MI5tq.jpg',
            'stock' => 10,
            'brand' => "GamerTech",
            'release' => "2025",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'SummitElegance Hiker\'s Laptop',
            'price' => 7999.99,
            'description' => 'Introducing the SummitElegance Hiker\'s Laptop, a sleek and beautiful companion designed for adventurers seeking inspiration in the hills. With its elegant and minimalist design, this laptop blends seamlessly into nature, offering a perfect balance between style and functionality. Crafted with premium materials and cutting-edge technology, it delivers exceptional performance and stunning visuals, ensuring you stay connected and productive even in remote locations. Take your creativity to new heights and capture the essence of the outdoors with the SummitElegance Hiker\'s Laptop.',
            'image' => 'yosJ27lB.jpg',
            'stock' => 10,
            'brand' => "SummitTech",
            'release' => "2025",
            'available' => '1',
        ])->categories()->attach($laptopCategory);


        Product::create([
            'name' => 'UrbanEdge Modern Laptop',
            'price' => 8999.99,
            'description' => 'Introducing the UrbanEdge Modern Laptop, a sleek and stylish companion designed for contemporary professionals with discerning tastes. With its cutting-edge design and minimalist aesthetics, this laptop exudes sophistication and elegance. Crafted with premium materials and state-of-the-art technology, it seamlessly integrates into modern urban lifestyles, offering unparalleled performance and stunning visuals. Whether you\'re in the office or on the go, elevate your productivity and style with the UrbanEdge Modern Laptop.',
            'image' => 'MJRVNKwH.jpg',
            'stock' => 15,
            'brand' => "UrbanTech",
            'release' => "2025",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'CaféLawyer HyperModern Laptop',
            'price' => 9999.99,
            'description' => 'Introducing the CaféLawyer HyperModern Laptop, a cutting-edge device crafted for the modern professional in the bustling coffee shops of urban landscapes. With its hyper-modern design and sleek aesthetics, this laptop seamlessly blends into the fast-paced environment of a coffee-loving lawyer. Crafted with premium materials and the latest advancements in technology, it offers unparalleled performance and realism, empowering you to handle legal matters with precision and efficiency. Whether you\'re drafting contracts or meeting clients, elevate your productivity and professionalism with the CaféLawyer HyperModern Laptop.',
            'image' => 'NAwJcvL1.jpg',
            'stock' => 20,
            'brand' => "TechLaw",
            'release' => "2026",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        Product::create([
            'name' => 'EcoRustic Nature Laptop',
            'price' => 8999.99,
            'description' => 'Introducing the EcoRustic Nature Laptop, a harmonious blend of modern technology and natural inspiration for the eco-conscious hipster. With its rustic design elements and nature-inspired aesthetics, this laptop brings a touch of the outdoors to your digital experience. Crafted with sustainable materials and eco-friendly components, it embodies the essence of eco-living while offering powerful performance and reliability. Whether you\'re working from a cozy café or exploring the great outdoors, let the EcoRustic Nature Laptop be your companion on your hipster adventures.',
            'image' => 'ixdf1gor.jpg',
            'stock' => 15,
            'brand' => "EcoTech",
            'release' => "2026",
            'available' => '1',
        ])->categories()->attach($laptopCategory);

        // 5 mobiles seeded
        Product::create([
            'name' => 'iPhunny 13',
            'price' => 1399.00,
            'description' => 'Get ready to laugh your way through calls, messages, and apps with the side-splitting Apel iPhunny 13.',
            'image' => 'phonee1.webp',
            'stock' => '5',
            'brand' => "Apel",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'Samsong Galaxy S21',
            'price' => 1000.00,
            'description' => 'Experience the innovation of the Samsong Galaxy S21, an Android phone with amazing features that redefine the smartphone experience.',
            // 'image' => 'https://images.unsplash.com/photo-1610792516307-ea5acd9c3b00?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2Ftc3VuZyUyMHBob25lfGVufDB8fDB8fHwy',
            'image' => 'phonee2.webp',
            'stock' => '1',
            'brand' => "Samsong",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'Gugle Pixel 5',
            'price' => 699.00,
            'description' => 'Experience the innovation of the Gugle Pixel 5, an Android phone with amazing features that elevate your smartphone experience.',
            // 'image' => 'https://images.unsplash.com/photo-1612442443556-09b5b309e637?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Z29vZ2xlJTIwcGl4ZWx8ZW58MHx8MHx8fDA%3D',
            'image' => 'phonee3.webp',
            'stock' => '4',
            'brand' => "Gugle",
            'release' => "2020",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => '1Plus 9 Pro',
            'price' => 899.00,
            'description' => 'Discover the extraordinary with the 1Plus 9 Pro, an Android phone that redefines excellence.',
            // 'image' => 'https://www.oneplus.com/content/dam/oasis/page/os/oxygenos/4.png',
            'image' => 'phonee4.webp',
            'stock' => '100',
            'brand' => "1Plus",
            'release' => "2020",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'Hawai P40 Pro',
            'price' => 799.00,
            'description' => 'Embark on a journey of innovation with the Hawai P40 Pro, an Android phone that pushes the boundaries of technology.',
            // 'image' => 'https://consumer.huawei.com/content/dam/huawei-cbg-site/common/mkt/pdp/phones/p40-pro/images/design/design-intro-e@2x.webp',
            'image' => 'phonee5.webp',
            'stock' => '6',
            'brand' => "Hawai",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'EcoVibe GreenPhone',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Embrace sustainability with the EcoVibe GreenPhone, the environmentally conscious choice for your communication needs. Made from recycled materials and designed for minimal environmental impact, this phone lets you stay connected while reducing your carbon footprint. Join the eco-friendly revolution and make a positive impact on the planet with the EcoVibe GreenPhone.',
            'image' => 'NgyDh7u2.jpg',
            'stock' => 10,
            'brand' => "EcoTech",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'TacticalSurvivor EcoPhone',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Conquer the wild with the TacticalSurvivor EcoPhone, built to withstand the toughest environments and accompany you on your boldest adventures. Engineered for durability and resilience, this rugged phone is designed to thrive in extreme conditions, from the depths of the jungle to the peaks of the mountains. With its military-grade construction and eco-friendly features, including recycled materials and minimal environmental impact, the TacticalSurvivor EcoPhone is your ultimate companion for off-grid exploration and eco-conscious living.',
            'image' => 'RPhoIXhD.jpg',
            'stock' => 15,
            'brand' => "TacticalTech",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'ExecuCafé BusinessPhone',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Elevate your business conversations with the ExecutiveCafé BusinessPhone, designed for professionals who demand style and functionality in their communication devices. Crafted with sleek lines and premium materials, this phone blends seamlessly into the sophisticated ambiance of coffee shops and boardrooms alike. Whether you\'re sealing deals over lattes or brainstorming ideas with colleagues, the ExecutiveCafé BusinessPhone ensures crystal-clear communication and effortless multitasking. Stay connected and make a statement of professionalism with the ExecutiveCafé BusinessPhone.',
            'image' => 'sdsd.jpg',
            'stock' => 20,
            'brand' => "ExecuTech",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'SurvivalSatellite TacticalPhone',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Conquer the wilderness with the SurvivalSatellite TacticalPhone, your ultimate companion for outdoor adventures. Built to military specifications and designed for extreme durability, this rugged phone is ready to withstand the harshest conditions, from rugged terrain to inclement weather. Equipped with satellite communication capabilities, it ensures reliable connectivity even in remote areas where traditional networks fail. Whether you\'re camping, hunting, or facing survival challenges, the SurvivalSatellite TacticalPhone keeps you connected and safe. Embrace the spirit of adventure with confidence and stay prepared for anything with the SurvivalSatellite TacticalPhone.',
            'image' => 'hjkjek3.jpg',
            'stock' => 15,
            'brand' => "TacticalTech",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'CapturePro CameraPhone',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Introducing the CapturePro CameraPhone, your go-to companion for capturing life\'s precious moments with stunning clarity and detail. Designed with photography enthusiasts in mind, this smartphone features a high-quality camera system that excels in any lighting condition, from bright daylight to low-light environments. With advanced imaging technology and image stabilization features, it ensures every shot is crisp, vibrant, and Instagram-worthy. Whether you\'re snapping landscapes, portraits, or selfies, the CapturePro CameraPhone delivers professional-grade results that will impress even the most discerning photographers. Elevate your photography game and document your adventures with the CapturePro CameraPhone.',
            'image' => 'j2lj33.jpg',
            'stock' => 20,
            'brand' => "TechVision",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'TechVision Mobile',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Introducing the TechVision Mobile, a versatile smartphone designed to meet all your communication and entertainment needs. With its sleek design and powerful performance, this smartphone offers a seamless user experience for browsing the web, streaming videos, gaming, and staying connected on social media. Equipped with advanced features and cutting-edge technology, it ensures smooth multitasking and responsiveness for all your everyday tasks. Whether you’re working, playing, or capturing memories, the TechVision Mobile is your reliable companion for every moment.',
            'image' => 'jlkkj3jj34.jpg',
            'stock' => 20,
            'brand' => "TechVision",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'Visionaire SleekStyle Phone',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Introducing the Visionaire SleekStyle Phone, a stunning masterpiece of design and innovation that transcends ordinary smartphones. With its mesmerizing beauty and sleek, minimalist contours, this phone exudes elegance and sophistication. Crafted with precision and attention to detail, it captivates the eye and delights the senses. Equipped with advanced technology and seamless functionality, it offers a seamless user experience for all your communication and entertainment needs. Whether you’re browsing the web, streaming videos, or capturing memories, the Visionaire SleekStyle Phone combines style and substance in perfect harmony.',
            'image' => 'jlkj23.jpg',
            'stock' => 20,
            'brand' => "Visionaire",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'StyloTech Lumina Smartphone',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Introducing the StyloTech Lumina Smartphone, a sleek and sophisticated device that redefines the boundaries of elegance and innovation in the smartphone industry. With its captivating design and minimalist aesthetic, this phone stands as a symbol of modern style and technological prowess. Crafted with meticulous attention to detail, it seamlessly combines beauty and functionality, offering a delightful user experience for everyday communication and entertainment needs. Elevate your mobile experience with the StyloTech Lumina Smartphone, where sophistication meets performance in perfect harmony.',
            'image' => 'hj2332.jpg',
            'stock' => 20,
            'brand' => "StyloTech",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'StyloTech SoundMaster Smartphone',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Introducing the StyloTech SoundMaster Smartphone, a cutting-edge device engineered for audio enthusiasts who demand the highest quality sound on the go. With its sleek design and advanced audio features, this smartphone delivers an immersive listening experience like no other. Equipped with premium audio components and advanced sound processing technology, it ensures crystal-clear audio reproduction and rich, dynamic soundscapes. Whether you\'re streaming music, watching videos, or taking calls, the StyloTech SoundMaster Smartphone takes your audio experience to the next level.',
            'image' => 'jg2hj3.jpg',
            'stock' => 20,
            'brand' => "StyloTech",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'NeonTech SonicVision Smartphone',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Introducing the NeonTech SonicVision Smartphone, a visionary marvel of modern technology designed to propel you into the future. With its sleek, aerodynamic design and advanced holographic display, this smartphone offers a glimpse into tomorrow\'s world. Equipped with state-of-the-art sonic processing technology and neural interface capabilities, it delivers an unparalleled audiovisual experience that transcends reality. Whether you\'re navigating augmented realities, communicating via neural networks, or immersing yourself in immersive sonic landscapes, the NeonTech SonicVision Smartphone is your gateway to the future.',
            'image' => 'hhj34h34.jpg',
            'stock' => 20,
            'brand' => "NeonTech",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($mobileCategory);

        Product::create([
            'name' => 'NeonTech Bespoke Edition Smartphone',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Introducing the NeonTech Bespoke Edition Smartphone, a collector\'s item crafted with exquisite attention to detail and bespoke style. Each unit of this limited edition smartphone is meticulously handcrafted to perfection, featuring unique design elements and premium materials that set it apart from mass-produced devices. With its sleek, aerodynamic silhouette and luxurious finish, this smartphone is a statement of refined taste and sophistication. Whether displayed in a collection or used as a symbol of exclusivity, the NeonTech Bespoke Edition Smartphone is a true masterpiece that transcends ordinary technology.',
            'image' => 'hkjj3k34.jpg',
            'stock' => 10,
            'brand' => "NeonTech",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($mobileCategory);


        
        

        // 5 monitors seeded
        Product::create([
            'name' => 'Dell UltraSharp U2720QWERTY',
            'price' => 699.00,
            'description' => 'Experience crystal-clear visuals with the Dell UltraSharp U2720QWERTY, a 27-inch 4K UHD monitor designed to elevate your viewing experience.',
            'image' => 'https://gfx3.senetic.com/akeneo-catalog/a/3/d/f/a3dfec2c830f8f76a74f53985ae4ebc65e89bac8_1627564_DELL_U2720Q_image1',
            'stock' => '11',
            'brand' => "Dell",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($monitorCategory);

        Product::create([
            'name' => 'LG UltraGear 27GN950',
            'price' => 799.00,
            'description' => 'Elevate your gaming and multimedia experience with the LG UltraGear 27GN950, a 27-inch 4K UHD monitor that offers stunning visuals and immersive gameplay.',
            'image' => 'https://www.lg.com/content/dam/channel/wcms/uk/images/monitors/27GN950-B_AEK_EEUK_UK_C/MNT-27GN950-Basic.jpg',
            'stock' => '12',
            'brand' => "LG",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($monitorCategory);

        Product::create([
            'name' => 'Samsong Odyssey G7',
            'price' => 899.00,
            'description' => 'Experience gaming like never before with the Samsong Odyssey G7, a 27-inch 4K UHD monitor designed to take your gaming experience to the next level.',
            'image' => 'https://image-us.samsung.com/SamsungUS/samsungbusiness/computing/monitors/gaming/32--odyssey-g7-gaming-monitor-lc32g75tqsnxza/LC32G75TQSNXZA_001_Front_Black_1600x1200.jpg?$product-details-jpg$',
            'stock' => '29',
            'brand' => "Samsong",
            'release' => "2020",
            'available' => '1',
        ])->categories()->attach($monitorCategory);

        Product::create([
            'name' => 'Acer Predator X27',
            'price' => 999.00,
            'description' => 'Experience stunning visuals with the Acer Predator X27, a 27-inch 4K UHD monitor designed to enhance your viewing experience. With HDR support and a sleek design, this monitor delivers exceptional clarity and vibrant colors for both work and entertainment.',
            'image' => 'https://i.pcmag.com/imagery/reviews/074fs6JJYgfDgoy3QwAHelw-8.fit_scale.size_760x427.v1569478388.jpg',
            'stock' => '36',
            'brand' => "Acer",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($monitorCategory);

        Product::create([
            'name' => 'Asus ROG Swift PG27UQ',
            'price' => 1099.00,
            'description' => 'Immerse yourself in gaming with the Asus ROG Swift PG27UQ, a 27-inch 4K UHD monitor that offers stunning visuals and smooth gameplay. With HDR support and a high refresh rate, this monitor ensures every detail is crisp and vibrant for an unparalleled gaming experience.',
            'image' => 'https://rog.asus.com/media/1534242864535.jpg',
            'stock' => '49',
            'brand' => "Asus",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($monitorCategory);


        // 5 tablets seeded
        Product::create([
            'name' => 'Appletizer iPad Air',
            'price' => 599.00,
            'description' => 'Enjoy the versatility of the Appletizer iPad Air, a thin and light tablet featuring the powerful A14 Bionic chip. Whether you\'re working, creating, or relaxing, this iPad offers seamless performance and stunning visuals to elevate your digital experience.',
            // 'image' => 'https://images.unsplash.com/photo-1604399852419-f67ee7d5f2ef?q=80&w=1931&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'image' => 'tablet.webp',
            'stock' => '10',
            'brand' => "Apel",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'Samsong Galaxy Tab S7',
            'price' => 499.00,
            'description' => 'Immerse yourself in productivity and entertainment with the Samsong Galaxy Tab S7, a sleek and powerful tablet designed to elevate your digital experience. With its thin and light design, this tablet is easy to carry wherever you go. Equipped with the A14 Bionic chip, it delivers seamless performance for multitasking, gaming, and more.',
            // 'image' => 'https://fdn2.gsmarena.com/vv/pics/samsung/samsung-galaxy-tab-s7-01.jpg',
            'image' => 'tablet2.webp',
            'stock' => '3',
            'brand' => "Samsong",
            'release' => "2020",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'Huawei MatePad Pro',
            'price' => 399.00,
            'description' => 'Experience the ultimate in productivity and entertainment with the Huawei MatePad Pro, a sleek and powerful tablet designed to enhance your digital lifestyle. Featuring a thin and lightweight design, this tablet is perfect for on-the-go use. Equipped with advanced technology, including the A14 Bionic chip, it delivers fast and seamless performance for all your tasks and activities.',
            // 'image' => 'https://fdn2.gsmarena.com/vv/pics/huawei/matepad-11-pro-2022-1.jpg',
            'image' => 'tablet3.webp',
            'stock' => '2',
            'brand' => "Hawai",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'Lenovo Tab P11 Pro',
            'price' => 299.00,
            'description' => 'Immerse yourself in the world of entertainment and productivity with the Lenovo Tab P11 Pro. Featuring a sleek and lightweight design, this tablet is perfect for on-the-go use. Equipped with advanced features and the powerful A14 Bionic chip, it delivers smooth performance for all your tasks and activities.',
            // 'image' => 'https://fdn2.gsmarena.com/vv/pics/lenovo/lenovo-tab-p11-pro-2.jpg',
            'image' => 'tablet4.webp',
            'stock' => '300',
            'brand' => "Lenovo",
            'release' => "2020",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'Samsung Galaxy Tab S6 Lite',
            'price' => 199.00,
            'description' => 'Experience the perfect blend of style and performance with the Samsung Galaxy Tab S6 Lite. With its slim and lightweight design, this tablet is ideal for everyday use. Powered by the advanced A14 Bionic chip, it delivers fast and responsive performance for all your needs, from streaming to productivity.',
            // 'image' => 'https://fdn2.gsmarena.com/vv/pics/samsung/galaxy-tab-s6-lite-1.jpg',
            'image' => 'tablet5.webp',
            'stock' => '43',
            'brand' => "Samsong",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        // credit: https://perchance.org/gmg64zkuoc

        Product::create([
            'name' => 'BizScribe Pro Tablet',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Elevate your business productivity with the BizScribe Pro Tablet. This tablet is meticulously crafted to meet the demands of modern professionals, offering seamless note-taking, document annotation, and sketching capabilities with its advanced stylus. Its slim and lightweight design ensures easy portability, while the powerful A14 Bionic chip guarantees fast and responsive performance for all your business needs. Stay organized and efficient with the BizScribe Pro Tablet.',
            'image' => 'skdjskdj34.jpg',
            'stock' => 43,
            'brand' => "BizTech",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'NatureScribe Elite Tablet',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Immerse yourself in the natural beauty of productivity with the NatureScribe Elite Tablet. Meticulously designed to harmonize with nature, this tablet combines professional-grade functionality with the serenity of the outdoors. Its advanced stylus allows for seamless note-taking, document annotation, and sketching, empowering you to capture your ideas with precision and clarity. With its sleek and lightweight design, the NatureScribe Elite Tablet is the perfect companion for professionals seeking inspiration from the world around them. Experience the tranquility of nature while staying organized and efficient with the NatureScribe Elite Tablet.',
            'image' => 'jlksdlsk23.jpg',
            'stock' => 43,
            'brand' => "EnviroTech",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'TerraTough Tactical Tablet',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Embark on your professional missions with the TerraTough Tactical Tablet, an indispensable tool designed to thrive in the harshest environments. Engineered with military-grade ruggedness, this tablet combines the rugged durability of tactical gear with the versatility of professional-grade functionality. Its advanced stylus allows for seamless note-taking, document annotation, and sketching, even in extreme conditions. With its reinforced construction and waterproof design, the TerraTough Tactical Tablet withstands the rigors of fieldwork, ensuring reliability and performance in any situation. Stay connected and productive amidst nature\'s challenges with the TerraTough Tactical Tablet.',
            'image' => 'jlklj34.jpg',
            'stock' => 43,
            'brand' => "TerraTech",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'AquaShield Tactical Tablet',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Conquer the elements with the AquaShield Tactical Tablet, a rugged companion engineered to withstand the toughest conditions. Built with military-grade waterproofing technology, this tablet ensures uncompromised performance even in the most challenging environments. Its advanced stylus allows for seamless note-taking, document annotation, and sketching, regardless of weather conditions. With reinforced construction and a waterproof design, the AquaShield Tactical Tablet offers peace of mind, knowing your device can handle any water-related task. Stay connected and productive in wet environments with the AquaShield Tactical Tablet.',
            'image' => 'jklsddskj23w.jpg',
            'stock' => 43,
            'brand' => "TerraTech",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'BizConnect Pro Tablet',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Optimize your business connectivity with the BizConnect Pro Tablet, meticulously crafted for seamless integration into professional environments. This tablet offers advanced features and intuitive functionality to streamline your workflow and enhance productivity. With its sleek design and versatile capabilities, including note-taking and document management, the BizConnect Pro Tablet is the perfect tool for busy professionals. Stay organized and efficient with this business-focused tablet that keeps you connected and productive wherever you go.',
            'image' => 'lksdjksldj3.jpg',
            'stock' => 43,
            'brand' => "BizTech",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'ColorVivid Elite Tablet',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Immerse yourself in a world of vibrant colors and stunning visuals with the ColorVivid Elite Tablet. Boasting cutting-edge OLED display technology, this tablet delivers unparalleled color accuracy, contrast, and clarity, bringing your content to life like never before. Meticulously crafted with high-tech precision, its sleek and modern design enhances the viewing experience while reflecting the epitome of sophistication. With advanced features and intuitive functionality, including seamless note-taking and document management, the ColorVivid Elite Tablet is the ultimate companion for professionals who demand the best in both performance and aesthetics. Elevate your productivity and creativity with this breathtakingly beautiful tablet that redefines the standards of excellence.',
            'image' => 'jdkfjk4.jpg',
            'stock' => 43,
            'brand' => "TechVision",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'NanoVision Pro Tablet',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Experience the future of compact productivity with the NanoVision Pro Tablet. Despite its small size, this tablet packs a punch with its cutting-edge features and powerful performance. Equipped with a vibrant OLED display, it offers stunning visuals and crisp clarity for immersive viewing. Its sleek and modern design makes it the perfect companion for professionals on the go, seamlessly fitting into your lifestyle with its compact form factor. Whether you\'re taking notes, managing documents, or staying connected, the NanoVision Pro Tablet delivers exceptional performance in a compact package. Elevate your productivity and efficiency with this pocket-sized powerhouse from NanoTech.',
            'image' => 'hjkjdkj4.webp',
            'stock' => 43,
            'brand' => "NanoVision",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'CaféBiz Compact Tablet',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Enhance your business productivity with the CaféBiz Compact Tablet, designed to seamlessly integrate into your busy coffee shop work environment. This tablet combines compact convenience with powerful performance, offering a perfect solution for professionals on the go. With its sleek design and portable form factor, it\'s the ideal companion for entrepreneurs, freelancers, and remote workers seeking productivity outside the office. Whether you\'re drafting proposals, conducting virtual meetings, or managing your tasks, the CaféBiz Compact Tablet ensures efficiency and reliability. Elevate your coffee shop work experience with this business-oriented tablet from NanoTech.',
            'image' => 'kjsldkjsdl.jpg',
            'stock' => 43,
            'brand' => "CaféBiz",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'NatureGlow Slim Tablet',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Immerse yourself in the beauty of nature with the NatureGlow Slim Tablet, crafted to complement your serene surroundings with its sleek and minimalist design. This tablet embodies the harmony between technology and nature, offering a slim and lightweight profile that effortlessly blends into any outdoor setting. Whether you\'re capturing the breathtaking scenery, sketching your creative ideas, or simply enjoying a moment of tranquility, the NatureGlow Slim Tablet provides a perfect canvas for your inspirations. Elevate your connection with nature and experience the essence of beauty with this slim and elegant tablet.',
            'image' => 'jhjsd23wewe.jpg',
            'stock' => 12,
            'brand' => "NatureGlow",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'BizHorizon Pro Tablet',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Stay ahead in the business world with the BizHorizon Pro Tablet, designed to enhance your professional productivity and efficiency. With its powerful performance and intuitive features, this tablet is tailored for the demands of modern business environments. Its sleek and sophisticated design exudes professionalism, making it the perfect companion for meetings, presentations, and on-the-go productivity tasks. Whether you\'re managing projects, collaborating with colleagues, or staying organized with your tasks, the BizHorizon Pro Tablet empowers you to achieve more in your business endeavors. Elevate your business capabilities and streamline your workflow with this versatile and reliable tablet.',
            'image' => 'hdfkjedfkj34.jpg',
            'stock' => 12,
            'brand' => "BizHorizon",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);

        Product::create([
            'name' => 'ProfessionaLink Elite Tablet',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Step into the future of professional productivity with the ProfessionaLink Elite Tablet, meticulously crafted to elevate your business performance to new heights. Designed with cutting-edge technology and innovative features, this tablet is tailored to meet the unique demands of modern professionals. Its sleek and modern design exudes sophistication, making it the ultimate statement piece for executives and entrepreneurs alike. Whether you\'re leading meetings, collaborating with teams, or managing projects, the ProfessionaLink Elite Tablet empowers you to work smarter and achieve your goals with precision and efficiency. Revolutionize your business workflow and stay ahead of the curve with this premium and versatile tablet.',
            'image' => 'lkjsdkl34.jpg',
            'stock' => 12,
            'brand' => "ProfessionaLink",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);


        Product::create([
            'name' => 'ExecutiveForge Pro Tablet',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Unleash the full potential of your business endeavors with the ExecutiveForge Pro Tablet, meticulously engineered to meet the demanding requirements of modern professionals. Imbued with cutting-edge technology and advanced features, this tablet redefines the standards of excellence in business productivity. Its sleek and contemporary design radiates sophistication, making it the quintessential tool for executives and entrepreneurs seeking to make a bold statement in the boardroom. Whether you\'re strategizing, collaborating, or executing tasks, the ExecutiveForge Pro Tablet empowers you to navigate the complexities of modern business with unparalleled efficiency and precision. Elevate your professional journey and stay ahead of the competition with this premium-grade tablet.',
            'image' => 'jksdjsd34.jpg',
            'stock' => 12,
            'brand' => "ExecutiveForge",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($tabletCategory);


        // 5 consoles seeded

        Product::create([
            'name' => 'PrayStation 5',
            'price' => 499.00,
            'description' => 'Experience the future of gaming with the PrayStation 5, a next-gen gaming console that brings immersive 4K graphics to your living room. Dive into breathtaking worlds and enjoy lightning-fast loading times with its powerful hardware and cutting-edge technology.',
            'image' => 'console.png',
            'stock' => '506',
            'brand' => "Sony",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'Xbox Series X',
            'price' => 499.00,
            'description' => 'Immerse yourself in the world of gaming with the Xbox Series X, a next-gen console that delivers stunning 4K graphics and unparalleled performance. With its sleek design and innovative features, it\'s the ultimate gaming experience for every gamer.',
            'image' => 'console1.png',
            'stock' => '409',
            'brand' => "Microsoft",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'PrayStation 4',
            'price' => 399.00,
            'description' => 'Immerse yourself in the world of gaming with the PrayStation 4, a next-gen gaming console that brings stunning 4K graphics and unparalleled entertainment to your fingertips. With its powerful hardware and innovative features, it\'s the ultimate gaming experience for every gamer.',
            'image' => 'console2.png',
            'stock' => '276',
            'brand' => "Sony",
            'release' => "2020",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'Nintendo Switch',
            'price' => 299.00,
            'description' => 'Experience the thrill of gaming with the Nintendo Switch, a next-gen gaming console that offers versatility and excitement in one package. Whether you\'re playing at home or on the go, its innovative design and captivating games make every moment unforgettable.',
            'image' => 'console4.png',
            'stock' => '303',
            'brand' => "Nintendo",
            'release' => "2022",
            'available' => '1',
        ])->categories()->attach($consoleCategory);


        Product::create([
            'name' => 'Nintendo Switch Lite',
            'price' => 199.00,
            'description' => 'Discover the joy of gaming with the Nintendo Switch Lite, a compact and lightweight console that offers endless entertainment on the go. With its vibrant display and wide selection of games, it\'s the perfect companion for gaming enthusiasts of all ages.',
            'image' => 'console5.png',
            'stock' => '48',
            'brand' => "Nintendo",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        
        Product::create([
            'name' => 'RetroJoy Portable Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Relive the nostalgia of classic gaming with the RetroJoy Portable Console, a compact and lightweight device that brings back cherished memories of your favorite retro games. With its retro-inspired design and wide selection of classic titles, it\'s the perfect companion for nostalgic gamers seeking to revisit the golden age of gaming.',
            'image' => 'kskjkkjskljdssdlk34dflnfd.jpg',
            'stock' => '50',
            'brand' => "RetroJoy",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);
        
        Product::create([
            'name' => 'LuxuryGold Retro Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Indulge in the epitome of luxury gaming with the LuxuryGold Retro Console, a lavish masterpiece crafted for discerning gamers who appreciate the finer things in life. Immerse yourself in the opulence of gaming with this exclusive gold-plated console, meticulously designed to exude sophistication and elegance. With its retro-inspired design and exquisite craftsmanship, it offers a timeless gaming experience that transcends generations. Elevate your gaming collection with the LuxuryGold Retro Console and bask in the ultimate luxury of gaming.',
            'image' => 'kjklsdjskldksdsdj34.jpg',
            'stock' => '50',
            'brand' => "LuxuryGold",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'PocketLux Retro Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Experience luxury gaming on the go with the PocketLux Retro Console, a compact marvel designed for discerning gamers who prioritize portability without compromising on opulence. This exquisite console features a luxurious gold-plated exterior, exuding sophistication and elegance in every detail. Despite its small size, the PocketLux Retro Console delivers a timeless gaming experience with its retro-inspired design and exquisite craftsmanship. Whether you\'re commuting, traveling, or simply enjoying downtime, elevate your gaming collection with the PocketLux Retro Console and indulge in luxury gaming wherever you go.',
            'image' => 'kjskdjdsl32erds.jpg',
            'stock' => '50',
            'brand' => "PocketLux",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        
        Product::create([
            'name' => 'NeoLux Futuristic Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Step into the future of gaming with the NeoLux Futuristic Console, a revolutionary device that combines cutting-edge technology with luxurious design. Featuring sleek lines and innovative materials, this console redefines the gaming experience with its futuristic style and unparalleled performance. The NeoLux console boasts advanced features such as holographic displays, immersive augmented reality, and lightning-fast processing power, offering gamers an unprecedented level of immersion and excitement. Whether you\'re exploring virtual worlds, battling foes, or embarking on epic quests, the NeoLux Futuristic Console transports you to a gaming utopia where the possibilities are endless.',
            'image' => 'nsdlkfdfkdkf34.jpg',
            'stock' => '230',
            'brand' => "NeoLux",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'NeoLux Futuristic Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Step into the future of gaming with the NeoLux Futuristic Console, a revolutionary device that combines cutting-edge technology with luxurious design. Featuring sleek lines and innovative materials, this console redefines the gaming experience with its futuristic style and unparalleled performance. The NeoLux console boasts advanced features such as holographic displays, immersive augmented reality, and lightning-fast processing power, offering gamers an unprecedented level of immersion and excitement. Whether you\'re exploring virtual worlds, battling foes, or embarking on epic quests, the NeoLux Futuristic Console transports you to a gaming utopia where the possibilities are endless.',
            'image' => 'sdkskdj34.jpg',
            'stock' => '230',
            'brand' => "NeoLux",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'MicroVision Futuristic Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Experience the future of gaming with the MicroVision Futuristic Console, a groundbreaking device that seamlessly integrates cutting-edge technology with sleek design. Crafted with compact dimensions and innovative materials, this console revolutionizes gaming with its futuristic aesthetics and exceptional performance. Featuring advanced features such as holographic displays, immersive augmented reality, and lightning-fast processing power, the MicroVision console offers gamers an unparalleled level of immersion and excitement. Whether you\'re navigating virtual worlds, engaging in intense battles, or embarking on epic quests, the MicroVision Futuristic Console transports you to a gaming utopia where the boundaries are limitless.',
            'image' => 'jkkjjkjkhjkjhj43.webp',
            'stock' => '230',
            'brand' => "MicroVision",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        
        Product::create([
            'name' => 'NanoVision Compact Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Immerse yourself in the future of gaming with the NanoVision Compact Console, a revolutionary device that packs cutting-edge technology into a compact form factor. Designed with sleek dimensions and advanced materials, this console redefines gaming with its compact size and outstanding performance. With features like holographic displays, immersive augmented reality, and lightning-fast processing power, the NanoVision console delivers an unparalleled gaming experience. Whether you\'re exploring virtual worlds, engaging in intense battles, or embarking on epic quests, the NanoVision Compact Console transports you to a gaming paradise where possibilities are limitless.',
            'image' => 'lksdkjksdl.jpg',
            'stock' => '230',
            'brand' => "NanoVision",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'EleganceVision Gaming Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Immerse yourself in the world of gaming luxury with the EleganceVision Gaming Console, a stunning masterpiece that combines cutting-edge technology with timeless beauty. Crafted with meticulous attention to detail and sleek aesthetics, this console is a symbol of sophistication and elegance. Featuring a mesmerizing design and advanced features such as holographic displays, immersive augmented reality, and lightning-fast processing power, the EleganceVision console offers an unparalleled gaming experience. Whether you\'re navigating virtual worlds, engaging in intense battles, or embarking on epic quests, the EleganceVision Gaming Console transports you to a realm of gaming beauty where every moment is a visual masterpiece.',
            'image' => 'lkjsdjsld34.jpg',
            'stock' => '230',
            'brand' => "EleganceVision",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'EternalGlow Gaming Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Embark on an endless journey of gaming excellence with the EternalGlow Gaming Console, a radiant masterpiece that seamlessly blends cutting-edge technology with timeless elegance. Crafted with meticulous attention to detail and refined aesthetics, this console sets new standards for sophistication and luxury. Boasting a captivating design and advanced features such as holographic displays, immersive augmented reality, and lightning-fast processing power, the EternalGlow console offers an unmatched gaming experience. Whether you\'re traversing virtual landscapes, engaging in thrilling battles, or embarking on epic quests, the EternalGlow Gaming Console transports you to a realm of eternal brilliance where every gaming moment shines with unparalleled beauty.',
            'image' => 'kjsldkjsklkd23.jpg',
            'stock' => '230',
            'brand' => "EternalGlow",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'ElysiumArc Gaming Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Embark on an extraordinary gaming journey with the ElysiumArc Gaming Console, a sublime masterpiece that seamlessly blends cutting-edge technology with timeless elegance. Crafted with meticulous attention to detail and refined aesthetics, this console sets new standards for sophistication and luxury. Boasting a captivating design and advanced features such as holographic displays, immersive augmented reality, and lightning-fast processing power, the ElysiumArc console offers an unmatched gaming experience. Whether you\'re traversing virtual landscapes, engaging in thrilling battles, or embarking on epic quests, the ElysiumArc Gaming Console transports you to a realm of eternal brilliance where every gaming moment shines with unparalleled beauty.',
            'image' => 'lksjdkl23.jpg',
            'stock' => '230',
            'brand' => "ElysiumArc",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'CelestialSphere Gaming Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Embark on an extraordinary gaming journey with the CelestialSphere Gaming Console, a sublime masterpiece that seamlessly blends cutting-edge technology with timeless elegance. Crafted with meticulous attention to detail and refined aesthetics, this console sets new standards for sophistication and luxury. Boasting a captivating design and advanced features such as holographic displays, immersive augmented reality, and lightning-fast processing power, the CelestialSphere console offers an unmatched gaming experience. Whether you\'re traversing virtual landscapes, engaging in thrilling battles, or embarking on epic quests, the CelestialSphere Gaming Console transports you to a realm of eternal brilliance where every gaming moment shines with unparalleled beauty.',
            'image' => 'kljsdj34.jpg',
            'stock' => '230',
            'brand' => "CelestialSphere",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'StellarSphere Gaming Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Embark on an extraordinary gaming journey with the StellarSphere Gaming Console, a sublime masterpiece that seamlessly blends cutting-edge technology with timeless elegance. Crafted with meticulous attention to detail and refined aesthetics, this console sets new standards for sophistication and luxury. Boasting a captivating design and advanced features such as holographic displays, immersive augmented reality, and lightning-fast processing power, the StellarSphere console offers an unmatched gaming experience. Whether you\'re traversing virtual landscapes, engaging in thrilling battles, or embarking on epic quests, the StellarSphere Gaming Console transports you to a realm of eternal brilliance where every gaming moment shines with unparalleled beauty.',
            'image' => 'skjdlskjd34.jpg',
            'stock' => '230',
            'brand' => "StellarSphere",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'EternalSphere Gaming Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Embark on an extraordinary gaming journey with the EternalSphere Gaming Console, a sublime masterpiece that seamlessly blends cutting-edge technology with timeless elegance. Crafted with meticulous attention to detail and refined aesthetics, this console sets new standards for sophistication and luxury. Boasting a captivating design and advanced features such as holographic displays, immersive augmented reality, and lightning-fast processing power, the EternalSphere console offers an unmatched gaming experience. Whether you\'re traversing virtual landscapes, engaging in thrilling battles, or embarking on epic quests, the EternalSphere Gaming Console transports you to a realm of eternal brilliance where every gaming moment shines with unparalleled beauty.',
            'image' => 'kljskdkds34.jpg',
            'stock' => '230',
            'brand' => "EternalSphere",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'CelestialArc Gaming Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Embark on an extraordinary gaming journey with the CelestialArc Gaming Console, a sublime masterpiece that seamlessly blends cutting-edge technology with timeless elegance. Crafted with meticulous attention to detail and refined aesthetics, this console sets new standards for sophistication and luxury. Boasting a captivating design and advanced features such as holographic displays, immersive augmented reality, and lightning-fast processing power, the CelestialArc console offers an unmatched gaming experience. Whether you\'re traversing virtual landscapes, engaging in thrilling battles, or embarking on epic quests, the CelestialArc Gaming Console transports you to a realm of eternal brilliance where every gaming moment shines with unparalleled beauty.',
            'image' => 'kjsdsjkdk34.webp',
            'stock' => '230',
            'brand' => "CelestialArc",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'EternalArc Gaming Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Embark on an extraordinary gaming journey with the EternalArc Gaming Console, a sublime masterpiece that seamlessly blends cutting-edge technology with timeless elegance. Crafted with meticulous attention to detail and refined aesthetics, this console sets new standards for sophistication and luxury. Boasting a captivating design and advanced features such as holographic displays, immersive augmented reality, and lightning-fast processing power, the EternalArc console offers an unmatched gaming experience. Whether you\'re traversing virtual landscapes, engaging in thrilling battles, or embarking on epic quests, the EternalArc Gaming Console transports you to a realm of eternal brilliance where every gaming moment shines with unparalleled beauty.',
            'image' => 'kjlsdldslk32.jpg',
            'stock' => '230',
            'brand' => "EternalArc",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'CelestialGlow Gaming Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Embark on an extraordinary gaming journey with the CelestialGlow Gaming Console, a sublime masterpiece that seamlessly blends cutting-edge technology with timeless elegance. Crafted with meticulous attention to detail and refined aesthetics, this console sets new standards for sophistication and luxury. Boasting a captivating design and advanced features such as holographic displays, immersive augmented reality, and lightning-fast processing power, the CelestialGlow console offers an unmatched gaming experience. Whether you\'re traversing virtual landscapes, engaging in thrilling battles, or embarking on epic quests, the CelestialGlow Gaming Console transports you to a realm of eternal brilliance where every gaming moment shines with unparalleled beauty.',
            'image' => 'jksjdd34redss.jpg',
            'stock' => '230',
            'brand' => "CelestialGlow",
            'release' => "2021",
            'available' => '1',
        ])->categories()->attach($consoleCategory);

        Product::create([
            'name' => 'EternalGlow Gaming Console',
            'price' => round(rand(50000, 140000) / 100),
            'description' => 'Embark on an extraordinary gaming journey with the EternalGlow Gaming Console, a sublime masterpiece that seamlessly blends cutting-edge technology with timeless elegance. Crafted with meticulous attention to detail and refined aesthetics, this console sets new standards for sophistication and luxury. Boasting a captivating design and advanced features such as holographic displays, immersive augmented reality, and lightning-fast processing power, the EternalGlow console offers an unmatched gaming experience. Whether you\'re traversing virtual landscapes, engaging in thrilling battles, or embarking on epic quests, the EternalGlow Gaming Console transports you to a realm of eternal brilliance where every gaming moment shines with unparalleled beauty.',
            'image' => 'lsdkjkdj34dkdf.jpg',
            'stock' => '230',
            'brand' => "EternalGlow",
            'release' => "2021",
            'available' => '1',
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


        // create a single normal user so we can test the order history
        DB::table('users')->insert([
            'email' => 'test@test.com',
            'email_verified_at' => null,
            'password' => bcrypt('1'),
            'profile_image' => null,
            'is_admin' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        UserAddress::create([
            'full_name' => 'Tony Stark',
            'address_line_1' => '123 Fake Street',
            'address_line_2' => 'Fake Town',
            'city' => 'Faketown',
            'post_code' => 'FA1 1KE',
            'country' => 'England',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // create a single payemnt method for the user

        UserPayments::create([
            'card_number' => '1234567890123456',
            'card_holder_name' => 'Test User',
            'expiry_date' => '12/23',
            'cvv' => '123',
            'card_type' => 'visa',
            'color' => '#1a1f71',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // create a single admin user
        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'email_verified_at' => null,
            'password' => bcrypt('1'),
            'profile_image' => null,
            'is_admin' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        UserAddress::create([
            'full_name' => 'Admin Admin',
            'address_line_1' => '123 Admin Street',
            'address_line_2' => 'Admin Town',
            'city' => 'Admintown',
            'post_code' => 'AD1 1KE',
            'country' => 'England',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // create a single payemnt method for the admin
        UserPayments::create([
            'card_number' => '1234567890123456',
            'card_holder_name' => 'Admin User',
            'expiry_date' => '12/23',
            'cvv' => '123',
            'card_type' => 'visa',
            'color' => '#1a1f71',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);





        // Create orders
        Orders::create([
            'total_before_discount' => 1000,
            'discount_amount' => 0,
            'total_after_discount' => 1000,
            'status' => 'pending',
            'order_date' => now(),
            'tracking_number' => uniqid(),
            'user_address_id' => 1,
            'user_payment_id' => 1,
            'discount_id' => null,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'address_line_1' => '9 Lake Street',
            'address_line_2' => 'Lake Town',
            'city' => 'Laketown',
            'post_code' => 'LA1 1KE',
            'country' => 'England',
        ]);

        OrderItems::create([
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'order_id' => 1,
            'product_id' => 1,
        ]);

        Orders::create([
            'total_before_discount' => 2000,
            'discount_amount' => 0,
            'total_after_discount' => 2000,
            'status' => 'processing',
            'order_date' => now(),
            'tracking_number' => uniqid(),
            'user_address_id' => 1,
            'user_payment_id' => 1,
            'discount_id' => null,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()->addDay(),
            'address_line_1' => '1 Test Street',
            'address_line_2' => 'Test Town',
            'city' => 'Testtown',
            'post_code' => 'TE1 1KE',
            'country' => 'England',
        ]);

        OrderItems::create([
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'order_id' => 2,
            'product_id' => 2,
        ]);

        Orders::create([
            'total_before_discount' => 3000,
            'discount_amount' => 0,
            'total_after_discount' => 3000,
            'status' => 'completed',
            'order_date' => now(),
            'tracking_number' => uniqid(),
            'user_address_id' => 1,
            'user_payment_id' => 1,
            'discount_id' => null,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()->addDays(2)->addHours(4)->addMinutes(34),
            'address_line_1' => '335 Seefood Street',
            'address_line_2' => 'Seefood Town',
            'city' => 'Seedfood Town',
            'post_code' => 'SW2 9LT',
            'country' => 'Wales',
        ]);

        OrderItems::create([
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'order_id' => 3,
            'product_id' => 3,
        ]);

        // create a cancelled order
        Orders::create([
            'total_before_discount' => 4000,
            'discount_amount' => 0,
            'total_after_discount' => 4000,
            'status' => 'cancelled',
            'order_date' => now(),
            'tracking_number' => uniqid(),
            'user_address_id' => 1,
            'user_payment_id' => 1,
            'discount_id' => null,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()->addHours(18)->addMinutes(34)->addSeconds(12),
            'address_line_1' => '858 Roberston Road',
            'address_line_2' => 'Fake Town',
            'city' => 'Leeds',
            'post_code' => 'LS1 1KE',
            'country' => 'England',
        ]);

        OrderItems::create([
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'order_id' => 4,
            'product_id' => 4,
        ]);

        // Macbook air Review 
        Rating::create([
            'user_id' => '1',
            'prod_id' => '1',
            'stars_rated' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Review::create([
            'user_id' => '1',
            'prod_id' => '1',
            'user_review' => 'The laptop delivered was in really good condition but battery life significantly dropped after about 2 months of use.
            It can barely last 40 minutes.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // HP Spectre x360 review by Test user
        Rating::create([
            'user_id' => '1',
            'prod_id' => '4',
            'stars_rated' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Review::create([
            'user_id' => '1',
            'prod_id' => '4',
            'user_review' => 'Test User Review: Great Product!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // HP Spectre x360 review by Admin
        Rating::create([
            'user_id' => '2',
            'prod_id' => '4',
            'stars_rated' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Review::create([
            'user_id' => '2',
            'prod_id' => '4',
            'user_review' => 'Admin Review: Fast Delivery!!!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // MacBook Pro Review by Test user
        Rating::create([
            'user_id' => '1',
            'prod_id' => '2',
            'stars_rated' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Review::create([
            'user_id' => '1',
            'prod_id' => '2',
            'user_review' => 'Great condition! Really happy with my Mac book pro! Highly recommend this website for quality products.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // MacBook Pro Review by Admin
        Rating::create([
            'user_id' => '2',
            'prod_id' => '2',
            'stars_rated' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Review::create([
            'user_id' => '2',
            'prod_id' => '2',
            'user_review' => 'Excellent product but poor battery life overall and not worth the price in my opinion!.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Dell XPS 13 Review by Admin User
        Rating::create([
            'user_id' => '2',
            'prod_id' => '3',
            'stars_rated' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Review::create([
            'user_id' => '2',
            'prod_id' => '3',
            'user_review' => "Seriously impressed with this machine. The spec is no surprise, it's what I ordered",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
