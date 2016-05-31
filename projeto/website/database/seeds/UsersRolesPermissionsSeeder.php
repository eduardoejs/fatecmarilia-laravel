<?php

use Illuminate\Database\Seeder;

class UsersRolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        /**
         * Usuarios do Sistema
         */
        $userAdmin = factory(\App\Models\ControleAcesso\User::class)->create([
            'name' => 'Eduardo Silva',
            'email' => 'eduardo@admin.com',
            'plainPassword' => 123456,
            'active' => true,
            'password' => bcrypt(123456)
        ]);
        
        $userAdmin2 = factory(\App\Models\ControleAcesso\User::class)->create([
            'name' => 'Junior DJ',
            'email' => 'junior@admin.com',
            'plainPassword' => 123456,
            'active' => true,
            'password' => bcrypt(123456)
        ]);
        
        $userDocente = factory(\App\Models\ControleAcesso\User::class)->create([
            'name' => 'Docente 1',
            'email' => 'd1@docente.com',
            'plainPassword' => 123456,
            'active' => true,
            'password' => bcrypt(123456)
        ]);
        
        $userDocente2 = factory(\App\Models\ControleAcesso\User::class)->create([
            'name' => 'Docente 2',
            'email' => 'd2@docente.com',
            'plainPassword' => 123456,
            'active' => true,
            'password' => bcrypt(123456)
        ]);
        
        $userAluno = factory(\App\Models\ControleAcesso\User::class)->create([
            'name' => 'Aluno da Silva',
            'email' => 'a1@aluno.com',
            'plainPassword' => 123456,
            'active' => true,
            'password' => bcrypt(123456)
        ]);
        
        /**
         * Perfil dos usuarios
         */
        $roleAdmin = factory(\App\Models\ControleAcesso\Role::class)->create([
            'name' => 'Admin',
            'description' => 'Administrador do Sistema'
        ]);
        
        $roleDocente = factory(\App\Models\ControleAcesso\Role::class)->create([
            'name' => 'Docente',
            'description' => 'Docente do Sistema'
        ]);
        
        $roleAluno = factory(\App\Models\ControleAcesso\Role::class)->create([
            'name' => 'Aluno',
            'description' => 'Aluno do Sistema'
        ]);
        
        /**
         * Vinculando Perfil aos Usuarios criados
         */
        $userAdmin->addRole($roleAdmin);
        $userAdmin2->addRole($roleAdmin);
        
        $userDocente->addRole($roleDocente);
        $userDocente2->addRole($roleDocente);

        $userAluno->addRole($roleAluno);
        
        /**
         * Criando as permissoes do sistema
         */
        $userList = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_list',
            'description' => 'Permite listar todos os usuários'
        ]);

        $userAdd = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_add',
            'description' => 'Permite adicionar usuários'
        ]);

        $userEdit = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_edit',
            'description' => 'Permite editar usuários'
        ]);

        $userDestroy = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_destroy',
            'description' => 'Permite remover um usuário'
        ]);

        $userViewRoles = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_view_roles',
            'description' => 'Permite visualizar o Perfil ("Role") dos usuários'
        ]);

        $userAddRole = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_add_role',
            'description' => 'Permite adicionar um novo Perfil para um usuário'
        ]);

        $userRevokeRole = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_revoke_role',
            'description' => 'Permite remover um Perfil ("Role") de um usuário'
        ]);

        $managePermissions = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'permission_admin',
            'description' => 'Permite todas as permissões de Administrador'
        ]);

        $AdminRoles = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'role_admin',
            'description' => 'Permite Perfil de Administrador'
        ]);
        
        //Permissoes para material de aula
        $userListMaterial = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_list_material_aula',
            'description' => 'Permite listar material de aula'
        ]);

        $userAddMaterial = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_add_material_aula',
            'description' => 'Permite adicionar material de aula'
        ]);

        $userEditMaterial = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_edit_material_aula',
            'description' => 'Permite editar material de aula'
        ]);

        $userDestroyMaterial = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_destroy_material_aula',
            'description' => 'Permite remover um material de aula'
        ]);
        
        //Permissoes para Docentes
        $userListDocente = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_list_docente',
            'description' => 'Permite listar todos os Docentes'
        ]);

        $userAddDocente = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_add_docente',
            'description' => 'Permite adicionar um Docente'
        ]);

        $userEditDocente = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_edit_docente',
            'description' => 'Permite editar Docente'
        ]);

        $userDestroyDocente = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_destroy_docente',
            'description' => 'Permite remover um Docente'
        ]);
        
        //Permissoes para Disciplinas
        $userListDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_list_disciplina',
            'description' => 'Permite listar todas as Disciplinas'
        ]);

        $userAddDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_add_disciplina',
            'description' => 'Permite adicionar um Disciplinas'
        ]);

        $userEditDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_edit_disciplina',
            'description' => 'Permite editar Disciplinas'
        ]);

        $userDestroyDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_destroy_disciplina',
            'description' => 'Permite remover uma Disciplina'
        ]);
        
        $userListCurso = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_list_curso',
            'description' => 'Permite listar todas os Cursos'
        ]);

        $userAddCurso = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_add_curso',
            'description' => 'Permite adicionar um Curso'
        ]);

        $userEditCurso = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_edit_curso',
            'description' => 'Permite editar um Curso'
        ]);

        $userDestroyCurso = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'user_destroy_curso',
            'description' => 'Permite remover um Curso'
        ]);
        
        /**
         * Adicionar as permissoes aos perfis de usuarios
         */       
        $roleDocente->addPermission($userAddMaterial);
        $roleDocente->addPermission($userEditMaterial);
        $roleDocente->addPermission($userDestroyMaterial);
        $roleDocente->addPermission($userListMaterial);
        $roleDocente->addPermission($userListDisciplina);
        $roleDocente->addPermission($userListDocente);
        $roleDocente->addPermission($userEditDocente);
        $roleDocente->addPermission($userListCurso);
        
        $roleAluno->addPermission($userListMaterial);
        $roleAluno->addPermission($userListDocente);
        $roleAluno->addPermission($userListDisciplina);
        $roleAluno->addPermission($userListCurso);        

        /*$roleManager->addPermission($userList);
        $roleManager->addPermission($userEdit);
        $roleManager->addPermission($userAdd);
        $roleManager->addPermission($userViewRoles);

        $roleSupervisor->addPermission($userList);
        $roleSupervisor->addPermission($userViewRoles);*/
    }
}
