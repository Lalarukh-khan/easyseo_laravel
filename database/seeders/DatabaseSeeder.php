<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admin::create(['first_name' => 'Super','last_name' => 'Admin','email'=>'admin@admin.com','username'=>'admin','password'=>bcrypt(123456),'user_type'=>'admin']);
        $this->call([
            PlaygroundSettingsSeeder::class,
            PackageSeeder::class,
            ModeSeeder::class,
        ]);
    }
}
