<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        static $settings;

        if (!$settings) {
            $settings = Setting::all()->pluck('value', 'key');
        }

        return $settings[$key] ?? $default;
    }
}
