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
         $user = User::factory()->create();

         UserProfile::factory()->create([
             'user_id' => $user->id
         ]);

         UserSettings::factory()->create([
             'user_id' => $user->id
         ]);

         UserPicture::factory()->create([
             'user_id' => $user->id
         ]);
    }
}
