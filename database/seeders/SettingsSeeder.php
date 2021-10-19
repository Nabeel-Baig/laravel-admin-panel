<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'Your Website Name',
            'title' => 'Your Website Title',
            'logo' => 'assets/images/logo.svg',
            'favico' => 'assets/images/logo.svg',
            'email' => 'nabeel@outsourcetoasia.co',
            'phone' => '+92-333-3906233',
            'address' => 'Gulistan-e-Jauhar, Karachi.',
            'link' => 'outsourcetoasia.io',
        ]);
    }
}
