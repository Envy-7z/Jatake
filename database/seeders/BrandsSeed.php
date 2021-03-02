<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Brand;

class BrandsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $brands = [
            [
                'name'=>'Honda',
                'desc'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo accusantium exercitationem pariatur nostrum dolore iure facilis quisquam porro magnam. Aspernatur blanditiis quisquam molestias delectus tempore. Libero suscipit veritatis in?',
                'link'=>[],
                'img'=>["https://pngimage.net/wp-content/uploads/2018/06/honda-logo-moto-png.png"],
                'rating'=>5,
            ],[
                'name'=>'Suzuki',
                'desc'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo accusantium exercitationem pariatur nostrum dolore iure facilis quisquam porro magnam. Aspernatur blanditiis quisquam molestias delectus tempore. Libero suscipit veritatis in?',
                'link'=>[],
                'img'=>["https:\/\/seeklogo.com\/images\/S\/suzuki-logo-5311518DD9-seeklogo.com.png"],
                'rating'=>5,
            ],[
                'name'=>'Yamaha',
                'desc'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo accusantium exercitationem pariatur nostrum dolore iure facilis quisquam porro magnam. Aspernatur blanditiis quisquam molestias delectus tempore. Libero suscipit veritatis in?',
                'link'=>[],
                'img'=>["https:\/\/i.ebayimg.com\/images\/g\/dcgAAOxyUylTRpvd\/s-l300.jpg"],
                'rating'=>5,
            ],[
                'name'=>'Merk 2',
                'desc'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo accusantium exercitationem pariatur nostrum dolore iure facilis quisquam porro magnam. Aspernatur blanditiis quisquam molestias delectus tempore. Libero suscipit veritatis in?',
                'link'=>[],
                'img'=>["https://moedah.com/wp-content/uploads/2017/05/Aki-Furukawa11.jpg","https://cdn.pixabay.com/photo/2014/03/25/15/25/car-battery-296788_960_720.png"],
                'rating'=>5,
            ],[
                'name'=>'Merk 3',
                'desc'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo accusantium exercitationem pariatur nostrum dolore iure facilis quisquam porro magnam. Aspernatur blanditiis quisquam molestias delectus tempore. Libero suscipit veritatis in?',
                'link'=>[],
                'img'=>["https://moedah.com/wp-content/uploads/2017/05/Aki-Furukawa11.jpg","https://cdn.pixabay.com/photo/2014/03/25/15/25/car-battery-296788_960_720.png"],
                'rating'=>5,
            ],
        ];
        foreach($brands as $d)
        {
            Brand::create($d);
        }
    }
}
