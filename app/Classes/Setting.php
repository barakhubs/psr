<?php
namespace App\Classes\Setting;

use App\Models\Setting as ModelsSetting;

class Setting {
    public static function getSetting() {
        $settings = ModelsSetting::first();

        if($settings !== null) {
            return $settings;
        }

        return null;
    }
}
