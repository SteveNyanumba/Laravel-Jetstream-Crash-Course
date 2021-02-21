<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'Administrator';
        $admin->email = 'reach@stevenyanumba.com';
        $admin->password = Hash::make('1234567890');
        $admin->isAdmin = true;
        $admin->save();

    }
}
