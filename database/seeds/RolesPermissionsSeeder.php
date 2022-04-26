<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
       
        // create roles and assign created permissions

        // this can be done as separate statements
       /* $role = Role::create(['name' => 'super-admin']);
        $role = Role::create(['name' => 'candidato']);
        $role = Role::create(['name' => 'recrutador-demandante']);
        $role = Role::create(['name' => 'admin-demandante']);
        $role = Role::create(['name' => 'secretario-demandante']);
        $role = Role::create(['name' => 'rh']);*/

        DB::table('roles')->insert(
            [
                ['name' => 'super-admin', 'guard_name' => 'web'],
                ['name' =>'candidato', 'guard_name' => 'web'],
                ['name' =>'recrutador-demandante', 'guard_name' => 'web'],
                ['name' =>'admin-demandante', 'guard_name' => 'web'],
                ['name' =>'secretario-demandante', 'guard_name' => 'web'],
                ['name' =>'rh', 'guard_name' => 'web']
                
            ]
            );
    }
}
