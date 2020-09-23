<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        try{
            $settings = include(base_path('database/seeds/raw/latest_settings_table_data.array.php'));
            foreach($settings as $setting) {
                $settingObj = Setting::find($setting['name']);
                $settingObj = $settingObj ? $settingObj->update($setting) : Setting::create($setting);
            }

        } catch (Exception $exception) {
            \Illuminate\Support\Facades\Log::error($exception->getMessage());
            $content = serialize([]);
        }
    }
}

