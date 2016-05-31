<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\ControleAcesso\User;
use App\Models\ControleAcesso\Role;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $this->authorize('user_list');
        $users = User::all();
        return view('restrict.users.index', compact('users'));
    }
    
    public function create() 
    {
        $this->authorize('user_add');
        return view('restrict.users.create');
    }
    
    public function store(Request $request)
    {
        $this->authorize('user_add');
        $input->plainPassword = $input['password'];
        $input = $this->prepareFields($request);        
        User::create($input);
        return redirect()->route('restrict.users.index');
    }
    
    public function edit($id)
    {
        $this->authorize('user_edit');
        $user = User::find($id);
        return view('restrict.users.edit', compact('user'));
    }
    
    public function update(Request $request, $id)
    {
        $this->authorize('user_edit');
        $input = $this->prepareFields($request);
        User::find($id)->update($input);
        return redirect()->route('restrict.users.index');
    }
    
    public function destroy($id)
    {
        $this->authorize('user_destroy');
        User::find($id)->delete();
        return redirect()->route('restrict.users.index');
    }
    
    public function roles($id)
    {
        $this->authorize('user_view_roles');
        $user = User::find($id);
        $roles = Role::all();
        return view('restrict.users.roles', compact('user', 'roles'));
    }
    
    public function storeRole(Request $request, $id)
    {
        $this->authorize('user_add_role');
        $user = User::find($id);
        $role = Role::findOrFail($request->all()['role_id']);
        $user->addRole($role);
        return redirect()->back();
    }
    
    public function revokeRole($id, $role_id)
    {
        $this->authorize('user_revoke_role');
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
    
    public function firstAccess(){
        
    }
}
