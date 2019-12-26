<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Автор неизвестен',
                'email' => 'unknown@test.com',
                'password' => bcrypt(str_random(16)),
            ], ['name' => 'Василий',
                'email' => 'vasia@test.com',
                'password' => bcrypt(str_random('123123')),
            ],
        ];
        DB::table('users')->insert($data);

    }
}
