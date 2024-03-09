<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermissionsToRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizer_lvl1 = Role::where('name', 'organizer_lvl1')->first();
        $organizer_lvl2 = Role::where('name', 'organizer_lvl2')->first();
        $organizer_lvl3 = Role::where('name', 'organizer_lvl3')->first();
        $organizer_lvl4 = Role::where('name', 'organizer_lvl4')->first();

        $organizer_lvl1->givePermissionTo('add event');

        $organizer_lvl2->givePermissionTo('add event');
        $organizer_lvl2->givePermissionTo('edit event');

        $organizer_lvl3->givePermissionTo('add event');
        $organizer_lvl3->givePermissionTo('edit event');
        $organizer_lvl3->givePermissionTo('delete event');

        $organizer_lvl4->givePermissionTo('add event');
        $organizer_lvl4->givePermissionTo('edit event');
        $organizer_lvl4->givePermissionTo('delete event');
        $organizer_lvl4->givePermissionTo('accepte reservations');
        $organizer_lvl4->givePermissionTo('see statistics');
    }
}
