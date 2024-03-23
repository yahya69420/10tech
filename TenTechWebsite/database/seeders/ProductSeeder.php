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
