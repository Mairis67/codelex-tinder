<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserPicture;
use App\Models\UserProfile;
use App\Models\UserSettings;
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
         User::factory()->create();

         UserProfile::factory()->create();

         UserSettings::factory()->create();

         UserPicture::factory()->create();
    }
}
