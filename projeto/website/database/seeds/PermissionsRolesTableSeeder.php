<?php

use Illuminate\Database\Seeder;

class PermissionsRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ControleAcesso\PermissionRole::create(['role_id' => 2, 'permission_id' => 7]);
    	\App\Models\ControleAcesso\PermissionRole::create(['role_id' => 2, 'permission_id' => 8]);
    	\App\Models\ControleAcesso\PermissionRole::create(['role_id' => 3, 'permission_id' => 8]);
    }
}
