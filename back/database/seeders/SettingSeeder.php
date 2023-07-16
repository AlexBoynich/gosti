<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::query()->firstOrCreate(
            [
                'section' => 'main',
                'key' => 'Пороговая стоимость',
            ],
            [
                'value' => '1500',
                'description' => 'Пороговая сумма заказа для расчёта стоимости доставки'
            ]
        );

        Setting::query()->firstOrCreate(
            [
                'section' => 'files',
                'key' => 'Конфиденциальность',
            ],
            [
                'value' => null,
                'description' => 'Политика конфиденциальности'
            ]
        );

        Setting::query()->firstOrCreate(
            [
                'section' => 'files',
                'key' => 'Кейтеринг',
            ],
            [
                'value' => null,
                'description' => 'Кейтеринг'
            ]
        );
    }
}
