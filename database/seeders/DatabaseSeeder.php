<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'email'      => 'admin@admin.ru',
            'password'   => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}