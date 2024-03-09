<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'add event',
            'edit event',
            'delete event',
            'accepte reservations',
            'see statistics'
        ];

        foreach($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
