<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
         'name' => 'Cirilo Silva',
         'email' => 'admin@admin.com',
         'password' => bcrypt('12345'),
        ]);
        User::create([
         'name' => 'Carlos Nascimento',
         'email' => 'email@email.com',
         'password' => bcrypt('12345678'),
        ]);
    }
}
