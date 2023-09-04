<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_settings')->insert([
            ['name' => 'companyName', 'value' => 'sample', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'siteName', 'value' => 'sample', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'siteEmail', 'value' => 'sample@sample.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'supportEmail', 'value' => 'sample@sample.com', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'sitePhone', 'value' => '0123456789', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'companyAddress', 'value' => 'xxx-xxx-xxx', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'siteLogo', 'value' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'siteFavIcon', 'value' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'socialMedia', 'value' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'backendTheme', 'value' => 'inspinia', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'frontendTheme', 'value' => '', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'recaptchaStatus', 'value' => '0', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
