<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name' => 'admin',
                'email' => 'a@mail.com',
                'is_admin' => '1',
                'password' => bcrypt('111111111'),
            ],
            [
                'name' => 'user',
                'email' => 'b@mail.com',
                'is_admin' => '0',
                'password' => bcrypt('111111111'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
