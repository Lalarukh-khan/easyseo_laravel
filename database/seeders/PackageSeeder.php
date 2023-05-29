<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'plan_code' => 'FRP0',
                'title' => 'Free',
                'words' => '5000',
                'price' => '0',
            ],
            [
                'plan_code' => 'P20',
                'title' => 'Professional-20',
                'words' => '20000',
                'price' => '19.90',
            ],
            [
                'plan_code' => 'P50',
                'title' => 'Professional-50',
                'words' => '50000',
                'price' => '29.90',
            ],
            [
                'plan_code' => 'P200',
                'title' => 'Professional-200',
                'words' => '200000',
                'price' => '79.90',
            ],
            [
                'plan_code' => 'P500',
                'title' => 'Professional-500',
                'words' => '500000',
                'price' => '129.90',
            ],
        );

        Package::insert($data);
    }
}
