<?php

namespace Database\Seeders;

use App\Models\RoleModel;
use App\Models\tableRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            "name" => "khalid",
            "email" => "khalidgara@gmail.com",
            "password" => "123",


        ]);


        tableRole::create([

            "name" => "admin",
        ]);
    }
}
