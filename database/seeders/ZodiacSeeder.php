<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZodiacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zodiaks = [];

        $zodiaks[] = ['title' => 'Водолей','logo'=>'aquarius.jpg'];
        $zodiaks[] = ['title' => 'Рыбы','logo'=>'pisces.jpg'];
        $zodiaks[] = ['title' => 'Овен','logo'=>'aries.jpg'];
        $zodiaks[] = ['title' => 'Телец','logo'=>'taurus.jpg'];
        $zodiaks[] = ['title' => 'Близнецы','logo'=>'gemini.jpg'];
        $zodiaks[] = ['title' => 'Рак','logo'=>'cancer.jpg'];
        $zodiaks[] = ['title' => 'Лев','logo'=>'leo.jpg'];
        $zodiaks[] = ['title' => 'Дева','logo'=>'virgo.jpg'];
        $zodiaks[] = ['title' => 'Весы','logo'=>'libra.jpg'];
        $zodiaks[] = ['title' => 'Скорпион','logo'=>'scorpio.jpg'];
        $zodiaks[] = ['title' => 'Стрелец','logo'=>'sagittarius.jpg'];
        $zodiaks[] = ['title' => 'Козерог','logo'=>'capricorn.jpg'];

        \DB::table('zodiaks')->insert($zodiaks);

    }
}
