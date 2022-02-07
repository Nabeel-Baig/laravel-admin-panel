<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Nabeel Baig',
                'email'          => 'mathswithnabeel@gmail.com',
                'password'       => Hash::make('Google@6233'),
                'phone'          => '923333906233',
                'avatar'         => '/assets/uploads/users/avatar-3.jpg',
                'is_authenticate'=> 0,
                'remember_token' => null,
                'created_at'     => '2021-06-21 07:11:07',
                'updated_at'     => '2021-06-21 07:11:07',
            ],
            [
                'id'             => 2,
                'name'           => 'Admin',
                'email'          => 'nabeel@outsourcetoasia.co',
                'password'       => Hash::make('Abcd1234'),
                'phone'          => '923333906233',
                'avatar'         => '/assets/uploads/users/avatar-3.jpg',
                'is_authenticate'=> 0,
                'remember_token' => null,
                'created_at'     => '2021-06-21 07:11:07',
                'updated_at'     => '2021-06-21 07:11:07',
            ],
        ];

        User::insert($users);
    }
}
