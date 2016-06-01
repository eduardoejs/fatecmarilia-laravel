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
        $users = User::orderBy('active', 'desc')->get();
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
        
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
        );
        
        $valid = \Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',            
        ]);
                
        if($valid->fails()){
            return redirect()->route('restrict.users.create')->withInput(['name' => $request->input('name'), 'email' => $request->input('email')])->withErrors($valid);
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

            return redirect()->route('restrict.users.index');
        }
    }
    

    private function random_password( $length = 8 ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
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
}
