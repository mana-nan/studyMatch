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
        DB::table('users')->insert([
            ['name' => 'ジョブズ',
            'email' => 'user1@example.com',
            'sex' => '0',
            'self_introduction' => 'ジョブズです',
            'img_name' => 'sample001.jpg',
            'password' => Hash::make('password123'),
            ],
            ['name' => 'ザッカーバーグ',
            'email' => 'user2@example.com',
            'sex' => '1',
            'self_introduction' => 'ザッカーバーグです',
            'img_name' => 'sample002.jpg',
            'password' => Hash::make('password123'),
            ]
        ]);
    }
}
