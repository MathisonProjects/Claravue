<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            'key' => 'name',
            'value' => ''
        ]);
    }
}
