<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ControleAcesso\Role::create(['name' => 'Administrador', 'description' => 'Administrador do sistema']);
        \App\Models\ControleAcesso\Role::create(['name' => 'Docente', 'description' => 'Docente do sistema']);
        \App\Models\ControleAcesso\Role::create(['name' => 'Aluno', 'description' => 'Aluno do sistema']);        
    }
}
