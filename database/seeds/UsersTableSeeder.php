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
            'username'=>'satou',
            'mail'=>'us1@atlas.com',
            'password'=>Hash::make('password'),
            'bio'=>'はじめまして',
        ]);

        DB::table('users')->insert([
            'username'=>'test00',
            'mail'=>'00@atlas.com',
            'password'=>Hash::make('password'),
            'bio'=>'おやすみ',
        ]);

        DB::table('users')->insert([
            'username'=>'test01',
            'mail'=>'01@atlas.com',
            'password'=>Hash::make('password'),
            'bio'=>'おはよう',
        ]);

        DB::table('users')->insert([
            'username'=>'test02',
            'mail'=>'02@atlas.com',
            'password'=>Hash::make('password'),
            'bio'=>'ハロー',
        ]);

        DB::table('users')->insert([
            'username'=>'test03',
            'mail'=>'03@atlas.com',
            'password'=>Hash::make('password'),
            'bio'=>'こんにちは',
        ]);

    }
}
