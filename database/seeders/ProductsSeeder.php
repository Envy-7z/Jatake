<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Product;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productsArr = [
            [   'short'=>'abc-1',
                'name'=>'Aki Test 1',
                'brand_id'=>1,
                'desc'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo accusantium exercitationem pariatur nostrum dolore iure facilis quisquam porro magnam. Aspernatur blanditiis quisquam molestias delectus tempore. Libero suscipit veritatis in?',
                'link'=>['sp'=>'test1','bl'=>'test2'],
                'type'=>'MOTOR',
                'img'=>["https://moedah.com/wp-content/uploads/2017/05/Aki-Furukawa11.jpg","https://cdn.pixabay.com/photo/2014/03/25/15/25/car-battery-296788_960_720.png"],
                'qty'=>1,
                'price'=>100000,],

            [   'short'=>'abc-2',
                'name'=>'Aki Test 2',
                'brand_id'=>2,
                'desc'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo accusantium exercitationem pariatur nostrum dolore iure facilis quisquam porro magnam. Aspernatur blanditiis quisquam molestias delectus tempore. Libero suscipit veritatis in?',
                'link'=>[],
                'type'=>'MOBIL',
                'img'=>["https://imgx.gridoto.com/crop/205x0:2932x1742/700x465/filters:watermark(file/2017/gridoto/img/watermark.png,5,5,60)/photo/gridoto/2017/11/02/2801287331.jpg"],
                'qty'=>1,
                'price'=>500000,],
            [   'short'=>'',
                'name'=>'Aki Test 3',
                // 'brandId'=>'',
                'desc'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo accusantium exercitationem pariatur nostrum dolore iure facilis quisquam porro magnam. Aspernatur blanditiis quisquam molestias delectus tempore. Libero suscipit veritatis in?',
                'link'=>[],
                'type'=>'MOTOR',
                'img'=>["https://jogjatokoaki.com/wp-content/uploads/2019/04/Gambar-aki-GS-Astra-sumber-ig-@sd_warbun1.jpg"],
                'qty'=>1,
                'price'=>10000000,],
            [   'short'=>'abc-4',
                'name'=>'Aki Test 5',
                'brand_id'=>1,
                'desc'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo accusantium exercitationem pariatur nostrum dolore iure facilis quisquam porro magnam. Aspernatur blanditiis quisquam molestias delectus tempore. Libero suscipit veritatis in?',
                'link'=>[],
                'type'=>'MOBIL',
                'img'=>[],
                'qty'=>1,
                'price'=>'',],
        ];
        foreach($productsArr as $d)
        {
            Product::create($d);
        }
    }
}
