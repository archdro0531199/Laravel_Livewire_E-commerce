<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
		
		'name' => 'Administrator',
		'email' => 'admin@admin.com',
		'password' => bcrypt('1qaz2wsx'),
		'role_id' => '1',
		]);
    }
}
