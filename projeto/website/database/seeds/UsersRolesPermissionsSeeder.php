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
            'email' => 'eduardo.ejs@hotmail.com',
            'plainPassword' => null,
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
            'active' => false,
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
            'name' => 'Administrador',
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
        $userDocente->addRole($roleDocente);
        $userDocente2->addRole($roleDocente);
        $userAluno->addRole($roleAluno);
        
        /**
         * Criando as permissoes do sistema
         */

        /* Controle de Acesso - Usuário */
        $permissionListUser = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'list_user',
            'description' => 'Permite listar os usuários do sistema'
        ]);

        $permissionAddUser = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_user',
            'description' => 'Permite adicionar usuários ao sistema'
        ]);

        $permissionEditUser = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'edit_user',
            'description' => 'Permite alterar usuários do sistema'
        ]);

        $permissionDestroyUser = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'destroy_user',
            'description' => 'Permite remover/inativar um usuário do sistema'
        ]);

        $permissionViewUserRoles = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'view_user_roles',
            'description' => 'Permite visualizar o perfil dos usuários'
        ]);

        $permissionAddUserRole = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_user_role',
            'description' => 'Permite adicionar um perfil ao usuário'
        ]);

        $permissionRevokeUserRole = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'revoke_user_role',
            'description' => 'Permite remover um perfil de um usuário'
        ]);

        /* Permissões especiais */
        $managePermissions = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'permission_admin',
            'description' => 'Permite gerenciar as PERMISSÕES de acesso do sistema'
        ]);

        $AdminRoles = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'role_admin',
            'description' => 'Aplica o perfil de Adminsitrador a um usuário do sistema'
        ]);
        
        /* Permissoes para material de aula */
        $permissionListMaterial = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'list_material',
            'description' => 'Permite listar material de aula'
        ]);

        $permissionAddMaterial = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_material',
            'description' => 'Permite adicionar material de aula'
        ]);

        $permissionEditMaterial = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'edit_material',
            'description' => 'Permite editar material de aula'
        ]);

        $permissionDestroyMaterial = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'destroy_material',
            'description' => 'Permite remover um material de aula'
        ]);

        $permissionViewDisciplinaMaterial = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'view_disciplina_material',
            'description' => 'Permite visualizar a qual disciplina pertence o material de aula'
        ]);

        $permissionDocenteMaterial = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'view_docente_material',
            'description' => 'Permite visualizar qual docente enviou o material de aula'
        ]);
        
        /* Permissoes para Docentes */
        $permissionListDocente = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'list_docente',
            'description' => 'Permite listar todos os docentes'
        ]);

        $permissionAddDocente = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_docente',
            'description' => 'Permite adicionar um docente'
        ]);

        $permissionEditDocente = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'edit_docente',
            'description' => 'Permite alterar um docente'
        ]);

        $permissionDestroyDocente = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'destroy_docente',
            'description' => 'Permite remover um docente'
        ]);
        
        /* Permissoes para Disciplinas */
        $permissionListDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'list_disciplina',
            'description' => 'Permite listar todas as Disciplinas'
        ]);

        $permissionAddDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_disciplina',
            'description' => 'Permite adicionar um Disciplinas'
        ]);

        $permissionEditDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'edit_disciplina',
            'description' => 'Permite editar Disciplinas'
        ]);

        $permissionDestroyDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'destroy_disciplina',
            'description' => 'Permite remover uma Disciplina'
        ]);

        $permissionViewGradeDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'view_grade_disciplina',
            'description' => 'Permite visualizar a Grade de Disciplina'
        ]);

        $permissionViewCursoDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'view_curso_disciplina',
            'description' => 'Permite visualizar qual Curso pertence a Disciplina'
        ]);

        /* Permissoes para Curso */
        $permissionListCurso = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'list_curso',
            'description' => 'Permite listar todas os Cursos'
        ]);

        $permissionAddCurso = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_curso',
            'description' => 'Permite adicionar um Curso'
        ]);

        $permissionEditCurso = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'edit_curso',
            'description' => 'Permite editar um Curso'
        ]);

        $permissionDestroyCurso = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'destroy_curso',
            'description' => 'Permite remover um Curso'
        ]);

        $permissionViewClassificacaoCurso = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'view_curso_tipo',
            'description' => 'Permite visualizar qual é a classificação do Curso'
        ]);

        /* Permissoes para o Tipo de Curso - Classificação: Graduação, Pós, etc */
        $permissionListTipoCurso = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'list_tipo_curso',
            'description' => 'Permite listar todas as classificações de Cursos'
        ]);

        $permissionAddTipoCurso = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_tipo_curso',
            'description' => 'Permite adicionar uma classificação de Curso'
        ]);

        $permissionEditTipoCurso = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'edit_tipo_curso',
            'description' => 'Permite editar uma classificação de Curso'
        ]);

        $permissionDestroyTipoCurso = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'destroy_tipo_curso',
            'description' => 'Permite remover uma classificação de Curso'
        ]);

        /* Permissoes para Grade de Disciplinas */
        $permissionListGrade = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'list_grade',
            'description' => 'Permite listar todas as Grades de Disciplinas'
        ]);

        $permissionAddGrade = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_grade',
            'description' => 'Permite adicionar uma Grade de Disciplinas'
        ]);

        $permissionEditGrade = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'edit_grade',
            'description' => 'Permite editar uma Grade de Disciplinas'
        ]);

        $permissionDestroyGrade = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'destroy_grade',
            'description' => 'Permite remover uma Grade de Disciplinas'
        ]);

        /* Permissoes para o vínculo entre Docentes e Disciplinas */
        $permissionListDocenteDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'list_docente_disciplina',
            'description' => 'Permite listar o vínculo entre Docente e Disciplinas'
        ]);

        $permissionAddDocenteDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_docente_disciplina',
            'description' => 'Permite adicionar um vínculo entre Docente e Disciplinas'
        ]);

        $permissionEditDocenteDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'edit_docente_disciplina',
            'description' => 'Permite editar um vínculo entre Docente e Disciplinas'
        ]);

        $permissionDestroyDocenteDisciplina = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'destroy_docente_disciplina',
            'description' => 'Permite remover um vínculo entre Docente e Disciplinas'
        ]);

        /* Permissoes para notas rapidas */        
        $permissionListNotas = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'list_notas_rapidas',
            'description' => 'Permite listar todas as notas rápidas'
        ]);

        $permissionAddNotas = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_notas_rapidas',
            'description' => 'Permite adicionar uma nota rápida'
        ]);

        $permissionEditNotas = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'edit_notas_rapidas',
            'description' => 'Permite alterar uma nota rápida'
        ]);

        $permissionDestroyNotas = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'destroy_notas_rapidas',
            'description' => 'Permite remover uma nota rápida'
        ]);

        /* Permissoes para agendamento */
        $permissionListAgendamento = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'list_agendamento',
            'description' => 'Permite listar todas os agendamentos'
        ]);

        $permissionAddAgendamento = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_agendamento',
            'description' => 'Permite adicionar um agendamento'
        ]);

        $permissionEditAgendamento = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'edit_agendamento',
            'description' => 'Permite alterar um agendamento'
        ]);

        $permissionDestroyAgendamento = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'destroy_agendamento',
            'description' => 'Permite remover um agendamento'
        ]);

        $permissionComentarAgendamento = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_comment_agendamento',
            'description' => 'Permite inserir um comentário no agendamento'
        ]);

        $permissionViewAgenda = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'view_agenda',
            'description' => 'Permite visualizar a qual agenda pertence o agendamento'
        ]);

        /* Permissoes para agenda */
        $permissionListAgenda = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'list_agenda',
            'description' => 'Permite listar todas as agendas'
        ]);

        $permissionAddAgenda = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_agenda',
            'description' => 'Permite adicionar uma agenda'
        ]);

        $permissionEditAgenda = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'edit_agenda',
            'description' => 'Permite alterar uma agenda'
        ]);

        $permissionDestroyAgenda = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'destroy_agenda',
            'description' => 'Permite remover uma agenda'
        ]);

        /* Permissoes para envio de arquivos - Download */        
        $permissionListDownload = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'list_download',
            'description' => 'Permite listar arquivos para Download'
        ]);

        $permissionAddDownload = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_download',
            'description' => 'Permite enviar arquivo para Download'
        ]);

        $permissionDestroyDownload = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'destroy_download',
            'description' => 'Permite apagar arquivo para Download'
        ]);

        $permissionViewCategoriaDownload = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'view_categoria_download',
            'description' => 'Permite visualizar a categoria do arquivo para Download'
        ]);

        /* Permissoes para modalidades de cursos */
        $permissionListModalidade = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'list_modalidade',
            'description' => 'Permite listar todas as modalidades de cursos'
        ]);

        $permissionAddModalidade = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'add_modalidade',
            'description' => 'Permite adicionar uma modalidade de curso'
        ]);

        $permissionEditModalidade = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'edit_modalidade',
            'description' => 'Permite alterar uma modalidade'
        ]);

        $permissionDestroyModalidade = factory(\App\Models\ControleAcesso\Permission::class)->create([
            'name'=>'destroy_modalidade',
            'description' => 'Permite remover uma modalidade'
        ]);
        
        /**
         * Adicionar as permissoes aos perfis de usuarios
         */       
        $roleDocente->addPermission($permissionAddMaterial);
        $roleDocente->addPermission($permissionEditMaterial);
        $roleDocente->addPermission($permissionDestroyMaterial);
        $roleDocente->addPermission($permissionListMaterial);
        $roleDocente->addPermission($permissionListDisciplina);
        $roleDocente->addPermission($permissionListDocente);
        $roleDocente->addPermission($permissionEditDocente);
        $roleDocente->addPermission($permissionListCurso);
        $roleDocente->addPermission($permissionListAgendamento);
        $roleDocente->addPermission($permissionAddAgendamento);
        $roleDocente->addPermission($permissionEditAgendamento);
        $roleDocente->addPermission($permissionDestroyAgendamento);
        
        $roleAluno->addPermission($permissionListMaterial);
        $roleAluno->addPermission($permissionListDocente);
        $roleAluno->addPermission($permissionListDisciplina);
        $roleAluno->addPermission($permissionListCurso);        
    }
}
