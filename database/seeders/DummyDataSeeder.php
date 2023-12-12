<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // تعبئة الجدول الأول
        for ($i = 0; $i < 10; $i++) {
            DB::table('user')->insert([
                'name' => $faker->name,
                'email' => $faker->address,
                'password' => '123456789',
                'roles_name' => $faker->reles_name,
                // قم بإضافة المزيد من الأعمدة هنا
            ]);
        }

        // // تعبئة الجدول الثاني
        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('table2')->insert([
        //         'column1' => $faker->sentence,
        //         'column2' => $faker->paragraph,
        //         // قم بإضافة المزيد من الأعمدة هنا
        //     ]);
        // }
    }
}
