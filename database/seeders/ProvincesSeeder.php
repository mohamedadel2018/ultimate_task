<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provinces;
class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Provinces::create([
            'name' => 'القاهرة'
        ]);
        Provinces::create([
            'name' => 'الإسكندرية'
        ]);
        Provinces::create([
            'name' => 'بورسعيد'
        ]);
        Provinces::create([
            'name' => 'الأقصر'
        ]);
        Provinces::create([
            'name' => 'قنا'
        ]);
        Provinces::create([
            'name' => 'سوهاج'
        ]);
        Provinces::create([
            'name' => 'الجيزة'
        ]);
        Provinces::create([
            'name' => 'الدقهلية'
        ]);
        Provinces::create([
            'name' => 'دمياط'
        ]);
        Provinces::create([
            'name' => 'كفر الشيخ'
        ]);
        Provinces::create([
            'name' => 'السويس'
        ]);
        Provinces::create([
            'name' => 'الغربية'
        ]);
        Provinces::create([
            'name' => 'الفيوم'
        ]);
        Provinces::create([
            'name' => 'المنوفية'
        ]);
        Provinces::create([
            'name' => 'مطروح'
        ]);
        Provinces::create([
            'name' => 'الوادي الجديد'
        ]);
        Provinces::create([
            'name' => 'المنيا'
        ]);
        Provinces::create([
            'name' => 'أسوان'
        ]);
        Provinces::create([
            'name' => 'البحيرة'
        ]);
        Provinces::create([
            'name' => 'بني سويف'
        ]);
        Provinces::create([
            'name' => 'الإسماعيلية'
        ]);
        Provinces::create([
            'name' => 'أسيوط'
        ]);
        Provinces::create([
            'name' => 'شمال سيناء'
        ]);
        Provinces::create([
            'name' => 'جنوب سيناء'
        ]);
        Provinces::create([
            'name' => 'البحر الأحمر'
        ]);
        Provinces::create([
            'name' => 'القليوبية'
        ]);
    }
}
