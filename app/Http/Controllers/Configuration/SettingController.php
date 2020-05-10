<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $this->viewData['settings'] = Setting::oldest()->get();
        return view('configuration.settings.index', $this->viewData);
    }

    public function store(Request $request)
    {
        $settings = Setting::all();
        foreach ($settings as $setting) {
            if($setting->type == 'image') {
                $this->saveUploadedImage($setting, $request);
                continue;
            }
            $setting->value = $request->{$setting->name};
            $setting->save();
        }
        Cache::flush();
        flash("Setting successfully updated")->success();
        return redirect()->back();
    }

    private function saveUploadedImage(Setting $setting, Request $request)
    {
        if($request->{$setting->name}) {
            $setting->value = $request->{$setting->name}->store("settings/{$setting->name}");
            $setting->save();
        }
    }


    public function updateSeeder()
    {
        $settings = Setting::latest()->get();
        $settingsArray = [];
        foreach($settings as $setting) {
            $setting = $setting->toArray();
            $settingsArray[] = $setting;
        }
        $path = base_path('database/seeds/raw/latest_settings_table_data.array.php');
        $content = sprintf("<?php \nreturn %s;" , var_export($settingsArray, true));
        file_put_contents($path, $content);
        flash("Setting table backup successful")->success();

        return back();
    }
}
