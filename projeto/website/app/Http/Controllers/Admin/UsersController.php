<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\ControleAcesso\User;
use App\Models\ControleAcesso\Role;
use App\Models\Academico\Docente;
use App\Http\Controllers\Controller;
use Validator;

class UsersController extends Controller
{
    public function index()
    {
        $this->authorize('list_user');
        $users = User::orderBy('active', 'desc')->orderBy('name', 'asc')->get();
        return view('admin.users.index', compact('users'));
    }
    
    public function create() 
    {
        $this->authorize('add_user');
        return view('admin.users.create');
    }
    
    public function store(Request $request)
    {        
        $this->authorize('add_user');
        
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
        );
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',            
        ]);
                
        if($validator->fails()){ 
            $messages = $validator->messages();            
            return redirect()->back()->withErrors($validator)->withInput();
        }else{     
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->plainPassword = $this->random_password(8);
            $user->password = bcrypt($user->plainPassword);
            $user->active = true;
            $user->save();

            $user = User::find($user->id);
            \Event::fire(new \App\Events\UsuarioCriado($user));        

            return redirect()->route('admin.users.index');
        }
    }    

    private function random_password( $length = 8 ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }
    
    public function edit($id)
    {
        $this->authorize('edit_user');
        $user = User::find($id);
        $readonly = true;
        return view('admin.users.edit', compact('user', 'readonly'));
    }
    
    public function update(Request $request, $id)
    {
        $this->authorize('edit_user');
        $input = $this->prepareFields($request);
        User::find($id)->update($input);

        Docente::where('user_id', $id)->update(['nome' => $request->input('name')]);
        return redirect()->route('admin.users.index');
    }
    
    public function destroy($id)
    {
        $this->authorize('destroy_user');
        //User::find($id)->delete();
        $user = User::find($id);
        
        if($user->active)
            $user->active = false;
        else
            $user->active = true;
        $user->save();
        return redirect()->route('admin.users.index');
    }
    
    public function roles($id)
    {
        $this->authorize('view_user_roles');
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.roles', compact('user', 'roles'));
    }
    
    public function storeRole(Request $request, $id)
    {
        $this->authorize('add_user_role');
        $user = User::find($id);
        $role = Role::findOrFail($request->all()['role_id']);
        $user->addRole($role);

        //se Docente chama o evento para cadastrar na tabela de docente
        if($role->name == 'Docente'){            
            \Event::fire(new \App\Events\AddRoleDocenteToUser($user));     
        }
        
        return redirect()->back();
    }
    
    public function revokeRole($id, $role_id)
    {
        $this->authorize('revoke_user_role');
        $user = User::find($id);
        $role = Role::findOrFail($role_id);
        $user->revokeRole($role);
        return redirect()->back();
    }

    private function prepareFields(Request $request) 
    {
        $input = $request->all();
        if(isset($input['password'])){
            $input['password'] = bcrypt($input['password']);
            return $input;
        }
        
        return $input;
    }
    
    public function search(Request $request)
    {
        $this->authorize('list_user');
        
        $search = $request->input('search');
        if(!empty($request->input('search'))){
            $users = User::orWhere('name','like', '%'.$request->input('search').'%')->orderBy('active', 'desc')->get();
            return view('admin.users.index', compact('users', 'search'));
        }
        
        return redirect()->route('admin.users.index');
    }
}
