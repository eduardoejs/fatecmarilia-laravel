<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\ControleAcesso\Permission::create(['name' => 'add_user_system', 'description' => 'Adicionar usuario no sistema']);
        \App\Models\ControleAcesso\Permission::create(['name' => 'del_user_system', 'description' => 'Remover usuario no sistema']);
        \App\Models\ControleAcesso\Permission::create(['name' => 'upt_user_system', 'description' => 'Editar usuario no sistema']);
        \App\Models\ControleAcesso\Permission::create(['name' => 'lst_user_system', 'description' => 'Listar usuario no sistema']);

        \App\Models\ControleAcesso\Permission::create(['name' => 'add_docente_system', 'description' => 'Adicionar Docente no sistema']);
        \App\Models\ControleAcesso\Permission::create(['name' => 'del_docente_system', 'description' => 'Remover Docente no sistema']);
        \App\Models\ControleAcesso\Permission::create(['name' => 'upt_docente_system', 'description' => 'Editar Docente no sistema']);
        \App\Models\ControleAcesso\Permission::create(['name' => 'lst_docente_system', 'description' => 'Listar Docente no sistema']);
        
    }
}
