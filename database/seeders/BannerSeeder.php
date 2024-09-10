<?php

namespace Database\Seeders;

use App\Models\BannerModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            ['id' => 1, 'title' => 'Default Banner', 'short_description' => 'Default short description', 'description' => 'default description', 'notification' => 'default notification', 'image' => 'default image', 'video' => 'default video', 'video' => 'default link', 'button' => 'Default Button'],
        ];
        foreach ($banners as $key => $values){
            BannerModel::firstOrCreate(
                [
                    'id'   => $banners[$key]['id'],
                ],
                [
                    'title' => $banners[$key]['title'],
                    'short_description' => $banners[$key]['short_description'],
                    'description' => $banners[$key]['description'],
                    'notification' => $banners[$key]['notification'],
                    'image' => $banners[$key]['image'],
                    'video' => $banners[$key]['video'],
                    'button' => $banners[$key]['button'],
                ]
            );
        }
    }
}
