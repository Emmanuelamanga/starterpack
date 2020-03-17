<?php

use Illuminate\Database\Seeder;
use App\PackageCategory;

class PackageCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PackageCategory::class, 2)->create();
        //  $cat = [
        //     [
        //        'title'=>'Math',
        //        'discription'=>'Mathematics',
        //     ],
        // ];

        // foreach ($cat as $key => $value) {
        //     PackageCategory::create($value);

        // }
    }
}
