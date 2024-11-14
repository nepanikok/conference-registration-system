<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::updateOrCreate(['name' => 'klientas']);
        Role::updateOrCreate(['name' => 'darbuotojas']);
        Role::updateOrCreate(['name' => 'administratorius']);
    }
}