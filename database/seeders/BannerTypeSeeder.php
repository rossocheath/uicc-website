<?php

namespace Database\Seeders;

use App\Models\BannerType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannerData = config('uicc.banner_type');
        foreach ($bannerData as $data) {
            $banner = BannerType::where('name', '=', $data['name'])->first();
            if (empty($banner)) {
                BannerType::create($data);
            }
        }
    }
}
