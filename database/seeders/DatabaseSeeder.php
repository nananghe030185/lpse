<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\UserGroup;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([LPSESeeder::class, KLPDSeeder::class, SatkerSeeder::class, SettingSeeder::class]);

        $user = User::create([
            'id' => 726,
            'name' => 'Nanang Hermawan',
            'email_verified_at' => now(),
            'username' => 'adminlpse',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('rahasia1985'),
            'remember_token' => Str::random(10),
            'is_admin' => true,
            'group_id' => 1,
            'state' => true
        ]);

        UserProfile::create([
            'user_id' => $user->id,
            'state' => true,
            'nama' => $user->name,
            'perusahaan' => 'PT Geoland Mapping Technology',
            'kbli' => '731120',
            'kata_kunci' => 'batas wilayah',
            'whatsapp' => '087821996965',
            'notif_whatsapp' => true,
            'notif_telegram' => true,
            'telegram' => '',
            'notif_email' => true,
            'masa_berlaku' => now(),
        ]);

        UserGroup::create(['name' => 'Super Admin']);
        UserGroup::create(['name' => 'Registered']);
        UserGroup::create(['name' => 'Personal']);
        UserGroup::create(['name' => 'Corporate']);
        UserGroup::create(['name' => 'Special']);
    }
}
