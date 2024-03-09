<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'user',
            'denied_for_user',
            'organizer_lvl1',
            'organizer_lvl2',
            'organizer_lvl3',
            'organizer_lvl4',
            'admin'
        ];

        foreach($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }
    }
}
