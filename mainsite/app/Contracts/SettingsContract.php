<?php

namespace App\Contracts;

use Illuminate\Support\Facades\DB;

class SettingsContract
{
    public static function siteSettingAll()
    {
        $getAllSettings = DB::table('site_settings')->get();
        foreach ($getAllSettings as $setting) {
            $settings[$setting->name] = $setting->value;
        }
        return $settings;
    }
    public static function backendTheme()
    {
        return DB::table('site_settings')->where('name', 'backendTheme')->first()->value;
    }

    public static function frontendTheme()
    {
        return DB::table('site_settings')->where('name', 'frontendTheme')->first()->value;
    }
    public static function getBackendThemeList()
    {
        $path = public_path() . '/assets/backend';
        $dir  = new \DirectoryIterator($path);
        $dirs = [];
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                $dirs[] = $fileinfo->getFilename();
            }
        }
        return $dirs;
    }
    public static function getFrontendThemeList()
    {
        $path = public_path() . '/assets/frontend';
        $dir  = new \DirectoryIterator($path);
        $dirs = [];
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                $dirs[] = $fileinfo->getFilename();
            }
        }
        return $dirs;
    }
}
