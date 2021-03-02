<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Admins;
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
        //
        $admin = [
            [
                'name' => 'Admin',
                'password' => 'admin',
                'email' => 'admin@jatake.com',
            ],
        ];

        foreach($admin as $d)
        {
            $d['password'] = Hash::make($d['password']);
            $admin = Admins::create($d);
            $admin->createToken('authToken');
        }
    }
}
