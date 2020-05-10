<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class EnvController extends Controller
{
    public function index() {
        $envExamples = $this->getEnvironments('.env.example');
        $environments = $this->getEnvironments();
        $environments = array_merge($envExamples, $environments);
        return view('configuration.environments.index', compact('environments'));
    }

    public function store(Request $request) {
        $lines = [];
        $data = $request->except(['_token', '__comments']);
        foreach($data as $key => $value) {
            $comment =  $request->__comments[$key] ?? '';
            $value = addslashes($value);
            $lines[] = "{$key}=\"$value\"" . ($comment ? "          #$comment" : '');
        }
        $contents = join("\n", $lines);
        $this->backupEnv();
        $this->writeEnv($contents);
        Cache::flush();
        flash("Environment file updated and cache flashed")->success();
        return redirect()->back();
    }


    private function writeEnv($contents) {
        return file_put_contents(base_path('.env'), $contents);
    }

    private function backupEnv() {
        Storage::putFileAs('env_backups', new File(base_path('.env')),  '.env.backup.' . date('Y_m_d_h_i_s'));
    }

    private function getEnvironments($file = '.env') {
        $envContent = file_get_contents(base_path($file));
        $envLines  = array_filter(explode("\n", $envContent));
        $envLinesIndexed  = [];

        foreach($envLines as $line) {
                list($key, $value) = explode('=', $line , 2);
                list($value, $comment) = strstr($value,'#') >  strstr($value,'"') ? explode('#', $value , 2) : [$value, ''] ;
                $value = trim($value);
                $firstChar = substr($value, 0, 1);
                $lastChar = substr($value, strlen($value)-1, 1);

                if($firstChar == '"' && $lastChar == '"') {
                    $value = substr($value, 1, strlen($value) - 2);
                }
                $key = trim($key);
                $envLinesIndexed[$key] = [
                    'key' => $key,
                    'value' => $value,
                    'comment' => $comment
                ];
            };

        return $envLinesIndexed;
    }
}
