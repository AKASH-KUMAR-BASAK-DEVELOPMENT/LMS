<?php

namespace Database\Seeders;

use App\Models\CompanyModel;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            ['id' => 1, 'name' => 'Default Company'],
        ];
        foreach ($companies as $key => $values){
            CompanyModel::firstOrCreate(
                [
                    'id'   => $companies[$key]['id'],
                ],
                [
                    'name' => $companies[$key]['name'],
                ]
            );
        }
    }
}
