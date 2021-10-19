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
                'email'          => 'nabeel@outsourcetoasia.co',
                'password'       => Hash::make('Abcd1234'),
                'phone'          => '+92-333-3906233',
                'avatar'         => 'assets/images/users/avatar-2.jpg',
                'is_authenticate'=> 0,
                'remember_token' => null,
                'created_at'     => '2021-06-21 07:11:07',
                'updated_at'     => '2021-06-21 07:11:07',
            ],
        ];

        User::insert($users);
    }
}
