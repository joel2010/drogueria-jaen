<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CreateUserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Sistema';
        $user->email = 'admin@drogueriajaen.com.pe';
        $user->password = bcrypt('PassRand$3333');
        $user->email_verified_at = now();
        $user->remember_token = Str::random(32);
        $user->save();
    }
}
