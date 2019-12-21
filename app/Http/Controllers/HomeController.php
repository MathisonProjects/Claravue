<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\settingsModel;

class HomeController extends Controller
{
    public function __construct() { }

    public function index() {
        $settingList = settingsModel::where('key', 'metaTitle')
            ->orWhere('key', 'metaTagDescription')
            ->orWhere('key', 'metaTagKeywords')
            ->get();
        $settings = [
            'baseUrl' => env('APP_URL')
        ];
        foreach ($settingList as $key => $setting) {
            $settings[$setting->key] = $setting->value;
        }

        return view('index', compact('settings'));
    }
}
